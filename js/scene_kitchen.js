(function () {
    'use strict';

    const canvas = document.getElementById('kitchenCanvas');
    if (!canvas) return;
    const ctx = canvas.getContext('2d');

    let gapFoods          = [];   // [{name}] from food_gaps API
    let nutrientProgress  = {};  // keyed by nutrient name
    let doorBounds        = null; // click zone → library
    let chalkboardBounds  = null; // click zone → food log overlay

    // ── Geometry helpers (same system as scene.js) ────────────────────────────
    function wallPt(side, t, v, iL, iW, iT, flY, H, W) {
        const x    = side === 'left' ? t * iL : W - t * (W - iL - iW);
        const yTop = t * iT;
        const yBot = H * (1 - t) + flY * t;
        return [Math.round(x), Math.round(yTop + v * (yBot - yTop))];
    }
    function bilerp(TL, TR, BL, BR, s, t) {
        const lx = (a, b) => a + s * (b - a);
        const ly = (a, b) => a + t * (b - a);
        return [Math.round(ly(lx(TL[0], TR[0]), lx(BL[0], BR[0]))),
                Math.round(ly(lx(TL[1], TR[1]), lx(BL[1], BR[1])))];
    }
    function quadPath(A, B, C, D) {
        ctx.beginPath();
        ctx.moveTo(...A); ctx.lineTo(...B); ctx.lineTo(...D); ctx.lineTo(...C);
        ctx.closePath();
    }
    function ptInQuad(px, py, corners) {
        if (!corners) return false;
        let sign = 0;
        for (let i = 0; i < corners.length; i++) {
            const [ax, ay] = corners[i], [bx, by] = corners[(i + 1) % corners.length];
            const cross = (bx - ax) * (py - ay) - (by - ay) * (px - ax);
            if (!sign) sign = cross >= 0 ? 1 : -1;
            else if ((sign === 1 && cross < 0) || (sign === -1 && cross >= 0)) return false;
        }
        return true;
    }

    // ── Room shell ────────────────────────────────────────────────────────────
    function drawRoom(W, H, iL, iW, iT, iH, flY) {
        // Ceiling
        ctx.fillStyle = '#F2EAD8';
        ctx.beginPath(); ctx.moveTo(0,0); ctx.lineTo(iL,iT); ctx.lineTo(iL+iW,iT); ctx.lineTo(W,0); ctx.closePath(); ctx.fill();
        // Left wall – warm cream
        ctx.fillStyle = '#EDE3CC';
        ctx.beginPath(); ctx.moveTo(0,0); ctx.lineTo(iL,iT); ctx.lineTo(iL,flY); ctx.lineTo(0,H); ctx.closePath(); ctx.fill();
        // Right wall – slightly cooler
        ctx.fillStyle = '#E8DCC8';
        ctx.beginPath(); ctx.moveTo(W,0); ctx.lineTo(iL+iW,iT); ctx.lineTo(iL+iW,flY); ctx.lineTo(W,H); ctx.closePath(); ctx.fill();
        // Floor – terracotta
        ctx.fillStyle = '#B87050';
        ctx.beginPath(); ctx.moveTo(0,H); ctx.lineTo(iL,flY); ctx.lineTo(iL+iW,flY); ctx.lineTo(W,H); ctx.closePath(); ctx.fill();
        // Floor tile lines
        ctx.strokeStyle = 'rgba(80,30,10,0.18)'; ctx.lineWidth = 0.8;
        const vpX = iL + iW / 2;
        for (let r = 1; r < 5; r++) {
            const ty = flY + (H - flY) * r / 5;
            const f  = r / 5;
            ctx.beginPath(); ctx.moveTo(iL + (0 - iL) * f, ty); ctx.lineTo(iL + iW + (W - iL - iW) * f, ty); ctx.stroke();
        }
        for (let c = 0; c <= 7; c++) {
            const xF = W * c / 7;
            ctx.beginPath(); ctx.moveTo(xF, H); ctx.lineTo(vpX + (xF - vpX) * 0.05, flY); ctx.stroke();
        }
        // Back wall – light warm white
        const wallGrad = ctx.createLinearGradient(iL, iT, iL, flY);
        wallGrad.addColorStop(0, '#F5EDD8'); wallGrad.addColorStop(1, '#EDE4D0');
        ctx.fillStyle = wallGrad;
        ctx.fillRect(iL, iT, iW, iH);
        // Perspective lines
        ctx.strokeStyle = 'rgba(0,0,0,0.13)'; ctx.lineWidth = 1;
        [[0,0,iL,iT],[W,0,iL+iW,iT],[0,H,iL,flY],[W,H,iL+iW,flY]].forEach(([x1,y1,x2,y2]) => {
            ctx.beginPath(); ctx.moveTo(x1,y1); ctx.lineTo(x2,y2); ctx.stroke();
        });
    }

    // ── Open pantry shelves (back wall) ───────────────────────────────────────
    function drawShelves(iL, iW, iT, iH) {
        const topPad = Math.floor(iH * 0.07);
        const botPad = Math.floor(iH * 0.28);
        const range  = iH - topPad - botPad;
        const sh     = Math.max(7, Math.floor(iH * 0.018));

        for (let i = 0; i < 3; i++) {
            const y = iT + topPad + Math.floor((i + 0.9) / 3 * range);
            // Shadow
            ctx.fillStyle = 'rgba(0,0,0,0.12)';
            ctx.fillRect(iL + 2, y + sh, iW - 4, 4);
            // Top surface
            ctx.fillStyle = '#c8a060';
            ctx.fillRect(iL, y, iW, sh);
            // Front lip
            ctx.fillStyle = '#a07840';
            ctx.fillRect(iL, y + sh - Math.max(3, Math.floor(sh * 0.35)), iW, Math.max(3, Math.floor(sh * 0.35)));
            // Under-shelf shadow
            ctx.fillStyle = 'rgba(0,0,0,0.07)';
            ctx.fillRect(iL, y - 4, iW, 4);
        }

        // Kitchen counter along bottom of back wall
        const cY = iT + iH - Math.floor(iH * 0.22);
        const cg = ctx.createLinearGradient(0, cY, 0, cY + 14);
        cg.addColorStop(0, '#e8e0d0'); cg.addColorStop(1, '#c8baa8');
        ctx.fillStyle = cg; ctx.fillRect(iL, cY, iW, 14);
        ctx.fillStyle = '#7a6050'; ctx.fillRect(iL, cY + 14, iW, iT + iH - cY - 14);
        // Counter highlight
        ctx.fillStyle = 'rgba(255,255,255,0.25)';
        ctx.fillRect(iL, cY, iW, 3);
    }

    function shelfYs(iT, iH) {
        const topPad = Math.floor(iH * 0.07);
        const botPad = Math.floor(iH * 0.28);
        const range  = iH - topPad - botPad;
        return [0, 1, 2].map(i => iT + topPad + Math.floor((i + 0.9) / 3 * range));
    }

    // ── Food illustrations ─────────────────────────────────────────────────────
    function drawFoodItems(iL, iW, iT, iH, foods) {
        const ys   = shelfYs(iT, iH);
        const PER  = 4;
        const r    = Math.min(22, Math.max(12, Math.floor(iW / (PER * 3.2))));
        const sh   = Math.max(7, Math.floor(iH * 0.018));
        foods.slice(0, ys.length * PER).forEach((food, i) => {
            const row = Math.floor(i / PER), col = i % PER;
            if (row >= ys.length) return;
            const x = iL + iW * (0.11 + col * 0.22);
            const y = ys[row] - r - 3;
            ctx.save();
            drawFood(food.name, x, y, r);
            ctx.restore();
        });
    }

    function drawFood(name, cx, cy, r) {
        const n = name.toLowerCase();
        if      (n.includes('apple'))              drawApple(cx, cy, r);
        else if (n.includes('avocado'))            drawAvocado(cx, cy, r);
        else if (n.includes('banana'))             drawBanana(cx, cy, r);
        else if (n.includes('blueberr'))           drawBerries(cx, cy, r, '#3030a8', '#5050c8');
        else if (n.includes('broccoli'))           drawBroccoli(cx, cy, r);
        else if (n.includes('carrot'))             drawCarrot(cx, cy, r);
        else if (n.includes('capsicum'))           drawCapsicum(cx, cy, r, n.includes('green') ? '#388020' : '#cc2020');
        else if (n.includes('feijoa'))             drawOval(cx, cy, r, '#6a9a30', '#90ba50');
        else if (n.includes('kale') || n.includes('spinach') || n.includes('silverbeet')) drawLeafy(cx, cy, r, '#2a7020', '#4a9040');
        else if (n.includes('kiwi'))               drawOval(cx, cy, r, '#7a5830', '#9a7850');
        else if (n.includes('lemon'))              drawOval(cx, cy, r, '#f0dc28', '#ffffa0');
        else if (n.includes('mango'))              drawMango(cx, cy, r);
        else if (n.includes('orange') || n.includes('rockmelon')) drawCircle(cx, cy, r, '#e87820', '#ffaa50');
        else if (n.includes('passion'))            drawCircle(cx, cy, r, '#5a2080', '#8040c0');
        else if (n.includes('pear'))               drawPear(cx, cy, r);
        else if (n.includes('peas'))               drawPeas(cx, cy, r);
        else if (n.includes('pumpkin'))            drawPumpkin(cx, cy, r);
        else if (n.includes('raspberr'))           drawBerries(cx, cy, r, '#c82048', '#e84068');
        else if (n.includes('strawberr'))          drawStrawberry(cx, cy, r);
        else if (n.includes('sweet potato') || n.includes('kumara')) drawOval(cx, cy, r, '#c05820', '#e07840');
        else if (n.includes('tomato'))             drawTomato(cx, cy, r);
        else if (n.includes('watermelon'))         drawWatermelon(cx, cy, r);
        else if (n.includes('lentil') || n.includes('chickpea') || n.includes('bean')) drawBowl(cx, cy, r, '#d0a060');
        else if (n.includes('almond') || n.includes('walnut') || n.includes('cashew') || n.includes('chia') || n.includes('seed')) drawOval(cx, cy, r, '#c09050', '#e0b070');
        else if (n.includes('egg'))                drawCircle(cx, cy, r, '#f5f0e8', '#e8dfc8');
        else                                       drawCircle(cx, cy, r, '#80aa50', '#a0ca70');
    }

    // Generic shapes
    function drawCircle(cx, cy, r, fill, hi) {
        ctx.fillStyle = fill;
        ctx.beginPath(); ctx.arc(cx, cy, r * 0.88, 0, Math.PI * 2); ctx.fill();
        ctx.fillStyle = 'rgba(255,255,255,0.25)';
        ctx.beginPath(); ctx.ellipse(cx - r*0.22, cy - r*0.22, r*0.22, r*0.3, -0.4, 0, Math.PI*2); ctx.fill();
    }
    function drawOval(cx, cy, r, fill, hi) {
        ctx.fillStyle = fill;
        ctx.beginPath(); ctx.ellipse(cx, cy, r*0.72, r*0.92, 0.18, 0, Math.PI*2); ctx.fill();
        ctx.fillStyle = 'rgba(255,255,255,0.2)';
        ctx.beginPath(); ctx.ellipse(cx - r*0.18, cy - r*0.22, r*0.18, r*0.28, -0.3, 0, Math.PI*2); ctx.fill();
    }
    function drawBowl(cx, cy, r, fill) {
        ctx.fillStyle = fill;
        ctx.beginPath(); ctx.arc(cx, cy + r*0.1, r*0.85, 0.1, Math.PI - 0.1); ctx.closePath(); ctx.fill();
        ctx.fillStyle = 'rgba(255,255,255,0.18)';
        ctx.beginPath(); ctx.arc(cx, cy + r*0.05, r*0.65, 0.2, Math.PI - 0.2); ctx.closePath(); ctx.fill();
    }
    function drawBerries(cx, cy, r, fill, hi) {
        const pts = [[-r*.35,-r*.2],[r*.35,-r*.2],[0,-r*.45],[0,r*.1],[-r*.35,r*.25],[r*.35,r*.25]];
        ctx.fillStyle = fill;
        for (const [ox,oy] of pts) { ctx.beginPath(); ctx.arc(cx+ox, cy+oy, r*0.32, 0, Math.PI*2); ctx.fill(); }
        ctx.fillStyle = 'rgba(255,255,255,0.15)';
        for (const [ox,oy] of pts.slice(0,3)) { ctx.beginPath(); ctx.arc(cx+ox-r*.09, cy+oy-r*.09, r*0.1, 0, Math.PI*2); ctx.fill(); }
    }
    function drawLeafy(cx, cy, r, fill, hi) {
        const leaves = [[0,-r*.6],[-r*.5,-r*.3],[r*.5,-r*.3],[-r*.6,r*.1],[r*.6,r*.1],[0,r*.2]];
        ctx.fillStyle = fill;
        for (const [ox,oy] of leaves) {
            ctx.save(); ctx.translate(cx+ox, cy+oy); ctx.rotate(Math.atan2(oy, ox||0.1)+Math.PI/2);
            ctx.beginPath(); ctx.ellipse(0, 0, r*0.24, r*0.46, 0, 0, Math.PI*2); ctx.fill(); ctx.restore();
        }
        ctx.fillStyle='rgba(0,0,0,0.2)'; ctx.beginPath(); ctx.arc(cx, cy+r*.38, r*0.16, 0, Math.PI*2); ctx.fill();
    }

    // Individual food shapes
    function drawApple(cx, cy, r) {
        ctx.fillStyle = '#cc2820';
        ctx.beginPath(); ctx.ellipse(cx, cy+r*.05, r*.82, r*.88, 0, 0, Math.PI*2); ctx.fill();
        ctx.fillStyle = '#aa2018'; ctx.beginPath(); ctx.arc(cx, cy-r*.8, r*.15, 0, Math.PI*2); ctx.fill();
        ctx.fillStyle = 'rgba(255,255,255,0.28)';
        ctx.beginPath(); ctx.ellipse(cx-r*.25, cy-r*.2, r*.22, r*.3, -0.4, 0, Math.PI*2); ctx.fill();
        ctx.strokeStyle='#5a2a10'; ctx.lineWidth=r*.12; ctx.lineCap='round';
        ctx.beginPath(); ctx.moveTo(cx, cy-r*.83); ctx.lineTo(cx+r*.2, cy-r*1.15); ctx.stroke();
        ctx.fillStyle='#3a8020'; ctx.beginPath(); ctx.ellipse(cx+r*.32, cy-r*1.05, r*.23, r*.1, -0.7, 0, Math.PI*2); ctx.fill();
    }
    function drawBroccoli(cx, cy, r) {
        ctx.fillStyle = '#5a8a30'; ctx.fillRect(cx-r*.18, cy-r*.1, r*.36, r*.8);
        ctx.fillStyle = '#2a7018';
        for (const [ox,oy] of [[0,-r*.08],[-r*.35,r*.08],[r*.35,r*.08],[-r*.18,-r*.4],[r*.18,-r*.4]]) {
            ctx.beginPath(); ctx.arc(cx+ox, cy+oy, r*.29, 0, Math.PI*2); ctx.fill();
        }
        ctx.fillStyle='#5aaa30';
        for (const [ox,oy] of [[0,-r*.08],[-r*.35,r*.08],[r*.35,r*.08]]) {
            ctx.beginPath(); ctx.arc(cx+ox-r*.09, cy+oy-r*.09, r*.1, 0, Math.PI*2); ctx.fill();
        }
    }
    function drawCarrot(cx, cy, r) {
        ctx.fillStyle='#e07018';
        ctx.beginPath(); ctx.moveTo(cx, cy+r*.9); ctx.lineTo(cx-r*.36, cy-r*.4); ctx.lineTo(cx+r*.36, cy-r*.4); ctx.closePath(); ctx.fill();
        ctx.strokeStyle='rgba(180,80,0,0.3)'; ctx.lineWidth=0.8;
        [cy-r*.25, cy+r*.08, cy+r*.42].forEach(ty => {
            const hw = r*.36 * Math.max(0, (ty - (cy+r*.9)) / (-r*1.3));
            ctx.beginPath(); ctx.moveTo(cx-hw, ty); ctx.lineTo(cx+hw, ty); ctx.stroke();
        });
        ctx.fillStyle='#4a9a28';
        [[-r*.2],[ 0],[r*.2]].forEach(([ox]) => {
            ctx.beginPath(); ctx.moveTo(cx+ox, cy-r*.4);
            ctx.quadraticCurveTo(cx+ox+ox*.5, cy-r*.9, cx+ox+ox*.8, cy-r*1.1);
            ctx.quadraticCurveTo(cx+ox+ox+r*.15, cy-r*.85, cx+ox, cy-r*.4);
            ctx.fill();
        });
    }
    function drawBanana(cx, cy, r) {
        ctx.fillStyle='#f0d020';
        ctx.beginPath(); ctx.moveTo(cx-r*.1, cy-r*.9);
        ctx.quadraticCurveTo(cx+r, cy-r*.7, cx+r*.55, cy+r*.55);
        ctx.quadraticCurveTo(cx+r*.3, cy+r*.9, cx, cy+r*.8);
        ctx.quadraticCurveTo(cx-r*.5, cy+r*.3, cx-r*.1, cy-r*.9);
        ctx.fill();
        ctx.fillStyle='#8a6010'; ctx.beginPath(); ctx.ellipse(cx-r*.08, cy-r*.9, r*.07, r*.1, 0, 0, Math.PI*2); ctx.fill();
    }
    function drawAvocado(cx, cy, r) {
        ctx.fillStyle='#2a5010';
        ctx.beginPath(); ctx.moveTo(cx, cy-r);
        ctx.bezierCurveTo(cx+r*.6, cy-r*.7, cx+r*.8, cy, cx, cy+r);
        ctx.bezierCurveTo(cx-r*.8, cy, cx-r*.6, cy-r*.7, cx, cy-r); ctx.fill();
        ctx.fillStyle='#c8cc40'; ctx.beginPath(); ctx.ellipse(cx, cy+r*.1, r*.52, r*.68, 0, 0, Math.PI*2); ctx.fill();
        ctx.fillStyle='#7a4820'; ctx.beginPath(); ctx.arc(cx, cy+r*.2, r*.26, 0, Math.PI*2); ctx.fill();
        ctx.fillStyle='rgba(255,255,255,0.2)'; ctx.beginPath(); ctx.arc(cx-r*.08, cy+r*.1, r*.1, 0, Math.PI*2); ctx.fill();
    }
    function drawMango(cx, cy, r) {
        ctx.fillStyle='#e8a020';
        ctx.beginPath(); ctx.moveTo(cx, cy-r);
        ctx.bezierCurveTo(cx+r*.7, cy-r*.8, cx+r*.8, cy+r*.2, cx+r*.2, cy+r);
        ctx.bezierCurveTo(cx-r*.4, cy+r, cx-r*.8, cy+r*.2, cx, cy-r); ctx.fill();
        ctx.fillStyle='rgba(220,60,20,0.3)'; ctx.beginPath(); ctx.ellipse(cx+r*.2, cy-r*.3, r*.45, r*.55, 0.5, 0, Math.PI*2); ctx.fill();
        ctx.fillStyle='rgba(255,255,255,0.2)'; ctx.beginPath(); ctx.ellipse(cx-r*.2, cy-r*.3, r*.2, r*.3, -0.4, 0, Math.PI*2); ctx.fill();
    }
    function drawPear(cx, cy, r) {
        ctx.fillStyle='#a0c030';
        ctx.beginPath(); ctx.moveTo(cx, cy-r*.5);
        ctx.bezierCurveTo(cx+r*.8, cy-r*.3, cx+r*.85, cy+r*.3, cx, cy+r);
        ctx.bezierCurveTo(cx-r*.85, cy+r*.3, cx-r*.8, cy-r*.3, cx, cy-r*.5); ctx.fill();
        ctx.fillStyle='#90b028'; ctx.beginPath(); ctx.ellipse(cx, cy-r*.5, r*.28, r*.35, 0, 0, Math.PI*2); ctx.fill();
        ctx.fillStyle='rgba(255,255,255,0.22)'; ctx.beginPath(); ctx.ellipse(cx-r*.25, cy-r*.1, r*.2, r*.3, -0.3, 0, Math.PI*2); ctx.fill();
        ctx.strokeStyle='#5a3010'; ctx.lineWidth=r*.1; ctx.lineCap='round';
        ctx.beginPath(); ctx.moveTo(cx, cy-r*.8); ctx.lineTo(cx+r*.1, cy-r*1.1); ctx.stroke();
    }
    function drawCapsicum(cx, cy, r, fill) {
        ctx.fillStyle = fill;
        for (let i = 0; i < 4; i++) {
            const a = (i/4)*Math.PI*2 - Math.PI/4;
            ctx.beginPath(); ctx.ellipse(cx+Math.cos(a)*r*.28, cy+Math.sin(a)*r*.28, r*.42, r*.55, a, 0, Math.PI*2); ctx.fill();
        }
        ctx.fillStyle='rgba(0,0,0,0.2)'; ctx.beginPath(); ctx.arc(cx, cy, r*.24, 0, Math.PI*2); ctx.fill();
        ctx.strokeStyle='#3a6020'; ctx.lineWidth=r*.12;
        ctx.beginPath(); ctx.moveTo(cx, cy-r*.2); ctx.lineTo(cx, cy-r*.85); ctx.stroke();
    }
    function drawStrawberry(cx, cy, r) {
        ctx.fillStyle='#cc1818';
        ctx.beginPath(); ctx.moveTo(cx, cy+r*.95);
        ctx.bezierCurveTo(cx-r*.85, cy+r*.4, cx-r*.85, cy-r*.3, cx, cy-r*.25);
        ctx.bezierCurveTo(cx+r*.85, cy-r*.3, cx+r*.85, cy+r*.4, cx, cy+r*.95); ctx.fill();
        ctx.fillStyle='#f0e040';
        [[-r*.2,-r*.1],[r*.2,-r*.1],[0,r*.1],[-r*.3,r*.3],[r*.3,r*.3],[0,r*.5]].forEach(([ox,oy]) => {
            ctx.beginPath(); ctx.arc(cx+ox, cy+oy, r*.06, 0, Math.PI*2); ctx.fill();
        });
        ctx.fillStyle='#3a8020';
        for (let i=0; i<5; i++) {
            const a=(i/5)*Math.PI*2-Math.PI/2;
            ctx.beginPath(); ctx.moveTo(cx, cy-r*.25);
            ctx.quadraticCurveTo(cx+Math.cos(a)*r*.6, cy-r*.25+Math.sin(a)*r*.5, cx+Math.cos(a)*r*.7, cy-r*.6);
            ctx.quadraticCurveTo(cx+Math.cos(a+.4)*r*.4, cy-r*.25+Math.sin(a+.4)*r*.3, cx, cy-r*.25);
            ctx.fill();
        }
    }
    function drawTomato(cx, cy, r) {
        ctx.fillStyle='#cc1818'; ctx.beginPath(); ctx.arc(cx, cy+r*.08, r*.88, 0, Math.PI*2); ctx.fill();
        ctx.fillStyle='rgba(255,255,255,0.22)'; ctx.beginPath(); ctx.ellipse(cx-r*.25, cy-r*.15, r*.2, r*.28, -0.3, 0, Math.PI*2); ctx.fill();
        ctx.fillStyle='#3a7820';
        for (let i=0; i<5; i++) {
            const a=(i/5)*Math.PI*2-Math.PI/2;
            ctx.beginPath(); ctx.moveTo(cx, cy-r*.78);
            ctx.quadraticCurveTo(cx+Math.cos(a)*r*.45, cy-r*.78+Math.sin(a)*r*.35, cx+Math.cos(a)*r*.55, cy-r*.78+Math.sin(a)*r*.4);
            ctx.quadraticCurveTo(cx+Math.cos(a+.5)*r*.3, cy-r*.78+Math.sin(a+.5)*r*.2, cx, cy-r*.78);
            ctx.fill();
        }
    }
    function drawPeas(cx, cy, r) {
        ctx.fillStyle='#5a9820'; ctx.beginPath(); ctx.ellipse(cx, cy, r*.35, r*.92, 0.2, 0, Math.PI*2); ctx.fill();
        ctx.fillStyle='#7ac030';
        [cy-r*.45, cy-r*.12, cy+r*.2, cy+r*.5].forEach(py => { ctx.beginPath(); ctx.arc(cx, py, r*.2, 0, Math.PI*2); ctx.fill(); });
    }
    function drawPumpkin(cx, cy, r) {
        ctx.fillStyle='#d06018';
        for (let i=0; i<5; i++) {
            const a=(i/5)*Math.PI*2-Math.PI/2;
            ctx.beginPath(); ctx.ellipse(cx+Math.cos(a)*r*.22, cy+Math.sin(a)*r*.18, r*.44, r*.55, a, 0, Math.PI*2); ctx.fill();
        }
        ctx.fillStyle='#a04010'; ctx.beginPath(); ctx.arc(cx, cy, r*.18, 0, Math.PI*2); ctx.fill();
        ctx.strokeStyle='#3a6018'; ctx.lineWidth=r*.12;
        ctx.beginPath(); ctx.moveTo(cx, cy-r*.15); ctx.lineTo(cx, cy-r*.75); ctx.stroke();
    }
    function drawWatermelon(cx, cy, r) {
        ctx.fillStyle='#3a8820'; ctx.beginPath(); ctx.arc(cx, cy+r*.15, r, 0, Math.PI, true); ctx.closePath(); ctx.fill();
        ctx.fillStyle='#f0f8e8'; ctx.beginPath(); ctx.arc(cx, cy+r*.15, r*.88, 0, Math.PI, true); ctx.closePath(); ctx.fill();
        ctx.fillStyle='#d82028'; ctx.beginPath(); ctx.arc(cx, cy+r*.15, r*.78, 0, Math.PI, true); ctx.closePath(); ctx.fill();
        ctx.fillStyle='#1a0a10';
        [[-r*.35,r*.1],[0,r*.3],[r*.35,r*.1],[-r*.55,r*.25],[r*.55,r*.25]].forEach(([ox,oy]) => {
            ctx.beginPath(); ctx.ellipse(cx+ox, cy+r*.15+oy, r*.05, r*.03, 0.3, 0, Math.PI*2); ctx.fill();
        });
    }

    // ── Kitchen window (left wall) ────────────────────────────────────────────
    function drawKitchenWindow(W, H, iL, iW, iT, flY, isNight) {
        const lp = (t, v) => wallPt('left', t, v, iL, iW, iT, flY, H, W);
        const t1=0.22, t2=0.72, v1=0.1, v2=0.55, pad=0.035;
        const fTL=lp(t1-pad,v1-pad), fTR=lp(t2+pad,v1-pad), fBL=lp(t1-pad,v2+pad), fBR=lp(t2+pad,v2+pad);
        ctx.fillStyle='rgba(0,0,0,0.18)';
        quadPath([fTL[0]+3,fTL[1]+3],[fTR[0]+3,fTR[1]+3],[fBL[0]+3,fBL[1]+3],[fBR[0]+3,fBR[1]+3]); ctx.fill();
        ctx.fillStyle='#6b4c2a'; quadPath(fTL,fTR,fBL,fBR); ctx.fill();
        const TL=lp(t1,v1), TR=lp(t2,v1), BL=lp(t1,v2), BR=lp(t2,v2);
        const bp=(s,t)=>bilerp(TL,TR,BL,BR,s,t);
        const skyA=isNight?'#060a16':'#9ec4e8', skyB=isNight?'#0d1424':'#c0d8f2';
        [[bp(0,0),bp(.47,0),bp(0,.47),bp(.47,.47)],[bp(.53,0),bp(1,0),bp(.53,.47),bp(1,.47)],
         [bp(0,.53),bp(.47,.53),bp(0,1),bp(.47,1)],[bp(.53,.53),bp(1,.53),bp(.53,1),bp(1,1)]
        ].forEach(([a,b,c,d])=>{
            const g=ctx.createLinearGradient(a[0],a[1],c[0],c[1]);
            g.addColorStop(0,skyA); g.addColorStop(1,skyB);
            ctx.fillStyle=g; quadPath(a,b,c,d); ctx.fill();
        });
        ctx.fillStyle='#6b4c2a';
        quadPath(bp(0,.47),bp(1,.47),bp(0,.53),bp(1,.53)); ctx.fill();
        quadPath(bp(.47,0),bp(.53,0),bp(.47,1),bp(.53,1)); ctx.fill();
        const sTL=lp(t1-.06,v2+pad), sTR=lp(t2+.06,v2+pad), sBL=lp(t1-.09,v2+.07), sBR=lp(t2+.09,v2+.07);
        ctx.fillStyle='#8a6540'; quadPath(sTL,sTR,sBL,sBR); ctx.fill();
        if (isNight) {
            const mc=bp(0.2,0.18), mr=Math.max(5,Math.abs(TL[0]-TR[0])*0.07);
            ctx.fillStyle='rgba(200,215,255,0.55)'; ctx.beginPath(); ctx.arc(mc[0],mc[1],mr,0,Math.PI*2); ctx.fill();
            ctx.fillStyle='rgba(6,10,22,0.85)'; ctx.beginPath(); ctx.arc(mc[0]+mr*.55,mc[1]-mr*.25,mr,0,Math.PI*2); ctx.fill();
        }
    }

    // ── Library door on left wall (near edge) ─────────────────────────────────
    function drawLibraryDoor(W, H, iL, iW, iT, flY) {
        const lp  = (t, v) => wallPt('left', t, v, iL, iW, iT, flY, H, W);
        const TL = lp(0, 0.3), TR = lp(0.13, 0.3);
        const BL = lp(0, 1.0), BR = lp(0.13, 1.0);

        // Warm library glow
        const glow = ctx.createLinearGradient(TL[0], 0, TR[0], 0);
        glow.addColorStop(0, 'rgba(200,150,60,0.6)');
        glow.addColorStop(1, 'rgba(200,150,60,0)');
        ctx.fillStyle = glow; quadPath(TL, TR, BL, BR); ctx.fill();

        // Frame
        ctx.strokeStyle = '#6b4c2a'; ctx.lineWidth = 4; ctx.lineCap = 'square';
        ctx.beginPath(); ctx.moveTo(...TR); ctx.lineTo(...TL); ctx.lineTo(...BL); ctx.stroke();
        ctx.lineWidth = 2;
        ctx.beginPath(); ctx.moveTo(...TR); ctx.lineTo(...BR); ctx.stroke();

        doorBounds = [TL, TR, BR, BL];

        // Hoverable cursor label
        const boardW = Math.abs(TR[0] - TL[0]);
        if (boardW > 10) {
            const midX = (TL[0] + TR[0]) / 2;
            const midY = TL[1] + (BL[1] - TL[1]) * 0.45;
            ctx.save();
            ctx.translate(midX, midY); ctx.rotate(-Math.PI / 2 + 0.1);
            ctx.font = `${Math.max(7, Math.round(boardW * 0.5))}px sans-serif`;
            ctx.fillStyle = 'rgba(100,65,20,0.75)'; ctx.textAlign = 'center'; ctx.textBaseline = 'middle';
            ctx.fillText('library', 0, 0);
            ctx.restore();
        }
    }

    // ── Chalkboard nutrition board (right wall) ───────────────────────────────
    function drawChalkboard(W, H, iL, iW, iT, flY, progress) {
        const rp = (t, v) => wallPt('right', t, v, iL, iW, iT, flY, H, W);
        const t1=0.16, t2=0.74, v1=0.07, v2=0.82, pad=0.022;

        const fTL=rp(t1-pad,v1-pad), fTR=rp(t2+pad,v1-pad), fBL=rp(t1-pad,v2+pad), fBR=rp(t2+pad,v2+pad);
        ctx.fillStyle='rgba(0,0,0,0.22)';
        quadPath([fTL[0]+3,fTL[1]+3],[fTR[0]+3,fTR[1]+3],[fBL[0]+3,fBL[1]+3],[fBR[0]+3,fBR[1]+3]); ctx.fill();
        ctx.fillStyle='#3a2810'; quadPath(fTL,fTR,fBL,fBR); ctx.fill();

        const TL=rp(t1,v1), TR=rp(t2,v1), BL=rp(t1,v2), BR=rp(t2,v2);
        chalkboardBounds = [TL, TR, BR, BL];
        const bg=ctx.createLinearGradient(TL[0],TL[1],BL[0],BL[1]);
        bg.addColorStop(0,'#1e3818'); bg.addColorStop(1,'#162c10');
        ctx.fillStyle=bg; quadPath(TL,TR,BL,BR); ctx.fill();

        const bp=(s,t)=>bilerp(TL,TR,BL,BR,s,t);
        const boardW = Math.abs(TR[0]-TL[0]);
        const fs = Math.max(6, Math.min(12, Math.floor(boardW * 0.1)));

        // Title
        const titlePt = bp(0.5, 0.055);
        ctx.fillStyle='rgba(220,218,195,0.72)'; ctx.font=`italic ${fs}px serif`;
        ctx.textAlign='center'; ctx.textBaseline='middle';
        ctx.fillText('what to eat today', titlePt[0], titlePt[1]);

        // Divider
        const div1=bp(0.05,0.10), div2=bp(0.95,0.10);
        ctx.strokeStyle='rgba(220,218,195,0.25)'; ctx.lineWidth=0.8;
        ctx.beginPath(); ctx.moveTo(...div1); ctx.lineTo(...div2); ctx.stroke();

        // One row per nutrient
        const ROWS = [
            ['fibre',          'Fibre'],  ['fibre_soluble',  'Sol. fibre'],
            ['fibre_insoluble','Insol.'], ['potassium',      'Potassium'],
            ['vitamin_c',      'Vit C'],  ['folate',         'Folate'],
            ['calcium',        'Calcium'],['iron',           'Iron'],
            ['magnesium',      'Mg'],     ['vitamin_k',      'Vit K'],
            ['vitamin_a',      'Vit A'],  ['vitamin_d',      'Vit D'],
        ];
        const startV=0.13, rowH=0.068, labelEnd=0.30, barStart=0.32, barEnd=0.95;

        ROWS.forEach(([key, label], i) => {
            const p   = progress[key];
            const pct = p ? Math.min(1, p.pct || 0) : 0;
            const v   = startV + i * rowH;
            if (v + rowH > 0.98) return;

            const mid = v + rowH * 0.5;
            const barV1 = v + rowH * 0.25, barV2 = v + rowH * 0.75;

            // Label
            const lPos = bp(labelEnd, mid);
            ctx.fillStyle='rgba(200,198,175,0.75)';
            ctx.font=`${Math.max(5,fs-1)}px sans-serif`; ctx.textAlign='right'; ctx.textBaseline='middle';
            ctx.fillText(label, lPos[0], lPos[1]);

            // Bar background
            const bg1=bp(barStart,barV1), bg2=bp(barEnd,barV1), bg3=bp(barStart,barV2), bg4=bp(barEnd,barV2);
            ctx.fillStyle='rgba(255,255,255,0.07)'; quadPath(bg1,bg2,bg3,bg4); ctx.fill();

            // Bar fill
            const fillEnd = barStart + pct * (barEnd - barStart);
            const f1=bp(barStart,barV1), f2=bp(fillEnd,barV1), f3=bp(barStart,barV2), f4=bp(fillEnd,barV2);
            const colour = pct>=0.9?'#58e878aa':pct>=0.6?'#e8c050aa':'#e85858aa';
            ctx.fillStyle=colour; quadPath(f1,f2,f3,f4); ctx.fill();

            // Chalk-dust highlights on the filled bar
            if (pct > 0.05) {
                ctx.fillStyle='rgba(255,255,255,0.12)'; quadPath(f1,f2,[f1[0],f1[1]+2],[f2[0],f2[1]+2]); ctx.fill();
            }
        });
    }

    // ── Sheep ─────────────────────────────────────────────────────────────────
    function drawSheep(W, H, flY) {
        const img = new Image();
        img.src = 'avatars/baanabus_standing.png';
        img.onload = function () {
            const scale = W <= 640 ? 0.15 : 0.25;
            const aw = img.width * scale, ah = img.height * scale;
            ctx.drawImage(img, Math.floor(W * 0.62 - aw / 2), Math.floor(flY) - ah, aw, ah);
        };
    }

    // ── Default foods (fallback when no gap data yet) ─────────────────────────
    const DEFAULT_FOODS = [
        {name:'broccoli'},{name:'carrot'},{name:'spinach'},{name:'apple'},
        {name:'banana'},{name:'orange'},{name:'peas'},{name:'tomato'},
        {name:'sweet potato'},{name:'kiwifruit'},{name:'avocado'},{name:'feijoa'},
    ];

    // ── Main draw ─────────────────────────────────────────────────────────────
    function draw() {
        const W  = canvas.width  = window.innerWidth;
        const H  = canvas.height = window.innerHeight;
        const iW = Math.floor(W * 0.66);
        const iH = Math.floor(H * 0.66);
        const iL = Math.floor(W / 2 - iW / 2);
        const iT = Math.floor(H / 2 - iH / 2);
        const flY = iT + iH;

        ctx.clearRect(0, 0, W, H);

        const info    = window.getMelbourneInfo ? window.getMelbourneInfo() : { isNight: false };
        const foods   = gapFoods.length ? gapFoods : DEFAULT_FOODS;

        drawRoom(W, H, iL, iW, iT, iH, flY);
        if (W > 640) {
            drawKitchenWindow(W, H, iL, iW, iT, flY, info.isNight);
            drawLibraryDoor(W, H, iL, iW, iT, flY);
        }
        drawShelves(iL, iW, iT, iH);
        drawFoodItems(iL, iW, iT, iH, foods);
        drawChalkboard(W, H, iL, iW, iT, flY, nutrientProgress);
        drawSheep(W, H, flY);
    }

    // ── Fetch gap suggestions ─────────────────────────────────────────────────
    fetch('api/food_gaps.php')
        .then(r => r.json())
        .then(data => {
            nutrientProgress = data.progress || {};
            const seen = new Set();
            gapFoods = [];
            for (const s of Object.values(data.suggestions || {})) {
                for (const p of (s.picks || [])) {
                    if (!seen.has(p.name)) { seen.add(p.name); gapFoods.push({ name: p.name }); }
                }
            }
            draw();
        })
        .catch(() => draw());

    window.addEventListener('resize', draw);
    draw();

    // ── Click handling ────────────────────────────────────────────────────────
    canvas.addEventListener('click', function (e) {
        const rect = canvas.getBoundingClientRect();
        const cx = e.clientX - rect.left, cy = e.clientY - rect.top;
        if (ptInQuad(cx, cy, doorBounds)) {
            window.location.href = 'index.php';
            return;
        }
        if (ptInQuad(cx, cy, chalkboardBounds) && typeof loadOverlay === 'function') {
            loadOverlay('api/food_log_overlay.php');
        }
    });
    canvas.addEventListener('mousemove', function (e) {
        const rect = canvas.getBoundingClientRect();
        const cx = e.clientX - rect.left, cy = e.clientY - rect.top;
        canvas.style.cursor = (ptInQuad(cx, cy, doorBounds) || ptInQuad(cx, cy, chalkboardBounds)) ? 'pointer' : 'default';
    });
})();
