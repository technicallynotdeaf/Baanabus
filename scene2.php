<?php
require_once __DIR__ . '/init.php';
require_once __DIR__ . '/config_helper.php';
if (!isAuthenticated() || !isUnlocked()) { header('Location: index.php'); exit; }
require_once __DIR__ . '/header.php';
?>

<div id="cal-nav">
  <button id="cal-prev" aria-label="Previous month">&#8249;</button>
  <h2 id="cal-title">Loading…</h2>
  <button id="cal-next" aria-label="Next month">&#8250;</button>
</div>
<canvas id="calCanvas"></canvas>

<script>
(function () {
  'use strict';

  const NAVBAR_H  = 44;
  const CALNAV_H  = 44;
  const TOP_H     = NAVBAR_H + CALNAV_H;
  const MONTHS    = ['January','February','March','April','May','June',
                     'July','August','September','October','November','December'];

  let curYear, curMonth;
  let taskCache  = {};   // keyed by 'YYYY-MM'
  let cellBounds = [];

  // Expose cache invalidation so overlays (day_tasks.php) can trigger a redraw
  window.calendarInvalidate = function(month) {
    delete taskCache[month];
    const key = `${curYear}-${String(curMonth).padStart(2,'0')}`;
    if (!month || month === key) loadAndDraw();
  };

  function init() {
    const now = new Date();
    curYear  = now.getFullYear();
    curMonth = now.getMonth() + 1;
    document.body.classList.add('scene-view');
    updateNav();
    loadAndDraw();
    window.addEventListener('resize', () => {
      drawCalendar(curYear, curMonth, taskCache[`${curYear}-${String(curMonth).padStart(2,'0')}`] || []);
    });
    document.getElementById('cal-prev').addEventListener('click', prevMonth);
    document.getElementById('cal-next').addEventListener('click', nextMonth);
  }

  function updateNav() {
    document.getElementById('cal-title').textContent = `${MONTHS[curMonth - 1]} ${curYear}`;
  }

  function prevMonth() {
    if (curMonth === 1) { curMonth = 12; curYear--; } else { curMonth--; }
    updateNav(); loadAndDraw();
  }
  function nextMonth() {
    if (curMonth === 12) { curMonth = 1; curYear++; } else { curMonth++; }
    updateNav(); loadAndDraw();
  }

  async function loadAndDraw() {
    const key = `${curYear}-${String(curMonth).padStart(2,'0')}`;
    if (!taskCache[key]) {
      try {
        const r = await fetch(`api/calendar.php?month=${key}`);
        const d = await r.json();
        taskCache[key] = d.tasks || [];
      } catch(e) {
        taskCache[key] = [];
      }
    }
    drawCalendar(curYear, curMonth, taskCache[key]);
  }

  function drawCalendar(year, month, tasks) {
    const canvas = document.getElementById('calCanvas');
    const ctx    = canvas.getContext('2d');
    canvas.width  = window.innerWidth;
    canvas.height = window.innerHeight;
    const W = canvas.width, H = canvas.height;

    // Background
    ctx.fillStyle = '#faf8f3';
    ctx.fillRect(0, 0, W, H);

    // Group tasks by date (max 3 per day — cap enforced here too for display)
    const byDate = {};
    tasks.forEach(t => {
      if (!byDate[t.scheduled_date]) byDate[t.scheduled_date] = [];
      if (byDate[t.scheduled_date].length < 3) byDate[t.scheduled_date].push(t);
    });

    // Calendar math
    const firstDay    = new Date(year, month - 1, 1);
    const daysInMonth = new Date(year, month, 0).getDate();
    let   startDow    = firstDay.getDay();     // 0 = Sun
    startDow = (startDow + 6) % 7;             // Mon = 0

    const now     = new Date();
    const isThisMonth = now.getFullYear() === year && (now.getMonth() + 1) === month;
    const todayMidnight = new Date(now.getFullYear(), now.getMonth(), now.getDate());

    // Grid layout
    const padX  = 8;
    const padY  = TOP_H + 8;
    const DOW_H = 26;
    const rows  = Math.ceil((startDow + daysInMonth) / 7);
    const cellW = Math.floor((W - padX * 2) / 7);
    const cellH = Math.floor((H - padY - DOW_H - 8) / rows);

    // Day-of-week header
    const DOW = ['Mon','Tue','Wed','Thu','Fri','Sat','Sun'];
    ctx.font         = 'bold 11px system-ui,sans-serif';
    ctx.textAlign    = 'center';
    ctx.textBaseline = 'middle';
    DOW.forEach((d, i) => {
      ctx.fillStyle = (i >= 5) ? '#bbb' : '#aaa';
      ctx.fillText(d, padX + i * cellW + cellW / 2, padY + DOW_H / 2);
    });

    cellBounds = [];

    for (let day = 1; day <= daysInMonth; day++) {
      const idx  = startDow + day - 1;
      const col  = idx % 7;
      const row  = Math.floor(idx / 7);
      const cx   = padX + col * cellW;
      const cy   = padY + DOW_H + row * cellH;

      const dateStr  = `${year}-${String(month).padStart(2,'0')}-${String(day).padStart(2,'0')}`;
      const dayTasks = byDate[dateStr] || [];
      const isFull   = dayTasks.length >= 3;
      const isToday  = isThisMonth && now.getDate() === day;
      const isPast   = new Date(year, month - 1, day) < todayMidnight;

      // Cell background
      ctx.fillStyle = isToday ? '#fff8e1' : isPast ? '#f2efe8' : '#ffffff';
      ctx.fillRect(cx + 1, cy + 1, cellW - 2, cellH - 2);

      // Cell border
      ctx.strokeStyle = isFull ? '#ef9a9a' : '#e0d8cc';
      ctx.lineWidth   = isFull ? 1.5 : 0.5;
      ctx.strokeRect(cx + 0.5, cy + 0.5, cellW - 1, cellH - 1);

      // Today: amber left edge
      if (isToday) {
        ctx.fillStyle = '#f57c00';
        ctx.fillRect(cx + 1, cy + 1, 3, cellH - 2);
      }

      // Day number
      ctx.fillStyle    = isPast ? '#ccc' : isToday ? '#e65100' : '#555';
      ctx.font         = `${isToday ? '700' : '400'} 13px system-ui,sans-serif`;
      ctx.textAlign    = 'left';
      ctx.textBaseline = 'top';
      ctx.fillText(String(day), cx + (isToday ? 8 : 5), cy + 5);

      // Task dots (up to 3)
      if (dayTasks.length > 0) {
        const dotR    = Math.max(3, Math.min(5, Math.floor(cellH / 7)));
        const gap     = dotR * 2 + 4;
        const totalW  = dayTasks.length * dotR * 2 + (dayTasks.length - 1) * 4;
        const dotX0   = cx + cellW / 2 - totalW / 2 + dotR;
        const dotY    = cy + cellH - dotR - 5;
        ctx.globalAlpha = isPast ? 0.35 : 1;
        dayTasks.forEach((t, i) => {
          const urg = t.urgency || '';
          ctx.fillStyle = urg === 'high'   ? '#ef5350'
                        : urg === 'medium' ? '#ffa726'
                        : urg === 'low'    ? '#66bb6a'
                        :                    '#90a4ae';
          ctx.beginPath();
          ctx.arc(dotX0 + i * gap, dotY, dotR, 0, Math.PI * 2);
          ctx.fill();
        });
        ctx.globalAlpha = 1;
      }

      cellBounds.push({ day, dateStr, isFull, isPast, x: cx, y: cy, w: cellW, h: cellH });
    }
  }

  // Tap a day → overlay
  document.getElementById('calCanvas').addEventListener('click', function(e) {
    const rect = this.getBoundingClientRect();
    const px = e.clientX - rect.left;
    const py = e.clientY - rect.top;
    for (const cell of cellBounds) {
      if (px >= cell.x && px <= cell.x + cell.w && py >= cell.y && py <= cell.y + cell.h) {
        loadOverlay(`api/day_tasks.php?date=${cell.dateStr}`);
        break;
      }
    }
  });

  init();
})();
</script>

<?php require_once __DIR__ . '/footer.php'; ?>
