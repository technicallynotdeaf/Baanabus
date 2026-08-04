(function () {
  'use strict';

  const NAVBAR_H  = 44;
  const CALNAV_H  = 44;
  const TOP_H     = NAVBAR_H + CALNAV_H;
  const MONTHS    = ['January','February','March','April','May','June',
                     'July','August','September','October','November','December'];

  let curYear, curMonth;
  let taskCache     = {};
  let birthdayCache = {};
  let cellBounds = [];

  window.calendarInvalidate = function(month) {
    delete taskCache[month];
    delete birthdayCache[month];
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
      const key = `${curYear}-${String(curMonth).padStart(2,'0')}`;
      drawCalendar(curYear, curMonth, taskCache[key] || [], birthdayCache[key] || []);
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
        taskCache[key]     = d.tasks || [];
        birthdayCache[key] = d.birthdays || [];
      } catch(e) {
        taskCache[key]     = [];
        birthdayCache[key] = [];
      }
    }
    drawCalendar(curYear, curMonth, taskCache[key], birthdayCache[key] || []);
  }

  function drawCalendar(year, month, tasks, birthdays) {
    const canvas = document.getElementById('calCanvas');
    const ctx    = canvas.getContext('2d');
    canvas.width  = window.innerWidth;
    canvas.height = window.innerHeight;
    const W = canvas.width, H = canvas.height;

    ctx.fillStyle = '#faf8f3';
    ctx.fillRect(0, 0, W, H);

    const byDate = {};
    tasks.forEach(t => {
      if (!byDate[t.scheduled_date]) byDate[t.scheduled_date] = [];
      if (byDate[t.scheduled_date].length < 3) byDate[t.scheduled_date].push(t);
    });

    const birthdaysByDate = {};
    (birthdays || []).forEach(b => {
      if (!birthdaysByDate[b.date]) birthdaysByDate[b.date] = [];
      birthdaysByDate[b.date].push(b);
    });

    const firstDay    = new Date(year, month - 1, 1);
    const daysInMonth = new Date(year, month, 0).getDate();
    let   startDow    = firstDay.getDay();
    startDow = (startDow + 6) % 7;

    const now     = new Date();
    const isThisMonth = now.getFullYear() === year && (now.getMonth() + 1) === month;
    const todayMidnight = new Date(now.getFullYear(), now.getMonth(), now.getDate());

    const padX  = 8;
    const padY  = TOP_H + 8;
    const DOW_H = 26;
    const rows  = Math.ceil((startDow + daysInMonth) / 7);
    const cellW = Math.floor((W - padX * 2) / 7);
    const cellH = Math.floor((H - padY - DOW_H - 8) / rows);

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

      ctx.fillStyle = isToday ? '#fff8e1' : isPast ? '#f2efe8' : '#ffffff';
      ctx.fillRect(cx + 1, cy + 1, cellW - 2, cellH - 2);

      ctx.strokeStyle = isFull ? '#ef9a9a' : '#e0d8cc';
      ctx.lineWidth   = isFull ? 1.5 : 0.5;
      ctx.strokeRect(cx + 0.5, cy + 0.5, cellW - 1, cellH - 1);

      if (isToday) {
        ctx.fillStyle = '#f57c00';
        ctx.fillRect(cx + 1, cy + 1, 3, cellH - 2);
      }

      ctx.fillStyle    = isPast ? '#ccc' : isToday ? '#e65100' : '#555';
      ctx.font         = `${isToday ? '700' : '400'} 13px system-ui,sans-serif`;
      ctx.textAlign    = 'left';
      ctx.textBaseline = 'top';
      ctx.fillText(String(day), cx + (isToday ? 8 : 5), cy + 5);

      const dayBirthdays = birthdaysByDate[dateStr] || [];
      if (dayBirthdays.length > 0) {
        ctx.globalAlpha  = isPast ? 0.4 : 1;
        ctx.font         = `${Math.max(12, Math.min(18, Math.floor(cellH / 3.2)))}px system-ui,sans-serif`;
        ctx.textAlign    = 'right';
        ctx.textBaseline = 'top';
        ctx.fillText('🎂', cx + cellW - 4, cy + 3);
        ctx.globalAlpha  = 1;
      }

      if (dayTasks.length > 0) {
        const dotR   = Math.max(3, Math.min(5, Math.floor(cellH / 7)));
        const gap    = dotR * 2 + 4;
        const totalW = dayTasks.length * dotR * 2 + (dayTasks.length - 1) * 4;
        const dotX0  = cx + cellW / 2 - totalW / 2 + dotR;
        const dotY   = cy + cellH - dotR - 5;
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
