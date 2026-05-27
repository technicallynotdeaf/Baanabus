<?php
$paperCount    = 0;
$storyStarted  = false;  // book 1 clickable when user has vault open
if (isUnlocked()) {
    try {
        $paperCount   = count(array_filter(getDoableTasks(), fn($t) => ($t['task_type'] ?? '') === 'inbox'));
        $storyStarted = true;
    } catch (Throwable $e) {}
}
?>
<canvas id="sceneCanvas"></canvas>

<div id="scene-pips" class="scene-pips">
<?php
$pageCount = 0;
if (isUnlocked()) {
    try { $t = getTasks(); $pageCount = (int)($t['pages'] ?? 0); } catch (Throwable $e) {}
}
for ($i = 0; $i < 10; $i++): ?>
  <div class="scene-pip<?= $i < $pageCount ? ' filled' : '' ?>"></div>
<?php endfor; ?>
</div>

<script>
(function () {
    const PAPERS        = <?= (int)$paperCount ?>;
    const STORY_STARTED = <?= $storyStarted ? 'true' : 'false' ?>;

    // The 6 story books (spec colors; height as fraction of bay height)
    const STORY_BOOKS = [
        { id: 1, color: '#C8813A', h: 0.82 },  // The Chai Meridian
        { id: 2, color: '#2A7FA8', h: 0.72 },  // Below the Meridian
        { id: 3, color: '#6B5A8A', h: 0.78 },  // The Quiet Dark
        { id: 4, color: '#3A6B4A', h: 0.70 },  // The Green Correspondence
        { id: 5, color: '#7A3A3A', h: 0.75 },  // (hidden)
        { id: 6, color: '#6B7A3A', h: 0.68 },  // (hidden)
    ];

    // Book bounding boxes for click detection — rebuilt on each draw
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

    // Draw 2 story books per section in the bottom bay of each section
    function drawStoryBooks(ctx, innerLeft, innerTop, innerWidth, innerHeight, clearance) {
        bookBounds = [];
        const secW  = Math.floor(innerWidth / 3);
        const cfgs  = [8, 6, 7]; // shelves per section

        cfgs.forEach((numShelves, si) => {
            const secX   = innerLeft + secW * si;
            const shelfH = Math.floor((innerHeight - clearance) / (numShelves + 1));
            // Bottom bay: from last shelf line to bookshelf bottom
            const bayBottom = innerTop + innerHeight;
            const bayHeight = shelfH;
            const bookW     = Math.floor((secW - 8) / 2);  // 2 books per section
            const book1Idx  = si * 2;
            const book2Idx  = si * 2 + 1;

            [book1Idx, book2Idx].forEach((bookIdx, bi) => {
                if (bookIdx >= STORY_BOOKS.length) return;
                const book     = STORY_BOOKS[bookIdx];
                const unlocked = bookIdx === 0 && STORY_STARTED; // only book 1 for now
                const bkH      = Math.floor(bayHeight * book.h);
                const bx       = secX + 4 + bi * (bookW + 2);
                const by       = bayBottom - bkH;
                const color    = unlocked ? book.color : desaturate(book.color);

                // Shadow
                ctx.fillStyle = 'rgba(0,0,0,0.2)';
                ctx.fillRect(bx + 2, by + 2, bookW, bkH);

                // Book body
                ctx.fillStyle = color;
                ctx.fillRect(bx, by, bookW, bkH);

                // Spine highlight
                ctx.fillStyle = 'rgba(255,255,255,0.15)';
                ctx.fillRect(bx, by, 4, bkH);

                // Top edge shadow
                ctx.fillStyle = 'rgba(0,0,0,0.2)';
                ctx.fillRect(bx, by, bookW, 3);

                // Subtle horizontal lines (pages)
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
                    // Clickable indicator: subtle gold top edge
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

        // Back wall
        ctx.fillStyle = '#e5d0b3';
        ctx.fillRect(innerLeft, innerTop, innerWidth, clearance);

        // Bookshelf body
        ctx.strokeStyle = '#5D4037';
        ctx.lineWidth   = 2;
        ctx.fillStyle   = '#8B5A2B';
        ctx.fillRect  (innerLeft, innerTop + clearance, innerWidth, innerHeight - clearance);
        ctx.strokeRect(innerLeft, innerTop + clearance, innerWidth, innerHeight - clearance);

        // Vertical supports
        const secW = Math.floor(innerWidth / 3);
        [1, 2].forEach(n => {
            ctx.beginPath();
            ctx.moveTo(innerLeft + secW * n, innerTop + clearance);
            ctx.lineTo(innerLeft + secW * n, innerTop + innerHeight);
            ctx.stroke();
        });

        // Horizontal shelves
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

        // Perspective corner lines
        ctx.strokeStyle = '#8B4513';
        ctx.lineWidth   = 1.5;
        [[0,0,innerLeft,innerTop],[width,0,innerLeft+innerWidth,innerTop],
         [0,height,innerLeft,floorY],[width,height,innerLeft+innerWidth,floorY]
        ].forEach(([x1,y1,x2,y2]) => {
            ctx.beginPath(); ctx.moveTo(x1,y1); ctx.lineTo(x2,y2); ctx.stroke();
        });

        // Story books
        drawStoryBooks(ctx, innerLeft, innerTop, innerWidth, innerHeight, clearance);

        // Paper scraps on floor
        drawPapers(ctx, PAPERS, width, height, floorY);

        // Avatar (on top)
        const avatar  = new Image();
        avatar.src    = 'avatars/baanabus_standing.png';
        avatar.onload = function () {
            const scale = 0.25;
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

    // Canvas click — open story reader for unlocked books
    document.getElementById('sceneCanvas').addEventListener('click', function(e) {
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
</script>
