(function () {
    const canvas = document.getElementById('sceneCanvas');
    if (!canvas) return;

    const PAPERS        = parseInt(canvas.dataset.papers, 10) || 0;
    const STORY_STARTED       = canvas.dataset.storyStarted === '1';
    const BADGE_IDS           = JSON.parse(canvas.dataset.badgeIds || '[]');
    const STORY_BOOKS_AVAIL   = JSON.parse(canvas.dataset.storyBooksAvail || '[]');
    const STORY_BOOKS_EXIST   = JSON.parse(canvas.dataset.storyBooksExist || '[]');
    // Mutable (not const): kept fresh by the 30s heartbeat poll via
    // window.updateStoryBadge() below, since pages can be earned through
    // paths this tab doesn't see directly (agent API completions, etc.) and
    // the badge would otherwise stay stuck at whatever it was on page load.
    let STORY_CURRENT_BOOK  = parseInt(canvas.dataset.storyCurrentBook, 10) || 0;
    let STORY_PAGES_AVAIL   = parseInt(canvas.dataset.storyPagesAvail,  10) || 0;
    const SECOND_BOOKS_AVAIL = JSON.parse(canvas.dataset.secondBooksAvail || '[]');
    const SECOND_BOOKS_EXIST = JSON.parse(canvas.dataset.secondBooksExist || '[]');
    let SECOND_CURRENT_BOOK  = parseInt(canvas.dataset.secondCurrentBook, 10) || 0;
    let SECOND_PAGES_AVAIL   = parseInt(canvas.dataset.secondPagesAvail,  10) || 0;
    const THIRD_BOOKS_AVAIL  = JSON.parse(canvas.dataset.thirdBooksAvail || '[]');
    const THIRD_BOOKS_EXIST  = JSON.parse(canvas.dataset.thirdBooksExist || '[]');
    let THIRD_CURRENT_BOOK   = parseInt(canvas.dataset.thirdCurrentBook, 10) || 0;
    let THIRD_PAGES_AVAIL    = parseInt(canvas.dataset.thirdPagesAvail,  10) || 0;
    const FOURTH_BOOKS_AVAIL = JSON.parse(canvas.dataset.fourthBooksAvail || '[]');
    const FOURTH_BOOKS_EXIST = JSON.parse(canvas.dataset.fourthBooksExist || '[]');
    let FOURTH_CURRENT_BOOK  = parseInt(canvas.dataset.fourthCurrentBook, 10) || 0;
    let FOURTH_PAGES_AVAIL   = parseInt(canvas.dataset.fourthPagesAvail,  10) || 0;
    const FIFTH_BOOKS_AVAIL  = JSON.parse(canvas.dataset.fifthBooksAvail || '[]');
    const FIFTH_BOOKS_EXIST  = JSON.parse(canvas.dataset.fifthBooksExist || '[]');
    let FIFTH_CURRENT_BOOK   = parseInt(canvas.dataset.fifthCurrentBook, 10) || 0;
    let FIFTH_PAGES_AVAIL    = parseInt(canvas.dataset.fifthPagesAvail,  10) || 0;
    const OBJECTS_OUT         = canvas.dataset.objectsOut === '1';
    const OBJECTS_RESOLVED    = canvas.dataset.objectsResolved === '1';
    const CYCLE_DAY           = parseInt(canvas.dataset.cycleDay, 10) || 0;
    const CYCLE_LEN           = parseInt(canvas.dataset.cycleLen,  10) || 0;
    const CYCLE_PHASES        = JSON.parse(canvas.dataset.cyclePhases || '[]');
    const HAS_CYCLE           = CYCLE_DAY > 0 && CYCLE_LEN > 0 && CYCLE_PHASES.length > 0;
    const TOP3                = JSON.parse(canvas.dataset.top3 || '[]');

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

    // Second book set (row 2 of the left shelf section) — a new 24-book slot
    // still being written. No per-book colour of its own like STORY_BOOKS;
    // instead it cycles through shades of blue, used only once a book is the
    // current active one (see drawSecondBookSet). Heights vary the same way
    // for visual texture even though every spine is narrow.
    const SECOND_BOOKS = Array.from({ length: 24 }, (_, i) => ({
        id: i + 1,
        h: 0.70 + ((i * 7) % 18) / 100,
        activeColor: `hsl(${205 + (i % 6) * 8}, ${52 + (i % 3) * 8}%, ${30 + (i % 4) * 7}%)`,
    }));

    // Third 24-book set (row 2 of the left shelf section, one shelf below the
    // second row) — "The Wayfarer's Instrument". Same slot mechanism as
    // SECOND_BOOKS, but cycles through warm brass/amber shades instead of
    // blue, so the shelf reads as a visually distinct arc at a glance.
    const THIRD_BOOKS = Array.from({ length: 24 }, (_, i) => ({
        id: i + 1,
        h: 0.70 + ((i * 5) % 18) / 100,
        activeColor: `hsl(${32 + (i % 6) * 6}, ${58 + (i % 3) * 8}%, ${34 + (i % 4) * 6}%)`,
    }));

    // Fourth 24-book set (row 3 of the left shelf section) — "The Salt Road".
    // Same slot mechanism again, cycling through sandy/terracotta shades to
    // stay visually distinct from the brass (third row) and blue (second row)
    // sets above it.
    const FOURTH_BOOKS = Array.from({ length: 24 }, (_, i) => ({
        id: i + 1,
        h: 0.70 + ((i * 3) % 18) / 100,
        activeColor: `hsl(${18 + (i % 6) * 7}, ${50 + (i % 3) * 9}%, ${36 + (i % 4) * 6}%)`,
    }));

    // Fifth 24-book set (row 4 of the left shelf section) — "The Spice Box".
    // Same mechanism again, cycling through deep reds/greens (spice/herb
    // toned) to stay visually distinct from the rows above it.
    const FIFTH_BOOKS = Array.from({ length: 24 }, (_, i) => ({
        id: i + 1,
        h: 0.70 + ((i * 9) % 18) / 100,
        activeColor: `hsl(${5 + (i % 6) * 10}, ${55 + (i % 3) * 8}%, ${32 + (i % 4) * 6}%)`,
    }));

    let bookBounds        = [];
    let secondBookBounds  = [];
    let thirdBookBounds   = [];
    let fourthBookBounds  = [];
    let fifthBookBounds   = [];
    let boardBounds       = null;
    let kitchenDoorBounds = null;
    let toyboxBounds      = null;
    let chestBounds       = null;
    let calendarBounds    = null;
    let cycleDial         = null; // { cx, cy, rx, ry, quad }
    let jarBounds         = [];

    function roundRectPath(ctx, x, y, w, h, r) {
        ctx.beginPath();
        ctx.moveTo(x + r, y);
        ctx.arcTo(x + w, y, x + w, y + h, r);
        ctx.arcTo(x + w, y + h, x, y + h, r);
        ctx.arcTo(x, y + h, x, y, r);
        ctx.arcTo(x, y, x + w, y, r);
        ctx.closePath();
    }

    function drawTop3Jars(ctx, startX, by, jarW, jarH, gap, entries) {
        jarBounds = [];
        if (!entries || !entries.length) return;
        entries.forEach((e, i) => {
            const bx = startX + i * (jarW + gap);
            jarBounds.push({ x: bx, y: by, w: jarW, h: jarH });

            const target = e.target > 0 ? e.target : 1;
            const pct    = Math.max(0, Math.min(1, e.progress / target));
            const done   = !!e.completed_at;

            const neckH  = Math.round(jarH * 0.16);
            const neckW  = Math.round(jarW * 0.55);
            const bodyY  = by + neckH;
            const bodyH  = jarH - neckH;
            const neckX  = bx + Math.round((jarW - neckW) / 2);
            const r      = Math.round(jarW * 0.14);

            // Drop shadow
            ctx.fillStyle = 'rgba(0,0,0,0.18)';
            roundRectPath(ctx, bx + 2, bodyY + 2, jarW, bodyH, r);
            ctx.fill();

            // Glass body
            ctx.fillStyle = 'rgba(255,255,255,0.16)';
            roundRectPath(ctx, bx, bodyY, jarW, bodyH, r);
            ctx.fill();

            // Fill level
            const fillH = Math.round(bodyH * pct);
            if (fillH > 1) {
                ctx.save();
                roundRectPath(ctx, bx, bodyY, jarW, bodyH, r);
                ctx.clip();
                const topC = done ? '#2ecc71' : '#f5a623';
                const botC = done ? '#25a25b' : '#d9820f';
                const grad = ctx.createLinearGradient(bx, bodyY + bodyH - fillH, bx, bodyY + bodyH);
                grad.addColorStop(0, topC);
                grad.addColorStop(1, botC);
                ctx.fillStyle = grad;
                ctx.fillRect(bx, bodyY + bodyH - fillH, jarW, fillH);
                ctx.restore();
            }

            // Glass outline + rim highlight
            ctx.strokeStyle = 'rgba(255,255,255,0.35)';
            ctx.lineWidth   = 1;
            roundRectPath(ctx, bx, bodyY, jarW, bodyH, r);
            ctx.stroke();

            // Neck + lid
            ctx.fillStyle = '#9aa4ac';
            ctx.fillRect(neckX, by, neckW, neckH);
            ctx.fillStyle = done ? '#2ecc71' : '#7c8890';
            ctx.fillRect(neckX - 2, by - Math.round(neckH * 0.35), neckW + 4, Math.round(neckH * 0.55));
            ctx.fillStyle = 'rgba(255,255,255,0.25)';
            ctx.fillRect(neckX - 2, by - Math.round(neckH * 0.35), neckW + 4, 1);

            if (done) {
                ctx.fillStyle = 'rgba(255,255,255,0.55)';
                ctx.beginPath();
                ctx.arc(bx + jarW * 0.30, bodyY + bodyH * 0.32, Math.max(1.5, jarW * 0.045), 0, Math.PI * 2);
                ctx.fill();
            }
        });
    }

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

    // All 24 quilt books now share a single narrow row (row 0 of the left shelf
    // section) — clicking anywhere in the row opens the same book-selector
    // overlay regardless of which spine was hit, so individual spines don't
    // need to stay wide enough to read.
    function drawStoryBooks(ctx, innerLeft, innerTop, innerWidth, innerHeight, clearance) {
        bookBounds = [];
        const secW   = Math.floor(innerWidth / 3);
        const shelfH = Math.floor((innerHeight - clearance) / 6);

        const sidePad = 3;
        const gap     = 1;
        const n       = STORY_BOOKS.length;
        const bookW   = Math.max(1, Math.floor((secW - sidePad * 2 - gap * (n - 1)) / n));
        const refBkH  = Math.floor(shelfH * 0.75);
        const bayBot  = innerTop + clearance + shelfH;

        STORY_BOOKS.forEach((book, i) => {
            const bkH = Math.floor(refBkH * book.h);
            const bx  = innerLeft + sidePad + i * (bookW + gap);
            const by  = bayBot - bkH;

            const unlocked = STORY_BOOKS_AVAIL.includes(book.id);
            const exists   = STORY_BOOKS_EXIST.includes(book.id);
            const color    = unlocked ? book.color : (exists ? '#606060' : '#c0c0c0');

            // Drop shadow
            ctx.fillStyle = 'rgba(0,0,0,0.22)';
            ctx.fillRect(bx + 1, by + 1, bookW, bkH);

            // Spine fill
            ctx.fillStyle = color;
            ctx.fillRect(bx, by, bookW, bkH);

            // Top highlight
            ctx.fillStyle = 'rgba(255,255,255,0.18)';
            ctx.fillRect(bx, by, bookW, 1);

            // Unlocked: a thin gold band near the top
            if (unlocked) {
                ctx.fillStyle = 'rgba(245,166,35,0.8)';
                ctx.fillRect(bx, by + Math.max(2, Math.floor(bkH * 0.1)), bookW, 1);
            }

            bookBounds.push({ id: book.id, x: bx, y: by, w: bookW, h: bkH, unlocked });
        });

        // Unread-pages badge: drawn last so it sits on top of the neighbouring
        // book's spine rather than being painted over by it.
        if (STORY_CURRENT_BOOK && STORY_PAGES_AVAIL > 0) {
            const current = bookBounds.find(b => b.id === STORY_CURRENT_BOOK && b.unlocked);
            if (current) drawUnreadBadge(ctx, current.x + current.w, current.y, Math.max(current.w, 10), STORY_PAGES_AVAIL);
        }
    }

    // Second 24-book set — row 1 of the same left shelf section, one shelf
    // below the quilt row. Every slot is pale grey until its
    // content/stories/auntie_NN.php file exists (dark grey), and only the
    // single current in-progress book (if any) shows in its shade of blue.
    // Clicking opens api/story_books.php?family=auntie, same mechanism as
    // the quilt row.
    function drawSecondBookSet(ctx, innerLeft, innerTop, innerWidth, innerHeight, clearance) {
        secondBookBounds = [];
        const secW   = Math.floor(innerWidth / 3);
        const shelfH = Math.floor((innerHeight - clearance) / 6);

        const sidePad = 3;
        const gap     = 1;
        const n       = SECOND_BOOKS.length;
        const bookW   = Math.max(1, Math.floor((secW - sidePad * 2 - gap * (n - 1)) / n));
        const refBkH  = Math.floor(shelfH * 0.75);
        const bayBot  = innerTop + clearance + shelfH * 2;

        SECOND_BOOKS.forEach((book, i) => {
            const bkH = Math.floor(refBkH * book.h);
            const bx  = innerLeft + sidePad + i * (bookW + gap);
            const by  = bayBot - bkH;

            const exists = SECOND_BOOKS_EXIST.includes(book.id);
            const active = exists && SECOND_CURRENT_BOOK === book.id;
            const color  = !exists ? '#dcdcdc' : (active ? book.activeColor : '#585858');

            ctx.fillStyle = 'rgba(0,0,0,0.22)';
            ctx.fillRect(bx + 1, by + 1, bookW, bkH);

            ctx.fillStyle = color;
            ctx.fillRect(bx, by, bookW, bkH);

            ctx.fillStyle = 'rgba(255,255,255,0.16)';
            ctx.fillRect(bx, by, bookW, 1);

            secondBookBounds.push({ id: book.id, x: bx, y: by, w: bookW, h: bkH, active });
        });

        if (SECOND_CURRENT_BOOK && SECOND_PAGES_AVAIL > 0) {
            const current = secondBookBounds.find(b => b.id === SECOND_CURRENT_BOOK && b.active);
            if (current) drawUnreadBadge(ctx, current.x + current.w, current.y, Math.max(current.w, 10), SECOND_PAGES_AVAIL);
        }
    }

    // Third 24-book set — row 2 of the same left shelf section, one shelf
    // below the second row. Same "not written yet" pale-grey / dark-grey /
    // active-shade mechanism as drawSecondBookSet, just one bay lower and
    // warm-toned instead of blue. Clicking opens
    // api/story_books.php?family=wayfarer.
    function drawThirdBookSet(ctx, innerLeft, innerTop, innerWidth, innerHeight, clearance) {
        thirdBookBounds = [];
        const secW   = Math.floor(innerWidth / 3);
        const shelfH = Math.floor((innerHeight - clearance) / 6);

        const sidePad = 3;
        const gap     = 1;
        const n       = THIRD_BOOKS.length;
        const bookW   = Math.max(1, Math.floor((secW - sidePad * 2 - gap * (n - 1)) / n));
        const refBkH  = Math.floor(shelfH * 0.75);
        const bayBot  = innerTop + clearance + shelfH * 3;

        THIRD_BOOKS.forEach((book, i) => {
            const bkH = Math.floor(refBkH * book.h);
            const bx  = innerLeft + sidePad + i * (bookW + gap);
            const by  = bayBot - bkH;

            const exists = THIRD_BOOKS_EXIST.includes(book.id);
            const active = exists && THIRD_CURRENT_BOOK === book.id;
            const color  = !exists ? '#dcdcdc' : (active ? book.activeColor : '#585858');

            ctx.fillStyle = 'rgba(0,0,0,0.22)';
            ctx.fillRect(bx + 1, by + 1, bookW, bkH);

            ctx.fillStyle = color;
            ctx.fillRect(bx, by, bookW, bkH);

            ctx.fillStyle = 'rgba(255,255,255,0.16)';
            ctx.fillRect(bx, by, bookW, 1);

            thirdBookBounds.push({ id: book.id, x: bx, y: by, w: bookW, h: bkH, active });
        });

        if (THIRD_CURRENT_BOOK && THIRD_PAGES_AVAIL > 0) {
            const current = thirdBookBounds.find(b => b.id === THIRD_CURRENT_BOOK && b.active);
            if (current) drawUnreadBadge(ctx, current.x + current.w, current.y, Math.max(current.w, 10), THIRD_PAGES_AVAIL);
        }
    }

    // Fourth 24-book set — row 3 of the same left shelf section, one shelf
    // below the third row. Same mechanism as the rows above, sandy/terracotta
    // toned. Clicking opens api/story_books.php?family=saltroad.
    function drawFourthBookSet(ctx, innerLeft, innerTop, innerWidth, innerHeight, clearance) {
        fourthBookBounds = [];
        const secW   = Math.floor(innerWidth / 3);
        const shelfH = Math.floor((innerHeight - clearance) / 6);

        const sidePad = 3;
        const gap     = 1;
        const n       = FOURTH_BOOKS.length;
        const bookW   = Math.max(1, Math.floor((secW - sidePad * 2 - gap * (n - 1)) / n));
        const refBkH  = Math.floor(shelfH * 0.75);
        const bayBot  = innerTop + clearance + shelfH * 4;

        FOURTH_BOOKS.forEach((book, i) => {
            const bkH = Math.floor(refBkH * book.h);
            const bx  = innerLeft + sidePad + i * (bookW + gap);
            const by  = bayBot - bkH;

            const exists = FOURTH_BOOKS_EXIST.includes(book.id);
            const active = exists && FOURTH_CURRENT_BOOK === book.id;
            const color  = !exists ? '#dcdcdc' : (active ? book.activeColor : '#585858');

            ctx.fillStyle = 'rgba(0,0,0,0.22)';
            ctx.fillRect(bx + 1, by + 1, bookW, bkH);

            ctx.fillStyle = color;
            ctx.fillRect(bx, by, bookW, bkH);

            ctx.fillStyle = 'rgba(255,255,255,0.16)';
            ctx.fillRect(bx, by, bookW, 1);

            fourthBookBounds.push({ id: book.id, x: bx, y: by, w: bookW, h: bkH, active });
        });

        if (FOURTH_CURRENT_BOOK && FOURTH_PAGES_AVAIL > 0) {
            const current = fourthBookBounds.find(b => b.id === FOURTH_CURRENT_BOOK && b.active);
            if (current) drawUnreadBadge(ctx, current.x + current.w, current.y, Math.max(current.w, 10), FOURTH_PAGES_AVAIL);
        }
    }

    // Fifth 24-book set — row 4 of the same left shelf section, one shelf
    // below the fourth row. Clicking opens
    // api/story_books.php?family=spicebox.
    function drawFifthBookSet(ctx, innerLeft, innerTop, innerWidth, innerHeight, clearance) {
        fifthBookBounds = [];
        const secW   = Math.floor(innerWidth / 3);
        const shelfH = Math.floor((innerHeight - clearance) / 6);

        const sidePad = 3;
        const gap     = 1;
        const n       = FIFTH_BOOKS.length;
        const bookW   = Math.max(1, Math.floor((secW - sidePad * 2 - gap * (n - 1)) / n));
        const refBkH  = Math.floor(shelfH * 0.75);
        const bayBot  = innerTop + clearance + shelfH * 5;

        FIFTH_BOOKS.forEach((book, i) => {
            const bkH = Math.floor(refBkH * book.h);
            const bx  = innerLeft + sidePad + i * (bookW + gap);
            const by  = bayBot - bkH;

            const exists = FIFTH_BOOKS_EXIST.includes(book.id);
            const active = exists && FIFTH_CURRENT_BOOK === book.id;
            const color  = !exists ? '#dcdcdc' : (active ? book.activeColor : '#585858');

            ctx.fillStyle = 'rgba(0,0,0,0.22)';
            ctx.fillRect(bx + 1, by + 1, bookW, bkH);

            ctx.fillStyle = color;
            ctx.fillRect(bx, by, bookW, bkH);

            ctx.fillStyle = 'rgba(255,255,255,0.16)';
            ctx.fillRect(bx, by, bookW, 1);

            fifthBookBounds.push({ id: book.id, x: bx, y: by, w: bookW, h: bkH, active });
        });

        if (FIFTH_CURRENT_BOOK && FIFTH_PAGES_AVAIL > 0) {
            const current = fifthBookBounds.find(b => b.id === FIFTH_CURRENT_BOOK && b.active);
            if (current) drawUnreadBadge(ctx, current.x + current.w, current.y, Math.max(current.w, 10), FIFTH_PAGES_AVAIL);
        }
    }

    function drawUnreadBadge(ctx, cx, cy, bookW, count) {
        const r = Math.max(5, Math.min(9, Math.round(bookW * 0.32)));

        ctx.fillStyle = 'rgba(0,0,0,0.28)';
        ctx.beginPath(); ctx.arc(cx + 1, cy + 1, r, 0, Math.PI * 2); ctx.fill();

        ctx.fillStyle = '#e0342a';
        ctx.beginPath(); ctx.arc(cx, cy, r, 0, Math.PI * 2); ctx.fill();

        ctx.strokeStyle = 'rgba(255,255,255,0.85)';
        ctx.lineWidth = 1;
        ctx.stroke();

        ctx.fillStyle = 'rgba(255,255,255,0.30)';
        ctx.beginPath();
        ctx.arc(cx - r * 0.3, cy - r * 0.3, r * 0.35, 0, Math.PI * 2);
        ctx.fill();

        const label = count > 9 ? '9+' : String(count);
        ctx.fillStyle = '#fff';
        ctx.font = `bold ${Math.max(7, Math.round(r * 1.15))}px sans-serif`;
        ctx.textAlign = 'center';
        ctx.textBaseline = 'middle';
        ctx.fillText(label, cx, cy + 0.5);
        ctx.textAlign = 'left';
        ctx.textBaseline = 'alphabetic';
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
        const v1  = 0.52, v2 = 0.74;
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

    function drawToybox(ctx, bx, by, bw, bh, hasObjects) {
        toyboxBounds = { x: bx, y: by, w: bw, h: bh };
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
            const itemR = Math.max(3, Math.round(Math.min(bw, bh) * 0.085));
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

    function drawTreasureChest(ctx, bx, by, bw, bh, hasResolved) {
        chestBounds = null;
        if (!hasResolved) return;
        chestBounds = { x: bx, y: by, w: bw, h: bh };

        const lidH  = Math.round(bh * 0.38);
        const bodyH = bh - lidH;
        const bodyY = by + lidH;
        const archH = Math.round(lidH * 0.32); // how far the dome rises inside lidH

        // Drop shadow
        ctx.fillStyle = 'rgba(0,0,0,0.18)';
        ctx.fillRect(bx + 3, by + 3, bw, bh);

        // === BODY ===
        const bg = ctx.createLinearGradient(bx, bodyY, bx + bw, bodyY);
        bg.addColorStop(0, '#7a4518');
        bg.addColorStop(0.5, '#9a5828');
        bg.addColorStop(1, '#5a3010');
        ctx.fillStyle = bg;
        ctx.fillRect(bx, bodyY, bw, bodyH);

        // Horizontal metal band on body
        const bandH = Math.max(4, Math.round(bodyH * 0.20));
        const bandY = bodyY + Math.round((bodyH - bandH) / 2);
        ctx.fillStyle = '#363030';
        ctx.fillRect(bx, bandY, bw, bandH);
        ctx.fillStyle = 'rgba(255,255,255,0.10)';
        ctx.fillRect(bx, bandY, bw, 1);

        // Band rivets
        const rivetR = Math.max(2, Math.round(bw * 0.028));
        [0.18, 0.50, 0.82].forEach(s => {
            const rx = bx + Math.round(bw * s);
            const ry = bandY + Math.round(bandH / 2);
            ctx.fillStyle = 'rgba(0,0,0,0.22)';
            ctx.beginPath(); ctx.arc(rx + 1, ry + 1, rivetR, 0, Math.PI * 2); ctx.fill();
            ctx.fillStyle = '#909080';
            ctx.beginPath(); ctx.arc(rx, ry, rivetR, 0, Math.PI * 2); ctx.fill();
            ctx.fillStyle = 'rgba(255,255,255,0.28)';
            ctx.beginPath(); ctx.arc(rx - rivetR * 0.28, ry - rivetR * 0.32, rivetR * 0.4, 0, Math.PI * 2); ctx.fill();
        });

        // Body corner brackets
        const bktS = Math.max(3, Math.round(bw * 0.055));
        ctx.fillStyle = '#484038';
        [[bx, bodyY], [bx + bw - bktS, bodyY],
         [bx, bodyY + bodyH - bktS], [bx + bw - bktS, bodyY + bodyH - bktS]
        ].forEach(([sx, sy]) => ctx.fillRect(sx, sy, bktS, bktS));

        // === LID (domed top) ===
        const lidGrad = ctx.createLinearGradient(bx - 2, by, bx - 2, bodyY);
        lidGrad.addColorStop(0, '#d08030');
        lidGrad.addColorStop(0.45, '#b06020');
        lidGrad.addColorStop(1, '#804018');
        ctx.fillStyle = lidGrad;
        ctx.beginPath();
        ctx.moveTo(bx - 2, bodyY);
        ctx.lineTo(bx - 2, by + archH);
        ctx.quadraticCurveTo(bx - 2, by, bx + bw / 2, by);
        ctx.quadraticCurveTo(bx + bw + 2, by, bx + bw + 2, by + archH);
        ctx.lineTo(bx + bw + 2, bodyY);
        ctx.closePath();
        ctx.fill();

        // Arch highlight (top catch-light)
        ctx.strokeStyle = 'rgba(255,255,255,0.22)';
        ctx.lineWidth = 1.5;
        ctx.beginPath();
        ctx.moveTo(bx - 2 + 3, by + archH - 1);
        ctx.quadraticCurveTo(bx + bw / 2, by + 2, bx + bw + 2 - 3, by + archH - 1);
        ctx.stroke();

        // Seam shadow at lid/body join
        ctx.fillStyle = 'rgba(0,0,0,0.30)';
        ctx.fillRect(bx - 2, bodyY - 2, bw + 4, 2);

        // Horizontal metal band on lid
        const lidBandY = by + archH + Math.round((lidH - archH) * 0.38);
        const lidBandH = Math.max(3, Math.round(lidH * 0.16));
        ctx.fillStyle = '#363030';
        ctx.fillRect(bx - 2, lidBandY, bw + 4, lidBandH);
        ctx.fillStyle = 'rgba(255,255,255,0.10)';
        ctx.fillRect(bx - 2, lidBandY, bw + 4, 1);

        // Lid band rivets
        const lidBandMidY = lidBandY + Math.round(lidBandH / 2);
        [0.18, 0.50, 0.82].forEach(s => {
            const rx = bx - 2 + Math.round((bw + 4) * s);
            ctx.fillStyle = 'rgba(0,0,0,0.22)';
            ctx.beginPath(); ctx.arc(rx + 1, lidBandMidY + 1, rivetR, 0, Math.PI * 2); ctx.fill();
            ctx.fillStyle = '#909080';
            ctx.beginPath(); ctx.arc(rx, lidBandMidY, rivetR, 0, Math.PI * 2); ctx.fill();
            ctx.fillStyle = 'rgba(255,255,255,0.28)';
            ctx.beginPath(); ctx.arc(rx - rivetR * 0.28, lidBandMidY - rivetR * 0.32, rivetR * 0.4, 0, Math.PI * 2); ctx.fill();
        });

        // Lid corner brackets
        ctx.fillStyle = '#484038';
        [[bx - 2, bodyY - bktS], [bx + bw + 2 - bktS, bodyY - bktS]
        ].forEach(([sx, sy]) => ctx.fillRect(sx, sy, bktS, bktS));

        // === GOLD PADLOCK at centre seam ===
        const lockW = Math.max(9, Math.round(bw * 0.16));
        const lockH = Math.max(6, Math.round(bh * 0.12));
        const lockX = bx + Math.round((bw - lockW) / 2);
        const lockY = bodyY - Math.round(lockH * 0.48);
        const shackleR = lockW * 0.26;

        // Lock body shadow
        ctx.fillStyle = 'rgba(0,0,0,0.22)';
        ctx.fillRect(lockX + 1, lockY + 1, lockW, lockH);
        // Lock body
        ctx.fillStyle = '#d4a820';
        ctx.fillRect(lockX, lockY, lockW, lockH);
        ctx.fillStyle = 'rgba(255,255,255,0.28)';
        ctx.fillRect(lockX, lockY, lockW, 2);
        // Inner recess
        ctx.fillStyle = '#8a6815';
        ctx.fillRect(lockX + 2, lockY + 3, lockW - 4, lockH - 4);

        // Shackle (U-arch above lock body)
        ctx.strokeStyle = '#d4a820';
        ctx.lineWidth = Math.max(2, Math.round(lockW * 0.20));
        ctx.lineCap = 'round';
        ctx.beginPath();
        ctx.arc(lockX + lockW / 2, lockY, shackleR, Math.PI, 0);
        ctx.stroke();

        // Keyhole
        ctx.fillStyle = '#5a4010';
        ctx.beginPath();
        ctx.arc(lockX + lockW / 2, lockY + Math.round(lockH * 0.48), Math.max(1, Math.round(lockW * 0.10)), 0, Math.PI * 2);
        ctx.fill();

        // Warm glow seeping from seam (suggests treasure inside)
        const glowGrad = ctx.createRadialGradient(bx + bw / 2, bodyY, 1, bx + bw / 2, bodyY, bw * 0.8);
        glowGrad.addColorStop(0, 'rgba(255,210,50,0.22)');
        glowGrad.addColorStop(1, 'rgba(255,210,50,0)');
        ctx.fillStyle = glowGrad;
        ctx.fillRect(bx - bw * 0.3, bodyY - 6, bw * 1.6, bh * 0.55);
    }

    function drawWallMiniCalendar(ctx, iL, iW, iT, flY, h, w) {
        const rp  = (t, v) => wallPt('right', t, v, iL, iW, iT, flY, h, w);
        const t1  = 0.22, t2 = 0.58, v1 = 0.09, v2 = 0.26;
        const pad = 0.025;

        // Frame shadow
        const fTL = rp(t1-pad, v1-pad), fTR = rp(t2+pad, v1-pad);
        const fBL = rp(t1-pad, v2+pad), fBR = rp(t2+pad, v2+pad);
        ctx.fillStyle = 'rgba(0,0,0,0.18)';
        quadPath(ctx, [fTL[0]+2,fTL[1]+2],[fTR[0]+2,fTR[1]+2],[fBL[0]+2,fBL[1]+2],[fBR[0]+2,fBR[1]+2]);
        ctx.fill();

        // Wooden frame
        ctx.fillStyle = '#5a3820';
        quadPath(ctx, fTL, fTR, fBL, fBR);
        ctx.fill();

        // Paper background
        const TL = rp(t1, v1), TR = rp(t2, v1);
        const BL = rp(t1, v2), BR = rp(t2, v2);
        ctx.fillStyle = '#f5f2e8';
        quadPath(ctx, TL, TR, BL, BR);
        ctx.fill();

        calendarBounds = [TL, TR, BR, BL];

        const bp = (s, t) => bilerp(TL, TR, BL, BR, s, t);

        // Red header band
        const hBL = rp(t1, v1 + 0.048), hBR = rp(t2, v1 + 0.048);
        ctx.fillStyle = '#c0392b';
        quadPath(ctx, TL, TR, hBL, hBR);
        ctx.fill();

        // Approximate frame size for font scaling
        const frameW = Math.abs(TL[0] - TR[0]);
        const frameH = Math.abs(BL[1] - TL[1]);
        const fSize  = Math.max(5, Math.round(Math.min(frameW / 9, frameH / 11)));

        // Month label in header
        const now    = new Date();
        const mLabel = now.toLocaleString('en-AU', { month: 'short' }).toUpperCase()
                     + ' ' + String(now.getFullYear()).slice(-2);
        const hCtr   = bp(0.5, 0.024);
        ctx.fillStyle = '#fff';
        ctx.textAlign = 'center';
        ctx.textBaseline = 'middle';
        ctx.font = 'bold ' + fSize + 'px sans-serif';
        ctx.fillText(mLabel, hCtr[0], hCtr[1]);

        // Day-of-week labels (Mon first)
        const DLABELS = ['M','T','W','T','F','S','S'];
        ctx.font = (fSize - 1) + 'px sans-serif';
        ctx.fillStyle = '#888';
        for (var c = 0; c < 7; c++) {
            var lp = bp((c + 0.5) / 7, 0.26);
            ctx.fillText(DLABELS[c], lp[0], lp[1]);
        }

        // Thin rule under day labels
        var rL = bp(0.02, 0.33), rR = bp(0.98, 0.33);
        ctx.strokeStyle = '#ddd9c8';
        ctx.lineWidth = 0.5;
        ctx.beginPath(); ctx.moveTo(rL[0], rL[1]); ctx.lineTo(rR[0], rR[1]); ctx.stroke();

        // Date numbers
        var year     = now.getFullYear();
        var month    = now.getMonth();
        var today    = now.getDate();
        var firstDay = (new Date(year, month, 1).getDay() + 6) % 7; // 0=Mon
        var daysInM  = new Date(year, month + 1, 0).getDate();
        var day      = 1;
        ctx.font = (fSize - 1) + 'px sans-serif';
        for (var row = 0; row < 6; row++) {
            for (c = 0; c < 7; c++) {
                if (row * 7 + c < firstDay || day > daysInM) continue;
                var s  = (c + 0.5) / 7;
                var tv = 0.38 + row * 0.104;
                var dp = bp(s, tv);
                if (day === today) {
                    ctx.fillStyle = '#c0392b';
                    ctx.beginPath();
                    ctx.arc(dp[0], dp[1], Math.max(3, fSize * 0.6), 0, Math.PI * 2);
                    ctx.fill();
                    ctx.fillStyle = '#fff';
                } else {
                    ctx.fillStyle = c >= 5 ? '#aaa' : '#333';
                }
                ctx.fillText(String(day), dp[0], dp[1]);
                day++;
            }
        }

        ctx.textAlign = 'left';
        ctx.textBaseline = 'alphabetic';
    }

    function drawWallCycleDial(ctx, iL, iW, iT, flY, h, w) {
        if (!HAS_CYCLE) { cycleDial = null; return; }
        const rp  = (t, v) => wallPt('right', t, v, iL, iW, iT, flY, h, w);
        const t1  = 0.60, t2 = 0.88, v1 = 0.09, v2 = 0.26;
        const pad = 0.025;

        // Frame shadow (circle implied)
        const TL = rp(t1, v1), TR = rp(t2, v1);
        const BL = rp(t1, v2), BR = rp(t2, v2);
        const bp = (s, t) => bilerp(TL, TR, BL, BR, s, t);

        const ctr = bp(0.5, 0.5);
        const cx  = ctr[0], cy = ctr[1];
        const rx  = Math.abs(bp(1, 0.5)[0] - bp(0, 0.5)[0]) / 2;
        const ry  = Math.abs(bp(0.5, 1)[1] - bp(0.5, 0)[1]) / 2;

        cycleDial = { cx: cx, cy: cy, rx: rx, ry: ry, quad: [TL, TR, BR, BL] };

        const OUTER = 0.92, INNER = 0.58;
        const iRatio = INNER / OUTER;

        // Frame ring shadow
        ctx.save();
        ctx.translate(cx + 2, cy + 2);
        ctx.scale(rx * OUTER, ry * OUTER);
        ctx.beginPath(); ctx.arc(0, 0, 1, 0, Math.PI * 2);
        ctx.restore();
        ctx.fillStyle = 'rgba(0,0,0,0.18)';
        ctx.fill();

        // Background disc
        ctx.save();
        ctx.translate(cx, cy);
        ctx.scale(rx * OUTER, ry * OUTER);
        ctx.beginPath(); ctx.arc(0, 0, 1, 0, Math.PI * 2);
        ctx.restore();
        ctx.fillStyle = '#ede8e0';
        ctx.fill();

        // Phase donut arcs
        var START = -Math.PI / 2;
        CYCLE_PHASES.forEach(function (p) {
            var a1 = START + (p.startDay - 1) / CYCLE_LEN * 2 * Math.PI;
            var a2 = START + p.endDay        / CYCLE_LEN * 2 * Math.PI;
            ctx.save();
            ctx.translate(cx, cy);
            ctx.scale(rx * OUTER, ry * OUTER);
            ctx.beginPath();
            ctx.arc(0, 0, 1,       a1, a2);
            ctx.arc(0, 0, iRatio,  a2, a1, true);
            ctx.closePath();
            ctx.restore();
            ctx.fillStyle = p.colour;
            ctx.fill();
        });

        // Inner cream disc
        ctx.save();
        ctx.translate(cx, cy);
        ctx.scale(rx * INNER, ry * INNER);
        ctx.beginPath(); ctx.arc(0, 0, 1, 0, Math.PI * 2);
        ctx.restore();
        ctx.fillStyle = '#f7f3ed';
        ctx.fill();

        // Outer border
        ctx.save();
        ctx.translate(cx, cy);
        ctx.scale(rx * OUTER, ry * OUTER);
        ctx.beginPath(); ctx.arc(0, 0, 1, 0, Math.PI * 2);
        ctx.restore();
        ctx.strokeStyle = 'rgba(0,0,0,0.12)';
        ctx.lineWidth = 0.5;
        ctx.stroke();

        // Hand
        var handAngle = START + (CYCLE_DAY - 0.5) / CYCLE_LEN * 2 * Math.PI;
        ctx.strokeStyle = '#2c2c2c';
        ctx.lineWidth   = Math.max(1, Math.round(Math.min(rx, ry) * 0.10));
        ctx.lineCap     = 'round';
        ctx.beginPath();
        ctx.moveTo(cx, cy);
        ctx.lineTo(cx + rx * 0.80 * Math.cos(handAngle),
                   cy + ry * 0.80 * Math.sin(handAngle));
        ctx.stroke();

        // Centre dot
        ctx.save();
        ctx.translate(cx, cy);
        ctx.scale(rx * 0.13, ry * 0.13);
        ctx.beginPath(); ctx.arc(0, 0, 1, 0, Math.PI * 2);
        ctx.restore();
        ctx.fillStyle = '#2c2c2c';
        ctx.fill();
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
        drawSecondBookSet(ctx, innerLeft, innerTop, innerWidth, innerHeight, clearance);
        drawThirdBookSet(ctx, innerLeft, innerTop, innerWidth, innerHeight, clearance);
        drawFourthBookSet(ctx, innerLeft, innerTop, innerWidth, innerHeight, clearance);
        drawFifthBookSet(ctx, innerLeft, innerTop, innerWidth, innerHeight, clearance);

        // Middle section top bay: three Top 3 challenge jars
        const midShelfH = Math.floor((innerHeight - clearance) / 7);
        const topBayTop = innerTop + clearance;
        const jarH      = Math.round(midShelfH * 0.68);
        const jarW      = Math.round(secW * 0.22);
        const jarGap    = Math.max(4, Math.round(secW * 0.05));
        const jarY      = topBayTop + midShelfH - jarH - Math.round(midShelfH * 0.08);
        const jarStartX = innerLeft + secW + Math.round((secW - jarW * 3 - jarGap * 2) / 2);
        drawTop3Jars(ctx, jarStartX, jarY, jarW, jarH, jarGap, TOP3);

        // Middle section bottom bay: toybox (unresolved) + treasure chest (resolved)
        const mbayBot   = innerTop + innerHeight;
        const mbayH     = mbayBot - (innerTop + clearance + 6 * midShelfH);
        const mbayL     = innerLeft + secW;
        const itemW     = Math.round(secW * 0.43);
        const itemH     = Math.round(mbayH * 0.72);
        const itemY     = mbayBot - itemH - Math.round(mbayH * 0.05);
        const itemGap   = Math.max(4, Math.round(secW * 0.06));
        const startX    = mbayL + Math.round((secW - itemW * 2 - itemGap) / 2);
        drawToybox(ctx, startX, itemY, itemW, itemH, OBJECTS_OUT);
        drawTreasureChest(ctx, startX + itemW + itemGap, itemY, itemW, itemH, OBJECTS_RESOLVED);

        // Desktop-only decorations: window on left wall
        if (width > 640) {
            const info = window.getMelbourneInfo ? window.getMelbourneInfo() : { isNight: false };
            drawWindow          (ctx, innerLeft, innerWidth, innerTop, floorY, height, width, info.isNight);
            drawKitchenDoor     (ctx, innerLeft, innerWidth, innerTop, floorY, height, width);
            drawNoticeBoard     (ctx, innerLeft, innerWidth, innerTop, floorY, height, width, BADGE_IDS);
            drawWallMiniCalendar(ctx, innerLeft, innerWidth, innerTop, floorY, height, width);
            drawWallCycleDial   (ctx, innerLeft, innerWidth, innerTop, floorY, height, width);
        } else {
            boardBounds = null;
            kitchenDoorBounds = null;
            calendarBounds = null;
            cycleDial      = null;
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

    // Called from app.js's heartbeat poll (every 30s) with the latest values
    // from api/heartbeat.php. Redraws only when something actually changed,
    // to avoid a full canvas repaint every 30s for no visible difference.
    window.updateStoryBadge = function (currentBook, pagesAvail) {
        if (currentBook === STORY_CURRENT_BOOK && pagesAvail === STORY_PAGES_AVAIL) return;
        STORY_CURRENT_BOOK = currentBook;
        STORY_PAGES_AVAIL  = pagesAvail;
        updateBackground();
    };

    function spawnJarPip(completedItem) {
        if (!jarBounds.length) return;
        const target  = jarBounds[Math.min(jarBounds.length - 1, 0)];
        const rect    = canvas.getBoundingClientRect();
        const tx      = rect.left + target.x + target.w / 2;
        const ty      = rect.top  + target.y + target.h / 2;
        const startX  = window.innerWidth  / 2 + (Math.random() - 0.5) * 60;
        const startY  = window.innerHeight * 0.5;

        const el = document.createElement('div');
        el.className   = 'star-pip top3-pip';
        el.textContent = '★ +' + completedItem.points;
        el.style.left  = startX + 'px';
        el.style.top   = startY + 'px';
        el.style.setProperty('--dx', (tx - startX) + 'px');
        el.style.setProperty('--dy', (ty - startY) + 'px');
        document.body.appendChild(el);
        setTimeout(() => el.parentNode && el.parentNode.removeChild(el), 900);
    }

    window.celebrateTop3 = function (completedList) {
        (completedList || []).forEach((c, i) => setTimeout(() => spawnJarPip(c), i * 250));
    };

    function inRect(cx, cy, r) {
        return r && cx >= r.x && cx <= r.x + r.w && cy >= r.y && cy <= r.y + r.h;
    }

    canvas.addEventListener('click', function(e) {
        const rect = this.getBoundingClientRect();
        const cx   = e.clientX - rect.left;
        const cy   = e.clientY - rect.top;

        if (ptInQuad(cx, cy, kitchenDoorBounds)) {
            window.location.href = 'scene_kitchen.php';
            return;
        }
        if (calendarBounds && ptInQuad(cx, cy, calendarBounds)) {
            window.location.href = 'scene2.php';
            return;
        }
        if (cycleDial && ptInQuad(cx, cy, cycleDial.quad)) {
            loadOverlay('api/settings.php?tab=wellness');
            return;
        }
        if (ptInQuad(cx, cy, boardBounds)) {
            loadOverlay('api/badges.php');
            return;
        }
        if (inRect(cx, cy, toyboxBounds) || inRect(cx, cy, chestBounds)) {
            loadOverlay('api/objects_list.php');
            return;
        }
        if (jarBounds.some(b => inRect(cx, cy, b))) {
            loadOverlay('api/top3.php');
            return;
        }
        for (const b of bookBounds) {
            if (cx >= b.x && cx <= b.x + b.w && cy >= b.y && cy <= b.y + b.h) {
                loadOverlay('api/story_books.php');
                return;
            }
        }
        for (const b of secondBookBounds) {
            if (cx >= b.x && cx <= b.x + b.w && cy >= b.y && cy <= b.y + b.h) {
                loadOverlay('api/story_books.php?family=auntie');
                return;
            }
        }
        for (const b of thirdBookBounds) {
            if (cx >= b.x && cx <= b.x + b.w && cy >= b.y && cy <= b.y + b.h) {
                loadOverlay('api/story_books.php?family=wayfarer');
                return;
            }
        }
        for (const b of fourthBookBounds) {
            if (cx >= b.x && cx <= b.x + b.w && cy >= b.y && cy <= b.y + b.h) {
                loadOverlay('api/story_books.php?family=saltroad');
                return;
            }
        }
        for (const b of fifthBookBounds) {
            if (cx >= b.x && cx <= b.x + b.w && cy >= b.y && cy <= b.y + b.h) {
                loadOverlay('api/story_books.php?family=spicebox');
                return;
            }
        }
    });

    canvas.addEventListener('mousemove', function(e) {
        const rect = this.getBoundingClientRect();
        const cx   = e.clientX - rect.left;
        const cy   = e.clientY - rect.top;
        const onBook = bookBounds.some(b => cx >= b.x && cx <= b.x + b.w && cy >= b.y && cy <= b.y + b.h)
            || secondBookBounds.some(b => cx >= b.x && cx <= b.x + b.w && cy >= b.y && cy <= b.y + b.h)
            || thirdBookBounds.some(b => cx >= b.x && cx <= b.x + b.w && cy >= b.y && cy <= b.y + b.h)
            || fourthBookBounds.some(b => cx >= b.x && cx <= b.x + b.w && cy >= b.y && cy <= b.y + b.h)
            || fifthBookBounds.some(b => cx >= b.x && cx <= b.x + b.w && cy >= b.y && cy <= b.y + b.h);
        const pointer = ptInQuad(cx, cy, kitchenDoorBounds)
            || (calendarBounds && ptInQuad(cx, cy, calendarBounds))
            || (cycleDial      && ptInQuad(cx, cy, cycleDial.quad))
            || inRect(cx, cy, toyboxBounds)
            || inRect(cx, cy, chestBounds)
            || jarBounds.some(b => inRect(cx, cy, b))
            || onBook;
        this.style.cursor = pointer ? 'pointer' : '';
    });
})();
