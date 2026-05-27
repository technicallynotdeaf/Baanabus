<?php
$paperCount = 0;
if (isUnlocked()) {
    try { $paperCount = count(getDoableTasks()); } catch (Throwable $e) {}
}
?>
<canvas id="sceneCanvas"></canvas>

<script>
(function () {
    const PAPERS = <?= (int)$paperCount ?>;

    // Stable pseudo-random from seed (same seed = same value every redraw)
    function frand(s) { return ((Math.sin(s * 127.1 + 311.7) * 43758.5453) % 1 + 1) % 1; }

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
            // shadow
            ctx.fillStyle = 'rgba(0,0,0,0.12)';
            ctx.fillRect(-W/2 + 2, -H/2 + 2, W, H);
            // paper body
            ctx.fillStyle   = '#fdfbf0';
            ctx.strokeStyle = '#ccc8b0';
            ctx.lineWidth   = 0.5;
            ctx.fillRect  (-W/2, -H/2, W, H);
            ctx.strokeRect(-W/2, -H/2, W, H);
            // ruled lines
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
        const floorY      = innerTop + innerHeight;

        ctx.clearRect(0, 0, width, height);

        // Back wall
        const clearance = Math.floor(innerHeight * 0.1);
        ctx.fillStyle = '#e5d0b3';
        ctx.fillRect(innerLeft, innerTop, innerWidth, clearance);

        // Bookshelf
        ctx.strokeStyle = '#5D4037';
        ctx.lineWidth   = 2;
        ctx.fillStyle   = '#8B5A2B';
        ctx.fillRect  (innerLeft, innerTop + clearance, innerWidth, innerHeight - clearance);
        ctx.strokeRect(innerLeft, innerTop + clearance, innerWidth, innerHeight - clearance);

        // Vertical supports
        const sectionWidth = Math.floor(innerWidth / 3);
        [1, 2].forEach(n => {
            ctx.beginPath();
            ctx.moveTo(innerLeft + sectionWidth * n, innerTop + clearance);
            ctx.lineTo(innerLeft + sectionWidth * n, innerTop + innerHeight);
            ctx.stroke();
        });

        // Horizontal shelves
        [8, 6, 7].forEach((numShelves, idx) => {
            const startX     = innerLeft + sectionWidth * idx;
            const shelfH     = Math.floor((innerHeight - clearance) / (numShelves + 1));
            for (let i = 1; i <= numShelves; i++) {
                ctx.beginPath();
                ctx.moveTo(startX,              innerTop + clearance + i * shelfH);
                ctx.lineTo(startX + sectionWidth, innerTop + clearance + i * shelfH);
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

        // Paper scraps on the floor
        drawPapers(ctx, PAPERS, width, height, floorY);

        // Avatar (draws on top of papers)
        const avatar   = new Image();
        avatar.src     = 'avatars/baanabus_standing.png';
        avatar.onload  = function () {
            const scale       = 0.25;
            const avatarW     = avatar.width  * scale;
            const avatarH     = avatar.height * scale;
            const avatarX     = Math.floor(width / 4 - avatarW / 3);
            const avatarY     = Math.floor(0.95 * height) - avatarH;
            ctx.drawImage(avatar, avatarX, avatarY, avatarW, avatarH);
        };
    }

    document.body.classList.add('scene-view');
    window.addEventListener('resize', updateBackground);
    window.addEventListener('load',   updateBackground);
})();
</script>
