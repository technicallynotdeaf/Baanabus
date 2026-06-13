/* Cycle phase clock dial */
function drawCycleDial(canvas, day, cycleLength, phases) {
    var dpr    = window.devicePixelRatio || 1;
    var size   = parseFloat(canvas.style.width) || canvas.width;
    canvas.width  = size * dpr;
    canvas.height = size * dpr;

    var ctx    = canvas.getContext('2d');
    ctx.scale(dpr, dpr);

    var cx     = size / 2;
    var cy     = size / 2;
    var outerR = size * 0.46;
    var innerR = size * 0.32;
    var handR  = size * 0.38;
    var START  = -Math.PI / 2; // 12 o'clock

    ctx.clearRect(0, 0, size, size);

    // Outer background disc
    ctx.beginPath();
    ctx.arc(cx, cy, outerR, 0, 2 * Math.PI);
    ctx.fillStyle = '#ede8e0';
    ctx.fill();

    // Phase arcs (coloured ring)
    phases.forEach(function (p) {
        var a1 = START + (p.startDay - 1) / cycleLength * 2 * Math.PI;
        var a2 = START + p.endDay        / cycleLength * 2 * Math.PI;
        ctx.beginPath();
        ctx.arc(cx, cy, outerR, a1, a2);
        ctx.arc(cx, cy, innerR, a2, a1, true);
        ctx.closePath();
        ctx.fillStyle = p.colour;
        ctx.fill();
    });

    // Inner disc (hides the centre of the arcs to form a donut)
    ctx.beginPath();
    ctx.arc(cx, cy, innerR, 0, 2 * Math.PI);
    ctx.fillStyle = '#f7f3ed';
    ctx.fill();

    // Subtle outer border
    ctx.beginPath();
    ctx.arc(cx, cy, outerR, 0, 2 * Math.PI);
    ctx.strokeStyle = 'rgba(0,0,0,0.10)';
    ctx.lineWidth = 0.5;
    ctx.stroke();

    // Hand — points to the midpoint of the current day
    var handAngle = START + (day - 0.5) / cycleLength * 2 * Math.PI;
    ctx.save();
    ctx.strokeStyle = '#2c2c2c';
    ctx.lineWidth   = Math.max(1.5, size * 0.025);
    ctx.lineCap     = 'round';
    ctx.beginPath();
    ctx.moveTo(cx, cy);
    ctx.lineTo(cx + handR * Math.cos(handAngle), cy + handR * Math.sin(handAngle));
    ctx.stroke();
    ctx.restore();

    // Centre dot
    ctx.beginPath();
    ctx.arc(cx, cy, size * 0.06, 0, 2 * Math.PI);
    ctx.fillStyle = '#2c2c2c';
    ctx.fill();
}

// Draw any canvases already in the DOM on page load
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('canvas[data-cycle-dial]').forEach(function (c) {
        drawCycleDial(
            c,
            parseInt(c.dataset.day, 10),
            parseInt(c.dataset.cycle, 10),
            JSON.parse(c.dataset.phases)
        );
    });
});
