(function () {
    const canvas = document.getElementById('sceneCanvas');
    if (!canvas) return;

    const PAPERS        = parseInt(canvas.dataset.papers, 10) || 0;
    const STORY_STARTED = canvas.dataset.storyStarted === '1';

    const STORY_BOOKS = [
        { id: 1, color: '#C8813A', h: 0.82 },
        { id: 2, color: '#2A7FA8', h: 0.72 },
        { id: 3, color: '#6B5A8A', h: 0.78 },
        { id: 4, color: '#3A6B4A', h: 0.70 },
        { id: 5, color: '#7A3A3A', h: 0.75 },
        { id: 6, color: '#6B7A3A', h: 0.68 },
    ];

    let bookBounds = [];

    function frand(s) { return ((Math.sin(s * 91.3 + 217.5) * 53758.5) % 1 + 1) % 1; }

    function drawPapers(ctx, count, width, height, floorY) {
        if (count <= 0) return;
        const floorH = height - floorY - 8;
        const W = 22, H = 28;
        for (let i = 0; i < count; i++) {
            const x     = width  * 0.12 + frand(i * 3)     * width  * 0.76;
            const y     = floorY + 6    + frand(i * 3 + 1) * floorH;
            const angle = (frand(i * 3 + 2) - 0.5) * 0.55;
            ctx.save();
            ctx.translate(x, y);
            ctx.rotate(angle);
            ctx.fillStyle = 'rgba(0,0,0,0.12)';
            ctx.fillRect(-W/2 + 2, -H/2 + 2, W, H);
            ctx.fillStyle   = '#fdfbf0';
            ctx.strokeStyle = '#ccc8b0';
            ctx.lineWidth   = 0.5;
            ctx.fillRect  (-W/2, -H/2, W, H);
            ctx.strokeRect(-W/2, -H/2, W, H);
            ctx.strokeStyle = '#ddd9c4';
            for (let l = 0; l < 3; l++) {
                ctx.beginPath();
                ctx.moveTo(-W/2 + 3, -H/2 + 7 + l * 6);
                ctx.lineTo( W/2 - 3, -H/2 + 7 + l * 6);
                ctx.stroke();
            }
            ctx.restore();
        }
    }

    function drawStoryBooks(ctx, innerLeft, innerTop, innerWidth, innerHeight, clearance) {
        bookBounds = [];
        const secW  = Math.floor(innerWidth / 3);
        const cfgs  = [8, 6, 7];

        cfgs.forEach((numShelves, si) => {
            const secX   = innerLeft + secW * si;
            const shelfH = Math.floor((innerHeight - clearance) / (numShelves + 1));
            const bayBottom = innerTop + innerHeight;
            const bayHeight = shelfH;
            const bookW     = Math.floor((secW - 8) / 2);
            const book1Idx  = si * 2;
            const book2Idx  = si * 2 + 1;

            [book1Idx, book2Idx].forEach((bookIdx, bi) => {
                if (bookIdx >= STORY_BOOKS.length) return;
                const book     = STORY_BOOKS[bookIdx];
                const unlocked = bookIdx === 0 && STORY_STARTED;
                const bkH      = Math.floor(bayHeight * book.h);
                const bx       = secX + 4 + bi * (bookW + 2);
                const by       = bayBottom - bkH;
                const color    = unlocked ? book.color : desaturate(book.color);

                ctx.fillStyle = 'rgba(0,0,0,0.2)';
                ctx.fillRect(bx + 2, by + 2, bookW, bkH);

                ctx.fillStyle = color;
                ctx.fillRect(bx, by, bookW, bkH);

                ctx.fillStyle = 'rgba(255,255,255,0.15)';
                ctx.fillRect(bx, by, 4, bkH);

                ctx.fillStyle = 'rgba(0,0,0,0.2)';
                ctx.fillRect(bx, by, bookW, 3);

                ctx.strokeStyle = 'rgba(0,0,0,0.08)';
                ctx.lineWidth   = 0.5;
                for (let l = 1; l < 5; l++) {
                    const ly = by + Math.floor(bkH * l / 5);
                    ctx.beginPath();
                    ctx.moveTo(bx, ly);
                    ctx.lineTo(bx + bookW, ly);
                    ctx.stroke();
                }

                if (unlocked) {
                    ctx.fillStyle = 'rgba(245,166,35,0.6)';
                    ctx.fillRect(bx, by, bookW, 3);
                }

                bookBounds.push({ id: book.id, x: bx, y: by, w: bookW, h: bkH, unlocked });
            });
        });
    }

    function desaturate(hex) {
        const r = parseInt(hex.slice(1,3),16);
        const g = parseInt(hex.slice(3,5),16);
        const b = parseInt(hex.slice(5,7),16);
        const avg = Math.round(r*0.3 + g*0.59 + b*0.11);
        const mix = v => Math.round(v * 0.25 + avg * 0.75);
        return `rgb(${mix(r)},${mix(g)},${mix(b)})`;
    }

    // One-point perspective helpers.
    // t=0: front (viewer's edge of side wall), t=1: back (bookshelf edge)
    // v=0: ceiling, v=1: floor
    function wallPt(side, t, v, iL, iW, iT, flY, h, w) {
        const x    = side === 'left' ? t * iL : w - t * (w - iL - iW);
        const yTop = t * iT;
        const yBot = h * (1 - t) + flY * t;
        return [Math.round(x), Math.round(yTop + v * (yBot - yTop))];
    }
    function bilerp(TL, TR, BL, BR, s, t) {
        const tx = (a, b) => a + s * (b - a);
        const ty = (a, b) => a + t * (b - a);
        return [Math.round(ty(tx(TL[0], TR[0]), tx(BL[0], BR[0]))),
                Math.round(ty(tx(TL[1], TR[1]), tx(BL[1], BR[1])))];
    }
    function quadPath(ctx, A, B, C, D) {
        ctx.beginPath();
        ctx.moveTo(...A); ctx.lineTo(...B);
        ctx.lineTo(...D); ctx.lineTo(...C);
        ctx.closePath();
    }

    function drawWindow(ctx, iL, iW, iT, flY, h, w, isNight) {
        const lp = (t, v) => wallPt('left', t, v, iL, iW, iT, flY, h, w);

        // Window position: depth t=[0.25, 0.78], vertical v=[0.10, 0.58]
        const t1 = 0.25, t2 = 0.78, v1 = 0.10, v2 = 0.58;
        const pad = 0.04;

        // Frame (slightly expanded)
        const fTL = lp(t1 - pad, v1 - pad), fTR = lp(t2 + pad, v1 - pad);
        const fBL = lp(t1 - pad, v2 + pad), fBR = lp(t2 + pad, v2 + pad);

        // Shadow
        ctx.fillStyle = 'rgba(0,0,0,0.2)';
        quadPath(ctx, [fTL[0]+3,fTL[1]+3],[fTR[0]+3,fTR[1]+3],[fBL[0]+3,fBL[1]+3],[fBR[0]+3,fBR[1]+3]);
        ctx.fill();

        ctx.fillStyle = '#6b4c2a';
        quadPath(ctx, fTL, fTR, fBL, fBR);
        ctx.fill();

        // Glass pane corners
        const TL = lp(t1, v1), TR = lp(t2, v1);
        const BL = lp(t1, v2), BR = lp(t2, v2);
        const bp = (s, t) => bilerp(TL, TR, BL, BR, s, t);

        const skyA = isNight ? '#060a16' : '#9ec4e8';
        const skyB = isNight ? '#0d1424' : '#c0d8f2';

        // 2×2 panes: [TL corner, TR corner, BL corner, BR corner]
        [[bp(0,0),bp(0.47,0),bp(0,0.47),bp(0.47,0.47)],
         [bp(0.53,0),bp(1,0),bp(0.53,0.47),bp(1,0.47)],
         [bp(0,0.53),bp(0.47,0.53),bp(0,1),bp(0.47,1)],
         [bp(0.53,0.53),bp(1,0.53),bp(0.53,1),bp(1,1)]
        ].forEach(([a,b,c,d]) => {
            const g = ctx.createLinearGradient(a[0], a[1], c[0], c[1]);
            g.addColorStop(0, skyA); g.addColorStop(1, skyB);
            ctx.fillStyle = g;
            quadPath(ctx, a, b, c, d); ctx.fill();
        });

        // Glazing bars (perspective-correct strips)
        ctx.fillStyle = '#6b4c2a';
        quadPath(ctx, bp(0,0.47), bp(1,0.47), bp(0,0.53), bp(1,0.53)); ctx.fill();
        quadPath(ctx, bp(0.47,0), bp(0.53,0), bp(0.47,1), bp(0.53,1)); ctx.fill();

        // Sill
        const sTL = lp(t1-0.06, v2+pad), sTR = lp(t2+0.06, v2+pad);
        const sBL = lp(t1-0.09, v2+0.07), sBR = lp(t2+0.09, v2+0.07);
        ctx.fillStyle = '#8a6540'; quadPath(ctx, sTL, sTR, sBL, sBR); ctx.fill();

        // Night: crescent moon in top-left pane
        if (isNight) {
            const mc = bp(0.2, 0.18);
            const mr = Math.max(5, Math.abs(TL[0] - TR[0]) * 0.07);
            ctx.fillStyle = 'rgba(200,215,255,0.55)';
            ctx.beginPath(); ctx.arc(mc[0], mc[1], mr, 0, Math.PI*2); ctx.fill();
            ctx.fillStyle = 'rgba(6,10,22,0.85)';
            ctx.beginPath(); ctx.arc(mc[0]+mr*0.55, mc[1]-mr*0.25, mr, 0, Math.PI*2); ctx.fill();
        }
    }

    function drawTableAndLamp(ctx, iL, iW, iT, flY, h, w, lampOn) {
        const rp = (t, v) => wallPt('right', t, v, iL, iW, iT, flY, h, w);

        // Table: depth t=[0.20, 0.72], tabletop v=[0.73, 0.78], floor v=1
        const t1 = 0.20, t2 = 0.72;
        const vTop = 0.73, vTbot = 0.785;

        // Tabletop
        const ttTL = rp(t1, vTop),  ttTR = rp(t2, vTop);
        const ttBL = rp(t1, vTbot), ttBR = rp(t2, vTbot);

        // Shadow
        ctx.fillStyle = 'rgba(0,0,0,0.12)';
        quadPath(ctx,[ttTL[0]+3,ttTL[1]+3],[ttTR[0]+3,ttTR[1]+3],[ttBL[0]+3,ttBL[1]+3],[ttBR[0]+3,ttBR[1]+3]);
        ctx.fill();

        // Tabletop surface with gradient
        const tg = ctx.createLinearGradient(ttTL[0], ttTL[1], ttBL[0], ttBL[1]);
        tg.addColorStop(0, '#9a7040'); tg.addColorStop(1, '#7a5828');
        ctx.fillStyle = tg;
        quadPath(ctx, ttTL, ttTR, ttBL, ttBR); ctx.fill();

        // Front apron panel (dark strip below tabletop)
        const apBL = rp(t1, Math.min(1, vTbot + 0.025)), apBR = rp(t2, Math.min(1, vTbot + 0.025));
        ctx.fillStyle = '#5a3c1e';
        quadPath(ctx, ttBL, ttBR, apBL, apBR); ctx.fill();

        // Legs: vertical lines at near and far corners
        const legW = 5;
        const lNT = rp(t1, vTbot), lNB = rp(t1, 1.0);
        const lFT = rp(t2, vTbot), lFB = rp(t2, 1.0);
        ctx.fillStyle = '#4a2e14';
        ctx.fillRect(lNT[0] - legW, lNT[1], legW * 2, lNB[1] - lNT[1]);
        ctx.fillRect(lFT[0] - legW, lFT[1], legW * 2, lFB[1] - lFT[1]);

        // Lamp: centred on table at mid-depth
        const tMid   = (t1 + t2) * 0.5;
        const lbase  = rp(tMid, vTop);
        const ltop   = rp(tMid, 0.38);
        const poleH  = lbase[1] - ltop[1];
        const scale  = 0.65 + (1 - tMid) * 0.35; // perspective scale
        const sw     = Math.round(52 * scale);
        const sh     = Math.round(poleH * 0.38);
        const shadeY = ltop[1];

        // Pole
        ctx.fillStyle = '#3a3a3a';
        ctx.fillRect(lbase[0] - 2, ltop[1], 4, poleH);

        // Shade (trapezoid)
        ctx.fillStyle = lampOn ? '#d9a84e' : '#7a7060';
        ctx.beginPath();
        ctx.moveTo(lbase[0] - sw * 0.32, shadeY);
        ctx.lineTo(lbase[0] + sw * 0.32, shadeY);
        ctx.lineTo(lbase[0] + sw * 0.50, shadeY + sh);
        ctx.lineTo(lbase[0] - sw * 0.50, shadeY + sh);
        ctx.closePath(); ctx.fill();

        // Highlight
        ctx.fillStyle = lampOn ? 'rgba(255,220,130,0.3)' : 'rgba(255,255,255,0.07)';
        ctx.beginPath();
        ctx.moveTo(lbase[0] - sw * 0.32,        shadeY);
        ctx.lineTo(lbase[0] - sw * 0.32 + sw*0.15, shadeY);
        ctx.lineTo(lbase[0] - sw * 0.50 + sw*0.14, shadeY + sh);
        ctx.lineTo(lbase[0] - sw * 0.50,        shadeY + sh);
        ctx.closePath(); ctx.fill();

        // Glow pool
        if (lampOn) {
            const gr = ctx.createRadialGradient(lbase[0], shadeY + sh, 0, lbase[0], shadeY + sh, sw * 2);
            gr.addColorStop(0, 'rgba(255,196,80,0.30)');
            gr.addColorStop(0.5, 'rgba(255,196,80,0.10)');
            gr.addColorStop(1, 'rgba(255,196,80,0)');
            ctx.fillStyle = gr;
            ctx.beginPath(); ctx.arc(lbase[0], shadeY + sh, sw * 2, 0, Math.PI*2); ctx.fill();
        }
    }

    function updateBackground() {
        const canvas = document.getElementById('sceneCanvas');
        const ctx    = canvas.getContext('2d');
        const width  = window.innerWidth;
        const height = window.innerHeight;
        canvas.width  = width;
        canvas.height = height;

        const innerWidth  = Math.floor(width  * 0.66);
        const innerHeight = Math.floor(height * 0.66);
        const innerLeft   = Math.floor((width  / 2) - (innerWidth  / 2));
        const innerTop    = Math.floor((height / 2) - (innerHeight / 2));
        const clearance   = Math.floor(innerHeight * 0.1);
        const floorY      = innerTop + innerHeight;

        ctx.clearRect(0, 0, width, height);

        ctx.fillStyle = '#e5d0b3';
        ctx.fillRect(innerLeft, innerTop, innerWidth, clearance);

        ctx.strokeStyle = '#5D4037';
        ctx.lineWidth   = 2;
        ctx.fillStyle   = '#8B5A2B';
        ctx.fillRect  (innerLeft, innerTop + clearance, innerWidth, innerHeight - clearance);
        ctx.strokeRect(innerLeft, innerTop + clearance, innerWidth, innerHeight - clearance);

        const secW = Math.floor(innerWidth / 3);
        [1, 2].forEach(n => {
            ctx.beginPath();
            ctx.moveTo(innerLeft + secW * n, innerTop + clearance);
            ctx.lineTo(innerLeft + secW * n, innerTop + innerHeight);
            ctx.stroke();
        });

        [8, 6, 7].forEach((numShelves, idx) => {
            const sx     = innerLeft + secW * idx;
            const shelfH = Math.floor((innerHeight - clearance) / (numShelves + 1));
            for (let i = 1; i <= numShelves; i++) {
                ctx.beginPath();
                ctx.moveTo(sx,        innerTop + clearance + i * shelfH);
                ctx.lineTo(sx + secW, innerTop + clearance + i * shelfH);
                ctx.stroke();
            }
        });

        ctx.strokeStyle = '#8B4513';
        ctx.lineWidth   = 1.5;
        [[0,0,innerLeft,innerTop],[width,0,innerLeft+innerWidth,innerTop],
         [0,height,innerLeft,floorY],[width,height,innerLeft+innerWidth,floorY]
        ].forEach(([x1,y1,x2,y2]) => {
            ctx.beginPath(); ctx.moveTo(x1,y1); ctx.lineTo(x2,y2); ctx.stroke();
        });

        drawStoryBooks(ctx, innerLeft, innerTop, innerWidth, innerHeight, clearance);

        // Desktop-only decorations: window on left wall, table + lamp on right
        if (width > 640) {
            const info = window.getMelbourneInfo ? window.getMelbourneInfo() : { isNight: false, isLampOn: false };
            drawWindow      (ctx, innerLeft, innerWidth, innerTop, floorY, height, width, info.isNight);
            drawTableAndLamp(ctx, innerLeft, innerWidth, innerTop, floorY, height, width, info.isLampOn);
        }

        drawPapers(ctx, PAPERS, width, height, floorY);

        const avatar  = new Image();
        avatar.src    = 'avatars/baanabus_standing.png';
        avatar.onload = function () {
            const scale = width <= 640 ? 0.15 : 0.25;
            const aw    = avatar.width  * scale;
            const ah    = avatar.height * scale;
            ctx.drawImage(avatar,
                Math.floor(width / 4 - aw / 3),
                Math.floor(0.95 * height) - ah,
                aw, ah);
        };
    }

    document.body.classList.add('scene-view');
    window.addEventListener('resize', updateBackground);
    window.addEventListener('load',   updateBackground);
    window.refreshScene = updateBackground;

    canvas.addEventListener('click', function(e) {
        const rect = this.getBoundingClientRect();
        const cx   = e.clientX - rect.left;
        const cy   = e.clientY - rect.top;
        for (const b of bookBounds) {
            if (cx >= b.x && cx <= b.x + b.w && cy >= b.y && cy <= b.y + b.h) {
                if (b.unlocked) loadOverlay('api/story_read.php');
                break;
            }
        }
    });
})();
