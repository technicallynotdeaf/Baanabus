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

    function drawWindow(ctx, wallLeft, wallWidth, innerTop, floorY, isNight) {
        const cx = Math.floor(wallLeft + wallWidth * 0.5);
        const ww = Math.min(Math.floor(wallWidth * 0.68), 110);
        const wh = Math.floor(ww * 0.75);
        const wy = Math.floor(innerTop + (floorY - innerTop) * 0.28);

        // outer frame (shadow)
        ctx.fillStyle = 'rgba(0,0,0,0.18)';
        ctx.fillRect(cx - ww / 2 + 3, wy + 3, ww, wh);

        // frame
        ctx.fillStyle = '#6b4c2a';
        ctx.fillRect(cx - ww / 2 - 7, wy - 7, ww + 14, wh + 14);

        // glass panes
        const skyTop    = isNight ? '#080c1a' : '#a8c8e8';
        const skyBottom = isNight ? '#0e1528' : '#c8dff5';
        const halfW = ww / 2 - 4;
        const halfH = wh / 2 - 4;

        [[cx - ww/2 + 1, wy + 1, halfW, halfH],
         [cx + 3,        wy + 1, halfW, halfH],
         [cx - ww/2 + 1, wy + halfH + 7, halfW, halfH],
         [cx + 3,        wy + halfH + 7, halfW, halfH]
        ].forEach(([px, py, pw, ph]) => {
            const g = ctx.createLinearGradient(px, py, px, py + ph);
            g.addColorStop(0, skyTop);
            g.addColorStop(1, skyBottom);
            ctx.fillStyle = g;
            ctx.fillRect(px, py, pw, ph);
        });

        // glazing bars
        ctx.fillStyle = '#6b4c2a';
        ctx.fillRect(cx - 3, wy, 6, wh);          // vertical centre
        ctx.fillRect(cx - ww/2, wy + wh/2 - 3, ww, 6); // horizontal centre

        // night: faint moon
        if (isNight) {
            ctx.fillStyle = 'rgba(200,210,255,0.55)';
            ctx.beginPath();
            ctx.arc(cx - ww / 5, wy + wh * 0.3, 9, 0, Math.PI * 2);
            ctx.fill();
            ctx.fillStyle = 'rgba(0,0,0,0.4)';
            ctx.beginPath();
            ctx.arc(cx - ww / 5 + 6, wy + wh * 0.3, 8, 0, Math.PI * 2);
            ctx.fill();
        }

        // window sill
        ctx.fillStyle = '#8a6540';
        ctx.fillRect(cx - ww / 2 - 10, wy + wh + 7, ww + 20, 7);
    }

    function drawTableAndLamp(ctx, wallLeft, wallWidth, floorY, lampOn) {
        const tableW = Math.min(Math.floor(wallWidth * 0.72), 120);
        const cx     = Math.floor(wallLeft + wallWidth * 0.5);
        const legH   = Math.floor(tableW * 0.55);
        const tableH = 11;
        const tableY = floorY - legH - tableH;

        // table shadow
        ctx.fillStyle = 'rgba(0,0,0,0.12)';
        ctx.fillRect(cx - tableW / 2 + 4, tableY + 4, tableW, tableH + legH);

        // legs
        ctx.fillStyle = '#5a3c1e';
        const lw = 7;
        ctx.fillRect(cx - tableW / 2 + 6,     tableY + tableH, lw, legH);
        ctx.fillRect(cx + tableW / 2 - 6 - lw, tableY + tableH, lw, legH);

        // tabletop
        const tg = ctx.createLinearGradient(0, tableY, 0, tableY + tableH);
        tg.addColorStop(0, '#9a7040');
        tg.addColorStop(1, '#7a5828');
        ctx.fillStyle = tg;
        ctx.fillRect(cx - tableW / 2, tableY, tableW, tableH);

        // lamp pole
        const px   = cx + Math.floor(tableW * 0.15);
        const poleH = Math.floor(tableW * 0.55);
        ctx.fillStyle = '#3a3a3a';
        ctx.fillRect(px - 3, tableY - poleH, 6, poleH);

        // lamp base disc
        ctx.fillStyle = '#444';
        ctx.fillRect(px - 10, tableY - 5, 20, 5);

        // shade
        const sw = Math.floor(tableW * 0.52);
        const sh = Math.floor(poleH  * 0.40);
        const sy = tableY - poleH;
        ctx.fillStyle = lampOn ? '#d9a84e' : '#7a7060';
        ctx.beginPath();
        ctx.moveTo(px - sw * 0.35, sy);
        ctx.lineTo(px + sw * 0.35, sy);
        ctx.lineTo(px + sw / 2,    sy + sh);
        ctx.lineTo(px - sw / 2,    sy + sh);
        ctx.closePath();
        ctx.fill();

        // shade highlight stripe
        ctx.fillStyle = lampOn ? 'rgba(255,220,120,0.35)' : 'rgba(255,255,255,0.08)';
        ctx.beginPath();
        ctx.moveTo(px - sw * 0.35,        sy);
        ctx.lineTo(px - sw * 0.35 + 10,   sy);
        ctx.lineTo(px - sw / 2 + 12,      sy + sh);
        ctx.lineTo(px - sw / 2,           sy + sh);
        ctx.closePath();
        ctx.fill();

        // glow
        if (lampOn) {
            const gr = ctx.createRadialGradient(px, sy + sh, 0, px, sy + sh, sw * 1.8);
            gr.addColorStop(0, 'rgba(255,196,80,0.30)');
            gr.addColorStop(0.5, 'rgba(255,196,80,0.10)');
            gr.addColorStop(1, 'rgba(255,196,80,0)');
            ctx.fillStyle = gr;
            ctx.beginPath();
            ctx.arc(px, sy + sh, sw * 1.8, 0, Math.PI * 2);
            ctx.fill();
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
            const info   = window.getMelbourneInfo ? window.getMelbourneInfo() : { isNight: false, isLampOn: false };
            const leftW  = innerLeft;
            const rightW = width - (innerLeft + innerWidth);
            if (leftW > 60)  drawWindow     (ctx, 0,                   leftW,  innerTop, floorY, info.isNight);
            if (rightW > 60) drawTableAndLamp(ctx, innerLeft + innerWidth, rightW, floorY, info.isLampOn);
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
