(function () {
    const canvas = document.getElementById('sceneCanvas');
    if (!canvas) return;

    const PAPERS        = parseInt(canvas.dataset.papers, 10) || 0;
    const STORY_STARTED       = canvas.dataset.storyStarted === '1';
    const BADGE_IDS           = JSON.parse(canvas.dataset.badgeIds || '[]');
    const STORY_BOOKS_AVAIL   = JSON.parse(canvas.dataset.storyBooksAvail || '[1]');
    const OBJECTS_OUT         = canvas.dataset.objectsOut === '1';

    const STORY_BOOKS = [
        { id:  1, color: '#C8713A', h: 0.82 }, // Wales (home)
        { id:  2, color: '#B84040', h: 0.75 }, // Basque Country
        { id:  3, color: '#3A7A4A', h: 0.80 }, // Black Forest
        { id:  4, color: '#4A7A90', h: 0.72 }, // Danube Delta
        { id:  5, color: '#6A4A8A', h: 0.85 }, // Carpathians
        { id:  6, color: '#2A82B8', h: 0.76 }, // Croatian coast
        { id:  7, color: '#9A7030', h: 0.79 }, // Slovenia
        { id:  8, color: '#A85020', h: 0.83 }, // Transylvania
        { id:  9, color: '#2A5AA8', h: 0.73 }, // Aegean coast
        { id: 10, color: '#C8A020', h: 0.87 }, // Amsterdam
        { id: 11, color: '#8A306A', h: 0.78 }, // Yorkshire
        { id: 12, color: '#B84070', h: 0.81 }, // Alsace
        { id: 13, color: '#2A8070', h: 0.74 }, // North Macedonia
        { id: 14, color: '#C85A30', h: 0.86 }, // Cappadocia
        { id: 15, color: '#2A6A40', h: 0.77 }, // Borneo
        { id: 16, color: '#1A5A88', h: 0.80 }, // Palawan
        { id: 17, color: '#4A2A8A', h: 0.83 }, // Lofoten
        { id: 18, color: '#2A4A80', h: 0.76 }, // Georgia
        { id: 19, color: '#1A4A70', h: 0.70 }, // Adriatic
        { id: 20, color: '#A87820', h: 0.84 }, // Ukrainian Carpathians
        { id: 21, color: '#6A5A80', h: 0.79 }, // Brittany
        { id: 22, color: '#4A6A80', h: 0.73 }, // Pyrenees
        { id: 23, color: '#4A7A2A', h: 0.82 }, // Herefordshire
        { id: 24, color: '#A82A4A', h: 0.87 }, // Wales (return)
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
        const shelfH = Math.floor((innerHeight - clearance) / 6);

        const sidePad    = 3;
        const gap        = 2;
        const refBkH     = Math.floor(shelfH * 0.75);
        const narrowBookW = Math.max(10, Math.floor(refBkH / 6));

        // Fit up to 8 books per row in the left section; adapt if the section is very narrow
        const BOOKS_PER_ROW = Math.min(8, Math.floor((secW - sidePad * 2 + gap) / (narrowBookW + gap)));

        // Expand book width to fill the available slot, but no wider than 1/3 of book height
        const slotW  = Math.floor((secW - sidePad * 2 + gap) / BOOKS_PER_ROW);
        const bookW  = Math.max(narrowBookW, Math.min(slotW - gap, Math.floor(refBkH / 3)));

        STORY_BOOKS.forEach((book, i) => {
            const row = Math.floor(i / BOOKS_PER_ROW);
            const col = i % BOOKS_PER_ROW;

            const bayBot = innerTop + clearance + (row + 1) * shelfH;
            const bkH    = Math.floor(shelfH * book.h);
            const bx     = innerLeft + sidePad + col * (bookW + gap);
            const by     = bayBot - bkH;

            const unlocked = STORY_BOOKS_AVAIL.includes(book.id);
            const color    = unlocked ? book.color : desaturate(book.color);
            const spineW   = Math.max(3, Math.floor(bookW * 0.20));

            // Drop shadow
            ctx.fillStyle = 'rgba(0,0,0,0.22)';
            ctx.fillRect(bx + 2, by + 2, bookW, bkH);

            // Cover face
            ctx.fillStyle = color;
            ctx.fillRect(bx, by, bookW, bkH);

            // Binding strip (left ~18%)
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

    function drawToybox(ctx, innerLeft, innerTop, innerWidth, innerHeight, clearance, hasObjects) {
        const secW   = Math.floor(innerWidth / 3);
        // Middle section has 6 shelves → 7 bays; bottom bay is below shelf 6
        const shelfH = Math.floor((innerHeight - clearance) / 7);
        const bayTop = innerTop + clearance + 6 * shelfH;
        const bayBot = innerTop + innerHeight;
        const bayH   = bayBot - bayTop;
        const bayL   = innerLeft + secW;
        const bayW   = secW;

        const bw   = Math.round(bayW * 0.52);
        const bh   = Math.round(bayH * 0.72);
        const bx   = Math.round(bayL + (bayW - bw) / 2);
        const by   = bayBot - bh - Math.round(bayH * 0.05);
        const lidH = Math.round(bh * 0.30);
        const bodyH = bh - lidH;
        const bodyY = by + lidH;

        // Drop shadow
        ctx.fillStyle = 'rgba(0,0,0,0.18)';
        ctx.fillRect(bx + 3, by + 3, bw, bh);

        // Body
        const bodyGrad = ctx.createLinearGradient(bx, bodyY, bx + bw, bodyY);
        bodyGrad.addColorStop(0, '#9a6030');
        bodyGrad.addColorStop(0.5, '#b87040');
        bodyGrad.addColorStop(1, '#7a4820');
        ctx.fillStyle = bodyGrad;
        ctx.fillRect(bx, bodyY, bw, bodyH);

        // Wood planks on body
        ctx.strokeStyle = 'rgba(0,0,0,0.10)';
        ctx.lineWidth = 0.8;
        for (let i = 1; i < 3; i++) {
            const py = bodyY + Math.round(bodyH * i / 3);
            ctx.beginPath(); ctx.moveTo(bx + 1, py); ctx.lineTo(bx + bw - 1, py); ctx.stroke();
        }
        // Center vertical crease
        ctx.beginPath();
        ctx.moveTo(bx + Math.round(bw / 2), bodyY + 2);
        ctx.lineTo(bx + Math.round(bw / 2), bodyY + bodyH - 2);
        ctx.stroke();

        const studSize = Math.max(3, Math.round(bw * 0.05));
        ctx.fillStyle = '#5a3010';
        [[bx, bodyY], [bx + bw - studSize, bodyY],
         [bx, bodyY + bodyH - studSize], [bx + bw - studSize, bodyY + bodyH - studSize]
        ].forEach(([sx, sy]) => ctx.fillRect(sx, sy, studSize, studSize));

        if (hasObjects) {
            // Interior darkness at top of body
            const intGrad = ctx.createLinearGradient(bx, bodyY, bx, bodyY + Math.round(lidH * 0.8));
            intGrad.addColorStop(0, 'rgba(15,8,2,0.90)');
            intGrad.addColorStop(1, 'rgba(0,0,0,0)');
            ctx.fillStyle = intGrad;
            ctx.fillRect(bx + 2, bodyY, bw - 4, Math.round(lidH * 0.8));

            // Items peeking above rim: 3 coloured circles
            const itemR = Math.max(3, Math.round(Math.min(bw, bayH) * 0.085));
            const itemY = bodyY - Math.round(itemR * 0.5);
            [
                { cx: bx + Math.round(bw * 0.22), color: '#d03838' },
                { cx: bx + Math.round(bw * 0.50), color: '#3478c0' },
                { cx: bx + Math.round(bw * 0.78), color: '#38a838' },
            ].forEach(item => {
                ctx.fillStyle = 'rgba(0,0,0,0.22)';
                ctx.beginPath(); ctx.arc(item.cx + 1, itemY + 1, itemR, 0, Math.PI * 2); ctx.fill();
                ctx.fillStyle = item.color;
                ctx.beginPath(); ctx.arc(item.cx, itemY, itemR, 0, Math.PI * 2); ctx.fill();
                ctx.fillStyle = 'rgba(255,255,255,0.32)';
                ctx.beginPath(); ctx.arc(item.cx - itemR * 0.28, itemY - itemR * 0.32, itemR * 0.38, 0, Math.PI * 2); ctx.fill();
            });

            // Lid open: foreshortened trapezoid leaning back above the opening
            const lidInset  = Math.round(bw * 0.03);
            const lidOpenH  = Math.max(4, Math.round(lidH * 0.38));
            const lidGradO  = ctx.createLinearGradient(bx, bodyY - lidOpenH, bx, bodyY);
            lidGradO.addColorStop(0, '#c07840');
            lidGradO.addColorStop(1, '#7a4820');
            ctx.fillStyle = lidGradO;
            ctx.beginPath();
            ctx.moveTo(bx,                   bodyY);
            ctx.lineTo(bx + bw,              bodyY);
            ctx.lineTo(bx + bw - lidInset,   bodyY - lidOpenH);
            ctx.lineTo(bx + lidInset,        bodyY - lidOpenH);
            ctx.closePath(); ctx.fill();
            ctx.fillStyle = 'rgba(255,255,255,0.18)';
            ctx.fillRect(bx + lidInset, bodyY - lidOpenH, bw - lidInset * 2, 1);

        } else {
            // Lid closed: slightly wider, sits on top
            const lidX = bx - 2;
            const lidW = bw + 4;
            const lidGrad = ctx.createLinearGradient(lidX, by, lidX, by + lidH);
            lidGrad.addColorStop(0, '#c07840');
            lidGrad.addColorStop(1, '#9a5828');
            ctx.fillStyle = lidGrad;
            ctx.fillRect(lidX, by, lidW, lidH);

            // Lid top highlight and seam shadow
            ctx.fillStyle = 'rgba(255,255,255,0.22)';
            ctx.fillRect(lidX, by, lidW, 2);
            ctx.fillStyle = 'rgba(0,0,0,0.28)';
            ctx.fillRect(lidX, by + lidH - 2, lidW, 2);

            // Centre stripe
            ctx.strokeStyle = 'rgba(0,0,0,0.10)';
            ctx.lineWidth = 0.8;
            ctx.beginPath();
            ctx.moveTo(lidX + 2, by + Math.round(lidH / 2));
            ctx.lineTo(lidX + lidW - 2, by + Math.round(lidH / 2));
            ctx.stroke();

            // Lid corner studs
            ctx.fillStyle = '#5a3010';
            [[lidX, by], [lidX + lidW - studSize, by],
             [lidX, by + lidH - studSize], [lidX + lidW - studSize, by + lidH - studSize]
            ].forEach(([sx, sy]) => ctx.fillRect(sx, sy, studSize, studSize));

            // Metal clasp at centre seam
            const claspW = Math.max(8, Math.round(bw * 0.12));
            const claspH = Math.max(5, Math.round(lidH * 0.40));
            const claspX = bx + Math.round((bw - claspW) / 2);
            const claspY = by + lidH - Math.round(claspH / 2);
            ctx.fillStyle = '#c8a040';
            ctx.fillRect(claspX, claspY, claspW, claspH);
            ctx.fillStyle = 'rgba(255,255,255,0.30)';
            ctx.fillRect(claspX, claspY, claspW, 1);
            ctx.fillStyle = '#8a6820';
            ctx.fillRect(claspX + 2, claspY + 2, claspW - 4, claspH - 3);
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
        drawToybox(ctx, innerLeft, innerTop, innerWidth, innerHeight, clearance, OBJECTS_OUT);

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

        const sb = document.getElementById('scene-scoreboard');
        if (sb) {
            sb.style.top   = innerTop + 'px';
            sb.style.left  = innerLeft + 'px';
            sb.style.width = innerWidth + 'px';
        }

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
