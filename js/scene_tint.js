(function () {
    const TZ = 'Australia/Melbourne';

    // Approximate Melbourne local sunrise/sunset (decimal hours) by month, 0=Jan
    // Accounts for DST — these are wall-clock times in Melbourne local time
    const SUN = [
        [6.08, 20.75], // Jan
        [6.58, 20.42], // Feb
        [7.08, 19.58], // Mar
        [7.50, 17.75], // Apr
        [7.83, 17.17], // May
        [8.17, 17.00], // Jun
        [8.00, 17.17], // Jul
        [7.50, 17.58], // Aug
        [6.75, 18.00], // Sep
        [6.00, 19.33], // Oct
        [6.00, 20.00], // Nov
        [5.92, 20.58], // Dec
    ];

    // [r, g, b, alpha] at named waypoints
    const C = {
        night:    [10,  15,  55,  0.50],
        predawn:  [10,  15,  55,  0.43],
        dawn:     [200, 118, 28,  0.17],
        morning:  [255, 195, 88,  0.10],
        day:      [0,   0,   0,   0.00],
        golden:   [255, 158, 42,  0.10],
        sunset:   [185, 68,  12,  0.22],
        dusk:     [75,  28,  90,  0.28],
        twilight: [18,  14,  68,  0.42],
    };

    function melbourneTime() {
        const now  = new Date();
        const fmt  = new Intl.DateTimeFormat('en-AU', {
            timeZone: TZ,
            month: 'numeric',
            hour: 'numeric',
            minute: '2-digit',
            hour12: false,
        });
        const p = Object.fromEntries(fmt.formatToParts(now).map(x => [x.type, x.value]));
        const h = parseInt(p.hour,   10);
        const m = parseInt(p.minute, 10);
        const mo = parseInt(p.month, 10) - 1; // 0-indexed
        return { h: h + m / 60, month: mo };
    }

    function lerp(a, b, t) { return a + (b - a) * t; }

    function lerpColor(c0, c1, t) {
        return [
            Math.round(lerp(c0[0], c1[0], t)),
            Math.round(lerp(c0[1], c1[1], t)),
            Math.round(lerp(c0[2], c1[2], t)),
            lerp(c0[3], c1[3], t),
        ];
    }

    function tintColor(h, sr, ss) {
        // Ordered waypoints: [hour, color]
        const W = [
            [0,          C.night],
            [sr - 1.0,   C.predawn],
            [sr,         C.dawn],
            [sr + 1.5,   C.morning],
            [sr + 2.5,   C.day],
            [ss - 2.0,   C.day],
            [ss - 0.5,   C.golden],
            [ss,         C.sunset],
            [ss + 0.5,   C.dusk],
            [ss + 1.0,   C.twilight],
            [ss + 1.5,   C.night],
            [24,         C.night],
        ];

        if (h <= W[0][0]) return C.night;
        if (h >= W[W.length - 1][0]) return C.night;

        for (let i = 0; i < W.length - 1; i++) {
            const [t0, c0] = W[i];
            const [t1, c1] = W[i + 1];
            if (h >= t0 && h < t1) {
                return lerpColor(c0, c1, (h - t0) / (t1 - t0));
            }
        }
        return C.night;
    }

    function apply() {
        const el = document.getElementById('scene-tint');
        if (!el) return;
        const { h, month } = melbourneTime();
        const [sr, ss] = SUN[month];
        const [r, g, b, a] = tintColor(h, sr, ss);
        el.style.backgroundColor = `rgba(${r},${g},${b},${a.toFixed(3)})`;
        document.body.classList.toggle('night-mode', h >= ss);
    }

    function updateClock() {
        const el = document.getElementById('scene-clock');
        if (!el) return;
        const now = new Date();
        const fmt = new Intl.DateTimeFormat('en-AU', {
            timeZone: TZ,
            hour: 'numeric',
            minute: '2-digit',
            hour12: true,
        });
        const p = Object.fromEntries(fmt.formatToParts(now).map(x => [x.type, x.value]));
        el.textContent = `${p.hour}:${p.minute} ${(p.dayPeriod || '').toLowerCase()}`;
    }

    window.getMelbourneInfo = function() {
        const { h, month } = melbourneTime();
        const [sr, ss] = SUN[month];
        return { h, sr, ss, isNight: h >= ss + 0.5, isLampOn: h >= ss - 0.25 || h < sr };
    };

    apply();
    updateClock();
    setInterval(apply, 60000);
    setInterval(updateClock, 1000);
})();
