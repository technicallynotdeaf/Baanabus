<?php
$paperCount = 0;
$bookCount  = 0;
$pageCount  = 0;
if (isUnlocked()) {
    try {
        $tasks      = getTasks();
        $bookCount  = (int)($tasks['books'] ?? 0);
        $pageCount  = (int)($tasks['pages'] ?? 0);
        $paperCount = count(array_filter(getDoableTasks(), fn($t) => ($t['task_type'] ?? '') === 'inbox'));
    } catch (Throwable $e) {}
}
?>
<canvas id="sceneCanvas"></canvas>

<!-- Progress pips: one per page toward next book (10 = new book) -->
<div id="scene-pips" class="scene-pips">
<?php for ($i = 0; $i < 10; $i++): ?>
  <div class="scene-pip<?= $i < $pageCount ? ' filled' : '' ?>"></div>
<?php endfor; ?>
</div>

<script>
(function () {
    const PAPERS = <?= (int)$paperCount ?>;
    const BOOKS  = <?= (int)$bookCount ?>;

    const BOOK_COLORS = [
        '#c0392b','#2980b9','#27ae60','#8e44ad','#e67e22',
        '#16a085','#d35400','#2c3e50','#f39c12','#1abc9c',
        '#e74c3c','#3498db','#8e44ad','#f1c40f','#1abc9c',
    ];

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

    function drawBooks(ctx, count, innerLeft, innerTop, innerWidth, innerHeight, clearance) {
        if (count <= 0) return;
        const secW  = Math.floor(innerWidth / 3);
        const cfgs  = [8, 6, 7];

        // All bays ordered bottom-to-top across sections (left section first)
        const bays = [];
        cfgs.forEach((numShelves, si) => {
            const x      = innerLeft + secW * si;
            const shelfH = Math.floor((innerHeight - clearance) / (numShelves + 1));
            for (let bay = numShelves; bay >= 0; bay--) {
                const bottomY = (bay === numShelves)
                    ? innerTop + innerHeight
                    : innerTop + clearance + (bay + 1) * shelfH;
                bays.push({ x, bottomY, shelfH, secW });
            }
        });

        const MAX_PER_BAY = 4;
        let remaining = count;
        let seed = 0;

        for (const bay of bays) {
            if (remaining <= 0) break;
            const inBay  = Math.min(remaining, MAX_PER_BAY);
            remaining   -= inBay;
            const maxH   = bay.shelfH - 4;
            const bkW    = Math.floor((bay.secW - 6) / MAX_PER_BAY);

            for (let b = 0; b < inBay; b++) {
                const bkH   = Math.floor(maxH * (0.65 + frand(seed) * 0.30));
                const bx    = bay.x + 3 + b * bkW;
                const by    = bay.bottomY - bkH;
                const color = BOOK_COLORS[(seed * 3 + b) % BOOK_COLORS.length];

                ctx.fillStyle = color;
                ctx.fillRect(bx, by, bkW - 2, bkH);

                // Spine highlight
                ctx.fillStyle = 'rgba(255,255,255,0.18)';
                ctx.fillRect(bx, by, 3, bkH);

                // Top shadow
                ctx.fillStyle = 'rgba(0,0,0,0.18)';
                ctx.fillRect(bx, by, bkW - 2, 2);

                seed++;
            }
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

        // Books on shelves
        drawBooks(ctx, BOOKS, innerLeft, innerTop, innerWidth, innerHeight, clearance);

        // Paper scraps on floor
        drawPapers(ctx, PAPERS, width, height, floorY);

        // Avatar (on top)
        const avatar  = new Image();
        avatar.src    = 'avatars/baanabus_standing.png';
        avatar.onload = function () {
            const scale  = 0.25;
            const aw     = avatar.width  * scale;
            const ah     = avatar.height * scale;
            ctx.drawImage(avatar,
                Math.floor(width / 4 - aw / 3),
                Math.floor(0.95 * height) - ah,
                aw, ah);
        };
    }

    document.body.classList.add('scene-view');
    window.addEventListener('resize', updateBackground);
    window.addEventListener('load',   updateBackground);

    // Exposed so markAsDone can trigger a redraw when a book is earned
    window.refreshScene = updateBackground;
})();
</script>
