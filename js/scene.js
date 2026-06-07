(function () {
    const canvas = document.getElementById('sceneCanvas');
    if (!canvas) return;

    const PAPERS        = parseInt(canvas.dataset.papers, 10) || 0;
    const STORY_STARTED       = canvas.dataset.storyStarted === '1';
    const BADGE_IDS           = JSON.parse(canvas.dataset.badgeIds || '[]');
    const STORY_BOOKS_AVAIL   = JSON.parse(canvas.dataset.storyBooksAvail || '[1]');

    const STORY_BOOKS = [
        { id: 1, color: '#C8813A', h: 0.82 },
        { id: 2, color: '#2A7FA8', h: 0.72 },
        { id: 3, color: '#6B5A8A', h: 0.78 },
        { id: 4, color: '#3A6B4A', h: 0.70 },
        { id: 5, color: '#7A3A3A', h: 0.75 },
        { id: 6, color: '#6B7A3A', h: 0.68 },
    ];

    let bookBounds      = [];
    let boardBounds     = null;
    let kitchenDoorBounds = null;

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
        const secW   = Math.floor(innerWidth / 3);
        // Left section: 5 shelf lines = 6 bays; books sit in the top bay
        const shelfH = Math.floor((innerHeight - clearance) / 6);
        const bayBot = innerTop + clearance + shelfH; // bottom of top-left shelf

        const sidePad = 3;
        const gap     = 2;
        const refBkH  = Math.floor(shelfH * 0.75);          // typical book height
        const bookW   = Math.max(10, Math.floor(refBkH / 6)); // ~1:6 spine ratio

        STORY_BOOKS.forEach((book, i) => {
            const unlocked = STORY_BOOKS_AVAIL.includes(book.id);
            const bkH      = Math.floor(shelfH * book.h);
            const bx       = innerLeft + sidePad + i * (bookW + gap);
            const by       = bayBot - bkH;
            const color    = unlocked ? book.color : desaturate(book.color);
            const spineW   = Math.max(3, Math.floor(bookW * 0.20));

            // Drop shadow
            ctx.fillStyle = 'rgba(0,0,0,0.22)';
            ctx.fillRect(bx + 2, by + 2, bookW, bkH);

            // Cover face
            ctx.fillStyle = color;
            ctx.fillRect(bx, by, bookW, bkH);

            // Binding strip (left ~20%, darkened by overlay)
            ctx.fillStyle = 'rgba(0,0,0,0.28)';
            ctx.fillRect(bx, by, spineW, bkH);

            // Binding-to-cover highlight seam
            ctx.fillStyle = 'rgba(255,255,255,0.18)';
            ctx.fillRect(bx + spineW, by, 2, bkH);

            // Page edges at top (cream strip)
            ctx.fillStyle = 'rgba(255,250,235,0.9)';
            ctx.fillRect(bx + spineW + 2, by, bookW - spineW - 2, 3);

            // Top shadow (3-D top edge)
            ctx.fillStyle = 'rgba(0,0,0,0.35)';
            ctx.fillRect(bx, by, bookW, 2);

            // Right-edge catch-light
            ctx.fillStyle = 'rgba(255,255,255,0.12)';
            ctx.fillRect(bx + bookW - 2, by + 3, 2, bkH - 5);

            // Horizontal rule lines across cover face
            ctx.strokeStyle = 'rgba(0,0,0,0.06)';
            ctx.lineWidth   = 0.5;
            for (let l = 1; l < 5; l++) {
                const ly = by + Math.floor(bkH * l / 5);
                ctx.beginPath();
                ctx.moveTo(bx + spineW + 2, ly);
                ctx.lineTo(bx + bookW - 2,  ly);
                ctx.stroke();
            }

            // Unlocked: gold accent bands
            if (unlocked) {
                ctx.fillStyle = 'rgba(245,166,35,0.75)';
                ctx.fillRect(bx + spineW + 2, by + Math.max(4, Math.floor(bkH * 0.07)),  bookW - spineW - 3, 3);
                ctx.fillRect(bx + spineW + 2, by + bkH - Math.max(6, Math.floor(bkH * 0.13)), bookW - spineW - 3, 3);
            }

            bookBounds.push({ id: book.id, x: bx, y: by, w: bookW, h: bkH, unlocked });
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

    function ptInQuad(px, py, corners) {
        if (!corners) return false;
        const n = corners.length;
        let sign = 0;
        for (let i = 0; i < n; i++) {
            const [ax, ay] = corners[i];
            const [bx, by] = corners[(i + 1) % n];
            const cross = (bx - ax) * (py - ay) - (by - ay) * (px - ax);
            if (sign === 0)             { sign = cross >= 0 ? 1 : -1; }
            else if (sign ===  1 && cross < 0)  return false;
            else if (sign === -1 && cross >= 0) return false;
        }
        return true;
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

        // v=1.0 is the floor. Table occupies the bottom ~12% of room height.
        // Depth: t=0 is viewer's edge, t=1 is back wall. Table sits around t=0.35–0.65.
        const t1 = 0.28, t2 = 0.62, tMid = (t1 + t2) * 0.5;
        const vFloor   = 1.0;
        const vTableTop = 0.88;  // table top = 12% of room height above floor
        const vApron   = 0.905; // thin front apron below tabletop

        // Shadow on floor
        const fc = rp(tMid, vFloor);
        ctx.fillStyle = 'rgba(0,0,0,0.10)';
        ctx.beginPath();
        ctx.ellipse(fc[0], fc[1], (rp(t1,vFloor)[0]-rp(t2,vFloor)[0])*0.4, 5, 0, 0, Math.PI*2);
        ctx.fill();

        // Front face: from apron to floor (the visible front panel + legs implied)
        const apTL = rp(t1, vApron), apTR = rp(t2, vApron);
        const apBL = rp(t1, vFloor), apBR = rp(t2, vFloor);
        ctx.fillStyle = '#5a3c1e';
        quadPath(ctx, apTL, apTR, apBL, apBR); ctx.fill();

        // Legs (slightly darker, over the front face)
        const legW = 5;
        ctx.fillStyle = '#3d2410';
        [t1, t2].forEach(t => {
            const lt = rp(t, vApron), lb = rp(t, vFloor);
            ctx.fillRect(lt[0] - legW, lt[1], legW * 2, lb[1] - lt[1]);
        });

        // Tabletop surface
        const ttTL = rp(t1, vTableTop), ttTR = rp(t2, vTableTop);
        const ttBL = rp(t1, vApron),    ttBR = rp(t2, vApron);
        const tg = ctx.createLinearGradient(ttTL[0], ttTL[1], ttBL[0], ttBL[1]);
        tg.addColorStop(0, '#9a7040'); tg.addColorStop(1, '#7a5828');
        ctx.fillStyle = tg;
        quadPath(ctx, ttTL, ttTR, ttBL, ttBR); ctx.fill();

        // Tabletop edge highlight
        ctx.fillStyle = '#b08848';
        quadPath(ctx, ttTL, ttTR, [ttTL[0],ttTL[1]+3], [ttTR[0],ttTR[1]+3]); ctx.fill();

        // --- Lamp ---
        const lbase  = rp(tMid, vTableTop);
        const vLampT = vTableTop - 0.065;        // lamp is 6.5% of room height tall
        const ltop   = rp(tMid, vLampT);
        const poleH  = lbase[1] - ltop[1];
        const scale  = 0.7 + (1 - tMid) * 0.3;
        const sw     = Math.round(42 * scale);
        const sh     = Math.round(poleH * 0.42);
        const shadeY = ltop[1];

        ctx.fillStyle = '#3a3a3a';
        ctx.fillRect(lbase[0] - 2, ltop[1], 4, poleH);

        ctx.fillStyle = lampOn ? '#d9a84e' : '#7a7060';
        ctx.beginPath();
        ctx.moveTo(lbase[0] - sw*0.30, shadeY);
        ctx.lineTo(lbase[0] + sw*0.30, shadeY);
        ctx.lineTo(lbase[0] + sw*0.50, shadeY + sh);
        ctx.lineTo(lbase[0] - sw*0.50, shadeY + sh);
        ctx.closePath(); ctx.fill();

        ctx.fillStyle = lampOn ? 'rgba(255,220,130,0.28)' : 'rgba(255,255,255,0.07)';
        ctx.beginPath();
        ctx.moveTo(lbase[0]-sw*0.30, shadeY);
        ctx.lineTo(lbase[0]-sw*0.30+sw*0.14, shadeY);
        ctx.lineTo(lbase[0]-sw*0.50+sw*0.13, shadeY+sh);
        ctx.lineTo(lbase[0]-sw*0.50, shadeY+sh);
        ctx.closePath(); ctx.fill();

        if (lampOn) {
            const gr = ctx.createRadialGradient(lbase[0], shadeY+sh, 0, lbase[0], shadeY+sh, sw*2.2);
            gr.addColorStop(0, 'rgba(255,196,80,0.30)');
            gr.addColorStop(0.5, 'rgba(255,196,80,0.10)');
            gr.addColorStop(1, 'rgba(255,196,80,0)');
            ctx.fillStyle = gr;
            ctx.beginPath(); ctx.arc(lbase[0], shadeY+sh, sw*2.2, 0, Math.PI*2); ctx.fill();
        }
    }

    function drawKitchenDoor(ctx, iL, iW, iT, flY, h, w) {
        const rp = (t, v) => wallPt('right', t, v, iL, iW, iT, flY, h, w);
        const TL = rp(0, 0.28), TR = rp(0.13, 0.28);
        const BL = rp(0, 1.0),  BR = rp(0.13, 1.0);

        // Warm kitchen glow through the open doorway
        const glow = ctx.createLinearGradient(TR[0], 0, TL[0], 0);
        glow.addColorStop(0, 'rgba(210,175,90,0.55)');
        glow.addColorStop(1, 'rgba(210,175,90,0)');
        ctx.fillStyle = glow;
        quadPath(ctx, TL, TR, BL, BR); ctx.fill();

        // Frame
        ctx.strokeStyle = '#6b4c2a'; ctx.lineWidth = 4; ctx.lineCap = 'square';
        ctx.beginPath(); ctx.moveTo(...TL); ctx.lineTo(...TR); ctx.lineTo(...BR); ctx.stroke();
        ctx.lineWidth = 2;
        ctx.beginPath(); ctx.moveTo(...TL); ctx.lineTo(...BL); ctx.stroke();

        kitchenDoorBounds = [TL, TR, BR, BL];

        const boardW = Math.abs(TR[0] - TL[0]);
        if (boardW > 10) {
            const midX = (TL[0] + TR[0]) / 2;
            const midY = TL[1] + (BL[1] - TL[1]) * 0.45;
            ctx.save();
            ctx.translate(midX, midY); ctx.rotate(Math.PI / 2 - 0.1);
            ctx.font = `${Math.max(7, Math.round(boardW * 0.5))}px sans-serif`;
            ctx.fillStyle = 'rgba(120,80,25,0.75)'; ctx.textAlign = 'center'; ctx.textBaseline = 'middle';
            ctx.fillText('kitchen', 0, 0);
            ctx.restore();
        }
    }

    function drawNoticeBoard(ctx, iL, iW, iT, flY, h, w, earnedIds) {
        const rp  = (t, v) => wallPt('right', t, v, iL, iW, iT, flY, h, w);
        const t1  = 0.20, t2 = 0.58;
        const v1  = 0.46, v2 = 0.67;
        const pad = 0.025;

        // Frame
        const fTL = rp(t1 - pad, v1 - pad), fTR = rp(t2 + pad, v1 - pad);
        const fBL = rp(t1 - pad, v2 + pad), fBR = rp(t2 + pad, v2 + pad);

        ctx.fillStyle = 'rgba(0,0,0,0.18)';
        quadPath(ctx, [fTL[0]+3,fTL[1]+3],[fTR[0]+3,fTR[1]+3],[fBL[0]+3,fBL[1]+3],[fBR[0]+3,fBR[1]+3]);
        ctx.fill();

        ctx.fillStyle = '#5a3820';
        quadPath(ctx, fTL, fTR, fBL, fBR);
        ctx.fill();

        // Cork surface
        const TL = rp(t1, v1), TR = rp(t2, v1);
        const BL = rp(t1, v2), BR = rp(t2, v2);

        const bg = ctx.createLinearGradient(TL[0], TL[1], BL[0], BL[1]);
        bg.addColorStop(0, '#c89060');
        bg.addColorStop(1, '#a87040');
        ctx.fillStyle = bg;
        quadPath(ctx, TL, TR, BL, BR);
        ctx.fill();

        // Store click bounds (clockwise in screen coords)
        boardBounds = [TL, TR, BR, BL];

        // Badge pins: 2 rows × 4 columns
        const BADGE_DEFS = [
            { id: 'first_task',  color: '#e74c3c' },
            { id: 'task_10',     color: '#e67e22' },
            { id: 'task_50',     color: '#f1c40f' },
            { id: 'task_100',    color: '#c0a030' },
            { id: 'inbox_clear', color: '#2ecc71' },
            { id: 'trivia_10',   color: '#3498db' },
            { id: 'story_start', color: '#9b59b6' },
            { id: 'story_deep',  color: '#e91e63' },
        ];

        const bp   = (s, t) => bilerp(TL, TR, BL, BR, s, t);
        const pinR = Math.max(5, Math.round((TL[0] - TR[0]) * 0.09));

        BADGE_DEFS.forEach((badge, i) => {
            const col      = i % 4;
            const row      = Math.floor(i / 4);
            const s        = 0.14 + col * 0.24;
            const t        = 0.30 + row * 0.44;
            const [px, py] = bp(s, t);
            const earned   = earnedIds.includes(badge.id);

            ctx.fillStyle = 'rgba(0,0,0,0.22)';
            ctx.beginPath(); ctx.arc(px + 2, py + 2, pinR, 0, Math.PI * 2); ctx.fill();

            ctx.fillStyle = earned ? badge.color : 'rgba(155,120,85,0.4)';
            ctx.beginPath(); ctx.arc(px, py, pinR, 0, Math.PI * 2); ctx.fill();

            if (earned) {
                ctx.fillStyle = 'rgba(255,255,255,0.35)';
                ctx.beginPath();
                ctx.arc(px - pinR * 0.28, py - pinR * 0.28, pinR * 0.38, 0, Math.PI * 2);
                ctx.fill();
            }
        });
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
        ctx.strokeRect(innerLeft, innerTop, innerWidth, clearance);

        ctx.fillStyle = '#8B5A2B';
        ctx.fillRect  (innerLeft, innerTop + clearance, innerWidth, innerHeight - clearance);
        ctx.strokeRect(innerLeft, innerTop + clearance, innerWidth, innerHeight - clearance);

        const secW = Math.floor(innerWidth / 3);
        [1, 2].forEach(n => {
            ctx.beginPath();
            ctx.moveTo(innerLeft + secW * n, innerTop + clearance);
            ctx.lineTo(innerLeft + secW * n, innerTop + innerHeight);
            ctx.stroke();
        });

        [5, 6, 7].forEach((numShelves, idx) => {
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
            drawKitchenDoor (ctx, innerLeft, innerWidth, innerTop, floorY, height, width);
            drawTableAndLamp(ctx, innerLeft, innerWidth, innerTop, floorY, height, width, info.isLampOn);
            drawNoticeBoard (ctx, innerLeft, innerWidth, innerTop, floorY, height, width, BADGE_IDS);
        } else {
            boardBounds = null;
            kitchenDoorBounds = null;
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

        if (ptInQuad(cx, cy, kitchenDoorBounds)) {
            window.location.href = 'scene_kitchen.php';
            return;
        }
        if (ptInQuad(cx, cy, boardBounds)) {
            loadOverlay('api/badges.php');
            return;
        }
        for (const b of bookBounds) {
            if (cx >= b.x && cx <= b.x + b.w && cy >= b.y && cy <= b.y + b.h) {
                if (b.unlocked) loadOverlay('api/story_books.php');
                break;
            }
        }
    });

    canvas.addEventListener('mousemove', function(e) {
        const rect = this.getBoundingClientRect();
        const cx   = e.clientX - rect.left;
        const cy   = e.clientY - rect.top;
        this.style.cursor = ptInQuad(cx, cy, kitchenDoorBounds) ? 'pointer' : '';
    });
})();
