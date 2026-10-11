/**
 * Interactive Background Sparks & Embers Engine (Canvas 2D)
 * Built for Reyno Andrean Wijaksono Portfolio Hero Banner Background
 * Refined: Ultra-smooth, silky stardust trail with tight clustering (tidak berpencar)
 * and elegant, organic fading physics.
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
    const MAX_SPARKS = 220;
    const AMBIENT_COUNT = 45;

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
        '#FF9F4A', // Soft Orange
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
            
            // Refined, delicate size for stardust look
            this.size = Math.random() * 1.6 + (isBurst ? 1.4 : 0.9);
            this.initialSize = this.size;
            this.life = 1.0;
            
            // Smooth, gradual decay for fluid dissipation
            this.decay = Math.random() * 0.016 + (isBurst ? 0.022 : 0.018);
            
            // Smooth damping: slows down gently without flying far
            this.friction = isBurst ? 0.91 : 0.94;
            // Slight natural upward drift / buoyancy
            this.buoyancy = 0.018;
        }

        update() {
            this.x += this.vx;
            this.y += this.vy;

            this.vx *= this.friction;
            this.vy = (this.vy * this.friction) - this.buoyancy;

            this.life -= this.decay;
        }

        draw(ctx) {
            if (this.life <= 0) return;

            ctx.save();
            // Smooth quadratic fade curve for ultra-soft disappearance
            const opacity = Math.sin(this.life * Math.PI * 0.5);
            ctx.globalAlpha = Math.max(0, Math.min(1, opacity));
            ctx.fillStyle = this.color;
            ctx.shadowColor = this.color;
            ctx.shadowBlur = 8;

            const currentSize = Math.max(0.2, this.initialSize * opacity);
            ctx.beginPath();
            ctx.arc(this.x, this.y, currentSize, 0, Math.PI * 2);
            ctx.fill();

            ctx.restore();
        }
    }

    class AmbientEmber {
        constructor() {
            this.reset(true);
        }

        reset(initial = false) {
            this.x = Math.random() * width;
            this.y = initial ? Math.random() * height : height + 10;
            this.vx = (Math.random() - 0.5) * 0.35;
            this.vy = -(Math.random() * 0.45 + 0.15); // gentle upward float
            this.size = Math.random() * 1.6 + 0.6;
            this.baseAlpha = Math.random() * 0.35 + 0.12;
            this.alpha = this.baseAlpha;
            const colors = getSparkColors();
            this.color = colors[Math.floor(Math.random() * (colors.length - 1))];
            this.pulseSpeed = Math.random() * 0.02 + 0.008;
            this.pulseAngle = Math.random() * Math.PI * 2;
        }

        update() {
            this.x += this.vx;
            this.y += this.vy;

            this.pulseAngle += this.pulseSpeed;
            this.alpha = this.baseAlpha + Math.sin(this.pulseAngle) * 0.12;

            // Gentle, smooth reaction when cursor is near
            if (mouse.active) {
                const dx = this.x - mouse.x;
                const dy = this.y - mouse.y;
                const dist = Math.hypot(dx, dy);
                if (dist < 110 && dist > 0) {
                    const force = (110 - dist) / 110;
                    this.x += (dx / dist) * force * 1.2;
                    this.y += (dy / dist) * force * 1.2;
                    this.alpha = Math.min(0.8, this.alpha + force * 0.3);
                }
            }

            if (this.y < -15 || this.x < -15 || this.x > width + 15) {
                this.reset(false);
            }
        }

        draw(ctx) {
            if (this.alpha <= 0) return;
            ctx.save();
            ctx.globalAlpha = Math.max(0, Math.min(1, this.alpha));
            ctx.fillStyle = this.color;
            ctx.shadowColor = this.color;
            ctx.shadowBlur = 6;
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

    // Smooth, tightly clustered stardust trail (tidak berpencar)
    function spawnMovementSparks(x, y, deltaX, deltaY, speed) {
        const dist = Math.hypot(deltaX, deltaY);
        // Interpolate points along the movement path to prevent gaps during fast cursor sweeps
        const steps = Math.min(5, Math.max(1, Math.floor(dist / 9)));
        
        for (let s = 0; s <= steps; s++) {
            const t = s / steps;
            const interX = lastMouse.x + deltaX * t;
            const interY = lastMouse.y + deltaY * t;

            // Tightly bound around cursor path (max 2.5 - 4.5px offset, no wide scattering)
            const spreadRadius = Math.random() * 3.5;
            const spreadAngle = Math.random() * Math.PI * 2;
            const spawnX = interX + Math.cos(spreadAngle) * spreadRadius;
            const spawnY = interY + Math.sin(spreadAngle) * spreadRadius;

            // Gentle backward flowing motion that softly follows cursor trail
            const vx = (-deltaX * 0.05) + (Math.random() - 0.5) * 0.4;
            const vy = (-deltaY * 0.05) + (Math.random() - 0.5) * 0.4 - 0.1;

            if (sparks.length >= MAX_SPARKS) {
                sparks.shift();
            }
            sparks.push(new Spark(spawnX, spawnY, vx, vy, false));
        }
    }

    // Elegant, compact click shimmer burst (gentle halo, not scattering widely)
    function spawnBurst(x, y, count = 22) {
        for (let i = 0; i < count; i++) {
            if (sparks.length >= MAX_SPARKS) {
                sparks.shift();
            }
            const angle = Math.random() * Math.PI * 2;
            // Compact speed: 1.2 to 2.8px, stops gently and fades in place
            const speed = Math.random() * 1.8 + 1.2;
            const vx = Math.cos(angle) * speed;
            const vy = Math.sin(angle) * speed;
            sparks.push(new Spark(x, y, vx, vy, true));
        }
    }

    function loop() {
        if (!ctx || !canvas) return;

        ctx.clearRect(0, 0, width, height);

        // 1. Draw ambient floating embers
        for (let i = 0; i < ambientParticles.length; i++) {
            ambientParticles[i].update();
            ambientParticles[i].draw(ctx);
        }

        // 2. Draw smooth active sparks
        for (let i = sparks.length - 1; i >= 0; i--) {
            const spark = sparks[i];
            spark.update();
            if (spark.life <= 0) {
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

        if (clientY >= rect.top && clientY <= rect.bottom && clientX >= rect.left && clientX <= rect.right) {
            const x = clientX - rect.left;
            const y = clientY - rect.top;

            mouse.x = x;
            mouse.y = y;
            mouse.active = true;

            if (lastMouse.x !== -1000) {
                const deltaX = x - lastMouse.x;
                const deltaY = y - lastMouse.y;
                const speed = Math.hypot(deltaX, deltaY);
                const now = performance.now();

                // Smoothly spawn stardust trail when moving
                if (speed > 1.2 && now - lastSpawnTime > 16) {
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
            spawnBurst(x, y, 22);
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
