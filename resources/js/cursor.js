/**
 * Interactive Background Sparks & Embers Engine (Canvas 2D)
 * Built for Reyno Andrean Wijaksono Portfolio Hero Banner Background
 * Enhanced: Extra wide spark dispersion, extended travel distance, and zero intrusive cursor spotlights.
 */

(function initBackgroundSparks() {
    if (typeof window === 'undefined') return;

    let canvas = null;
    let ctx = null;
    let animFrameId = null;
    let width = 0;
    let height = 0;
    let dpr = 1;

    let sparks = [];
    let ambientParticles = [];
    const MAX_SPARKS = 350;
    const AMBIENT_COUNT = 65;

    let mouse = { x: -1000, y: -1000, active: false };
    let lastMouse = { x: -1000, y: -1000 };
    let lastSpawnTime = 0;

    const DARK_SPARK_COLORS = [
        '#34d399', // bright emerald
        '#10b981', // emerald
        '#6ee7b7', // soft mint
        '#a7f3d0', // pale mint glow
        '#2dd4bf', // vibrant teal
        '#5eead4', // luminous cyan-mint
        '#fef08a', // warm golden spark
        '#ffffff'  // white-hot core spark
    ];

    const LUX_GOLD_SPARK_COLORS = [
        '#D4AF37', // Primary Gold
        '#F1D27A', // Soft Gold
        '#FF8C42', // Orange Accent
        '#FFAE42', // Warm Amber
        '#E5C158', // Rich Gold
        '#FF9F4A', // Vibrant Orange
        '#FFF3D0', // Warm Pale Glow
        '#ffffff'  // White-hot core spark
    ];

    function getSparkColors() {
        const isDark = document.documentElement.classList.contains('dark');
        return isDark ? DARK_SPARK_COLORS : LUX_GOLD_SPARK_COLORS;
    }

    class Spark {
        constructor(x, y, vx, vy, isBurst = false) {
            this.x = x;
            this.y = y;
            this.vx = vx;
            this.vy = vy;
            const colors = getSparkColors();
            this.color = colors[Math.floor(Math.random() * colors.length)];
            // Varied sizes from tiny sharp sparks to glowing embers
            this.size = Math.random() * 2.8 + (isBurst ? 1.6 : 1.0);
            this.initialSize = this.size;
            this.alpha = 1;
            // Slower decay for much longer flight distance and wider area of effect
            this.decay = Math.random() * 0.012 + (isBurst ? 0.010 : 0.014);
            // Higher retention friction so sparks glide far across background
            this.friction = 0.965;
            this.gravity = 0.035;
            this.prevX = x;
            this.prevY = y;
        }

        update() {
            this.prevX = this.x;
            this.prevY = this.y;

            this.x += this.vx;
            this.y += this.vy;

            this.vx *= this.friction;
            this.vy = (this.vy * this.friction) + this.gravity;

            this.alpha -= this.decay;
            this.size = Math.max(0.1, this.initialSize * (this.alpha));
        }

        draw(ctx) {
            if (this.alpha <= 0) return;

            ctx.save();
            ctx.globalAlpha = Math.max(0, Math.min(1, this.alpha));
            ctx.fillStyle = this.color;
            ctx.shadowColor = this.color;
            ctx.shadowBlur = 12;

            // Draw streak trail if moving fast, else circular spark
            const speed = Math.hypot(this.x - this.prevX, this.y - this.prevY);
            if (speed > 1.2) {
                ctx.beginPath();
                ctx.strokeStyle = this.color;
                ctx.lineWidth = Math.max(0.8, this.size);
                ctx.lineCap = 'round';
                ctx.moveTo(this.prevX, this.prevY);
                ctx.lineTo(this.x, this.y);
                ctx.stroke();
            } else {
                ctx.beginPath();
                ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
                ctx.fill();
            }

            ctx.restore();
        }
    }

    class AmbientEmber {
        constructor() {
            this.reset(true);
        }

        reset(initial = false) {
            this.x = Math.random() * width;
            this.y = initial ? Math.random() * height : height + 15;
            this.vx = (Math.random() - 0.5) * 0.6;
            this.vy = -(Math.random() * 0.7 + 0.2); // float upward across canvas
            this.size = Math.random() * 2.2 + 0.8;
            this.baseAlpha = Math.random() * 0.45 + 0.15;
            this.alpha = this.baseAlpha;
            const colors = getSparkColors();
            this.color = colors[Math.floor(Math.random() * (colors.length - 1))];
            this.pulseSpeed = Math.random() * 0.03 + 0.01;
            this.pulseAngle = Math.random() * Math.PI * 2;
        }

        update() {
            this.x += this.vx;
            this.y += this.vy;

            this.pulseAngle += this.pulseSpeed;
            this.alpha = this.baseAlpha + Math.sin(this.pulseAngle) * 0.15;

            // Large interactive reaction radius (220px area)
            if (mouse.active) {
                const dx = this.x - mouse.x;
                const dy = this.y - mouse.y;
                const dist = Math.hypot(dx, dy);
                if (dist < 220 && dist > 0) {
                    const force = (220 - dist) / 220;
                    this.x += (dx / dist) * force * 2.8;
                    this.y += (dy / dist) * force * 2.8;
                    this.alpha = Math.min(0.95, this.alpha + force * 0.5);
                }
            }

            if (this.y < -20 || this.x < -20 || this.x > width + 20) {
                this.reset(false);
            }
        }

        draw(ctx) {
            if (this.alpha <= 0) return;
            ctx.save();
            ctx.globalAlpha = Math.max(0, Math.min(1, this.alpha));
            ctx.fillStyle = this.color;
            ctx.shadowColor = this.color;
            ctx.shadowBlur = 10;
            ctx.beginPath();
            ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
            ctx.fill();
            ctx.restore();
        }
    }

    function resize() {
        const heroSection = document.getElementById('home');
        if (!heroSection || !canvas) return;

        const rect = heroSection.getBoundingClientRect();
        width = rect.width;
        height = rect.height;
        dpr = window.devicePixelRatio || 1;

        canvas.width = Math.floor(width * dpr);
        canvas.height = Math.floor(height * dpr);
        canvas.style.width = `${width}px`;
        canvas.style.height = `${height}px`;

        if (ctx) {
            ctx.setTransform(1, 0, 0, 1, 0, 0);
            ctx.scale(dpr, dpr);
        }

        if (ambientParticles.length === 0) {
            for (let i = 0; i < AMBIENT_COUNT; i++) {
                ambientParticles.push(new AmbientEmber());
            }
        }
    }

    // Wide Area Spark Dispersion
    function spawnMovementSparks(x, y, deltaX, deltaY, speed) {
        // More sparks per stroke for a rich shower effect
        const count = Math.min(10, Math.max(4, Math.floor(speed * 0.22) + 2));
        
        for (let i = 0; i < count; i++) {
            if (sparks.length >= MAX_SPARKS) {
                sparks.shift();
            }

            // Scatter velocity backwards + wide radial cone (spanning 360° with directional bias)
            const baseAngle = Math.atan2(deltaY, deltaX) + Math.PI;
            const sprayAngle = baseAngle + (Math.random() - 0.5) * 2.5;
            const spraySpeed = Math.random() * (speed * 0.35 + 5.5) + 2.0;
            const vx = Math.cos(sprayAngle) * spraySpeed + (Math.random() - 0.5) * 3;
            const vy = Math.sin(sprayAngle) * spraySpeed + (Math.random() - 0.5) * 3;

            // Wide spawn distribution radius (up to 70px around cursor)
            const spawnRadius = Math.random() * 45;
            const spawnAngle = Math.random() * Math.PI * 2;
            const offsetX = Math.cos(spawnAngle) * spawnRadius;
            const offsetY = Math.sin(spawnAngle) * spawnRadius;

            sparks.push(new Spark(x + offsetX, y + offsetY, vx, vy, false));
        }
    }

    // Wide Click Burst (45+ sparks radiating widely)
    function spawnBurst(x, y, count = 48) {
        for (let i = 0; i < count; i++) {
            if (sparks.length >= MAX_SPARKS) {
                sparks.shift();
            }
            const angle = Math.random() * Math.PI * 2;
            const speed = Math.random() * 8.5 + 3.0;
            const vx = Math.cos(angle) * speed;
            const vy = Math.sin(angle) * speed;
            sparks.push(new Spark(x, y, vx, vy, true));
        }
    }

    function loop() {
        if (!ctx || !canvas) return;

        ctx.clearRect(0, 0, width, height);

        // 1. Draw ambient embers
        for (let i = 0; i < ambientParticles.length; i++) {
            ambientParticles[i].update();
            ambientParticles[i].draw(ctx);
        }

        // 2. Draw active sparks
        for (let i = sparks.length - 1; i >= 0; i--) {
            const spark = sparks[i];
            spark.update();
            if (spark.alpha <= 0) {
                sparks.splice(i, 1);
            } else {
                spark.draw(ctx);
            }
        }

        animFrameId = requestAnimationFrame(loop);
    }

    function onPointerMove(e) {
        const heroSection = document.getElementById('home');
        if (!heroSection || !canvas) return;

        const rect = heroSection.getBoundingClientRect();
        const clientX = e.clientX;
        const clientY = e.clientY;

        // Expanded active boundary: responds smoothly across entire hero section and margins
        if (clientY >= rect.top - 50 && clientY <= rect.bottom + 50 && clientX >= rect.left - 50 && clientX <= rect.right + 50) {
            const x = Math.max(0, Math.min(rect.width, clientX - rect.left));
            const y = Math.max(0, Math.min(rect.height, clientY - rect.top));

            mouse.x = x;
            mouse.y = y;
            mouse.active = true;

            if (lastMouse.x !== -1000) {
                const deltaX = x - lastMouse.x;
                const deltaY = y - lastMouse.y;
                const speed = Math.hypot(deltaX, deltaY);
                const now = performance.now();

                // Spawn widespread sparks on movement
                if (speed > 1.8 && now - lastSpawnTime > 20) {
                    lastSpawnTime = now;
                    spawnMovementSparks(x, y, deltaX, deltaY, speed);
                }
            }

            lastMouse.x = x;
            lastMouse.y = y;
        } else {
            mouse.active = false;
            lastMouse.x = -1000;
            lastMouse.y = -1000;
        }
    }

    function onPointerLeave() {
        mouse.active = false;
        lastMouse.x = -1000;
        lastMouse.y = -1000;
    }

    function onHeroClick(e) {
        const heroSection = document.getElementById('home');
        if (!heroSection) return;

        const rect = heroSection.getBoundingClientRect();
        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;

        if (x >= 0 && x <= rect.width && y >= 0 && y <= rect.height) {
            spawnBurst(x, y, 48);
        }
    }

    function init() {
        canvas = document.getElementById('hero-sparks-canvas');
        if (!canvas) return;

        ctx = canvas.getContext('2d');
        if (!ctx) return;

        resize();

        window.removeEventListener('resize', resize);
        window.addEventListener('resize', resize, { passive: true });

        window.removeEventListener('mousemove', onPointerMove);
        window.addEventListener('mousemove', onPointerMove, { passive: true });

        window.removeEventListener('mouseleave', onPointerLeave);
        window.addEventListener('mouseleave', onPointerLeave);

        const heroSection = document.getElementById('home');
        if (heroSection) {
            heroSection.removeEventListener('click', onHeroClick);
            heroSection.addEventListener('click', onHeroClick);
        }

        if (animFrameId) {
            cancelAnimationFrame(animFrameId);
        }
        animFrameId = requestAnimationFrame(loop);
    }

    function destroy() {
        if (animFrameId) {
            cancelAnimationFrame(animFrameId);
            animFrameId = null;
        }
        window.removeEventListener('resize', resize);
        window.removeEventListener('mousemove', onPointerMove);
        window.removeEventListener('mouseleave', onPointerLeave);
        sparks = [];
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }

    document.addEventListener('turbo:load', init);
    document.addEventListener('turbo:before-cache', destroy);
})();
