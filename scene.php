<canvas id="sceneCanvas"></canvas>

<script>
    function updateBackground() {
        const canvas = document.getElementById('sceneCanvas');
        const ctx = canvas.getContext('2d');

        const width = window.innerWidth;
        const height = window.innerHeight;

        // Resize canvas to full screen
        canvas.width = width;
        canvas.height = height;

        // === Main Rectangle Calculations ===
        const innerWidth = Math.floor(width * 0.66);
        const innerHeight = Math.floor(height * 0.66);

        const innerLeft = Math.floor((width / 2) - (innerWidth / 2));
        const innerTop = Math.floor((height / 2) - (innerHeight / 2));

        // === Drawing Everything ===
        ctx.clearRect(0, 0, width, height); // Clear canvas before drawing

        // Set styles
        ctx.strokeStyle = '#5D4037'; // Dark wood-brown color
        ctx.lineWidth = 2;

        // === Back Wall (10% clearance) ===
        const clearance = Math.floor(innerHeight * 0.1);
        ctx.fillStyle = '#e5d0b3'; // Light beige for wall background
        ctx.fillRect(innerLeft, innerTop, innerWidth, clearance);

        // === Draw the Main Rectangle (Bookshelf) ===
        ctx.fillStyle = '#8B5A2B'; // Wood texture
        ctx.fillRect(innerLeft, innerTop + clearance, innerWidth, innerHeight - clearance);
        ctx.strokeRect(innerLeft, innerTop + clearance, innerWidth, innerHeight - clearance);

        // === Draw Vertical Support Lines (Bookshelf) ===
        const sectionWidth = Math.floor(innerWidth / 3);

        // First vertical line
        ctx.beginPath();
        ctx.moveTo(innerLeft + sectionWidth, innerTop + clearance);
        ctx.lineTo(innerLeft + sectionWidth, innerTop + innerHeight);
        ctx.stroke();

        // Second vertical line
        ctx.beginPath();
        ctx.moveTo(innerLeft + sectionWidth * 2, innerTop + clearance);
        ctx.lineTo(innerLeft + sectionWidth * 2, innerTop + innerHeight);
        ctx.stroke();

        // === Draw Horizontal Shelves ===
        // Shelves configuration (8, 6, 7)
        const shelvesConfig = [8, 6, 7];
        shelvesConfig.forEach((numShelves, index) => {
            const startX = innerLeft + sectionWidth * index;
            const shelfHeight = Math.floor((innerHeight - clearance) / (numShelves + 1)); // +1 to give spacing
            for (let i = 1; i <= numShelves; i++) {
                ctx.beginPath();
                ctx.moveTo(startX, innerTop + clearance + i * shelfHeight);
                ctx.lineTo(startX + sectionWidth, innerTop + clearance + i * shelfHeight);
                ctx.stroke();
            }
        });

        // === Draw Corner Lines for Depth ===
        ctx.strokeStyle = '#8B4513';
        ctx.lineWidth = 1.5;

        // Top Left → Inner Top Left (including clearance)
        ctx.beginPath();
        ctx.moveTo(0, 0);
        ctx.lineTo(innerLeft, innerTop);
        ctx.stroke();

        // Top Right → Inner Top Right (including clearance)
        ctx.beginPath();
        ctx.moveTo(width, 0);
        ctx.lineTo(innerLeft + innerWidth, innerTop);
        ctx.stroke();

        // Bottom Left → Inner Bottom Left
        ctx.beginPath();
        ctx.moveTo(0, height);
        ctx.lineTo(innerLeft, innerTop + innerHeight);
        ctx.stroke();

        // Bottom Right → Inner Bottom Right
        ctx.beginPath();
        ctx.moveTo(width, height);
        ctx.lineTo(innerLeft + innerWidth, innerTop + innerHeight);
        ctx.stroke();

        // === Load and Draw the Avatar ===
        const avatar = new Image();
        avatar.src = 'avatars/baanabus_standing.png';
        avatar.onload = function() {
            const scaleFactor = 0.25; // Scales it down to 15%
            const avatarWidth = avatar.width * scaleFactor;
            const avatarHeight = avatar.height * scaleFactor;

            // Positioning: 1/3 of the screen width, and slightly lower than before
            const avatarX = Math.floor(width / 4 - avatarWidth / 3);
            const avatarY = Math.floor(0.95 * height) - avatarHeight;

            ctx.drawImage(avatar, avatarX, avatarY, avatarWidth, avatarHeight);
        };
    }

    window.addEventListener('resize', updateBackground);
    window.addEventListener('load', updateBackground);
</script>

