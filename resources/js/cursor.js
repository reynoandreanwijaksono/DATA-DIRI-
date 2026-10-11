/**
 * Interactive Liquid Water Ripples & Droplets Engine (Canvas 2D)
 * Built for Reyno Andrean Wijaksono Portfolio Hero Banner Background
 * Theme-aware:
 *   - Light Mode: Molten Gold & Warm Amber Liquid Water Ripples and 3D Translucent Droplets
 *   - Dark Mode: Aquamarine & Mint-Emerald Dewdrop Ripples and Luminous Liquid Beads
 */

(function initWaterCanvas() {
    if (typeof window === 'undefined') return;

    let canvas = null;
    let ctx = null;
    let animFrameId = null;
    let width = 0;
    let height = 0;
    let dpr = 1;

    let ripples = [];
    let droplets = [];
    let ambientDroplets = [];

    const MAX_RIPPLES = 85;
    const MAX_DROPLETS = 120;
    const AMBIENT_COUNT = 38;

    let mouse = { x: -1000, y: -1000, active: false };
    let lastMouse = { x: -1000, y: -1000 };
    let lastRippleTime = 0;
    let lastDropletTime = 0;

    function getThemeColors() {
        const isDark = document.documentElement.classList.contains('dark');
        if (isDark) {
            return {
                isDark: true,
                primaryRgb: '52, 211, 153',   // bright emerald
                secondaryRgb: '45, 212, 191', // vibrant teal
                accentRgb: '167, 243, 208',   // soft pale mint
                deepRgb: '16, 185, 129',      // rich emerald
                glow: '#10b981',
                specular: 'rgba(255, 255, 255, 0.95)'
            };
        } else {
            return {
                isDark: false,
                primaryRgb: '212, 175, 55',   // primary gold
                secondaryRgb: '255, 140, 66',  // orange/amber accent
                accentRgb: '241, 210, 122',   // soft gold
                deepRgb: '185, 130, 20',      // rich deep amber
                glow: '#D4AF37',
                specular: 'rgba(255, 255, 255, 0.95)'
            };
        }
    }

    /**
     * Circular Water Ripple Wave (Riak Gelombang Air)
     */
    class WaterRipple {
        constructor(x, y, maxRadius = 48, speed = 1.4, maxAlpha = 0.55, isImpact = false) {
            this.x = x;
            this.y = y;
            this.radius = isImpact ? 4 : 2;
            this.maxRadius = maxRadius;
            this.speed = speed;
            this.currentSpeed = speed;
            this.maxAlpha = maxAlpha;
            this.life = 1.0;
            // Slower decay for fluid wave expansion
            this.decay = isImpact ? 0.012 : 0.016;
            this.isImpact = isImpact;
            this.waveWidth = isImpact ? 2.6 : 1.8;
        }

        update() {
            this.radius += this.currentSpeed;
            // Fluid deceleration as ripple ring expands
            this.currentSpeed = Math.max(0.4, this.currentSpeed * 0.985);
            this.life -= this.decay;
        }

        draw(ctx, colors) {
            if (this.life <= 0) return;

            // Smooth sinusoidal opacity curve (fades in, peaks, fades away seamlessly)
            const progress = 1 - this.life;
            const alpha = Math.sin(this.life * Math.PI) * this.maxAlpha;
            if (alpha <= 0.005) return;

            ctx.save();

            // 1. Primary Outer Crest Wave Ring
            ctx.beginPath();
            ctx.arc(this.x, this.y, Math.max(0.1, this.radius), 0, Math.PI * 2);
            ctx.strokeStyle = `rgba(${colors.primaryRgb}, ${alpha.toFixed(3)})`;
            ctx.lineWidth = Math.max(0.6, this.waveWidth * (1 - progress * 0.65));
            ctx.shadowColor = colors.glow;
            ctx.shadowBlur = this.isImpact ? 14 : 7;
            ctx.stroke();

            // 2. Secondary Inner Refraction Trough (creates 3D water surface distortion)
            if (this.radius > 5) {
                const innerRadius = this.radius - (this.isImpact ? 4.5 : 3.0);
                if (innerRadius > 0.5) {
                    ctx.beginPath();
                    ctx.arc(this.x, this.y, innerRadius, 0, Math.PI * 2);
                    ctx.strokeStyle = `rgba(${colors.secondaryRgb}, ${(alpha * 0.45).toFixed(3)})`;
                    ctx.lineWidth = Math.max(0.4, (this.waveWidth * 0.6) * (1 - progress * 0.5));
                    ctx.shadowBlur = 3;
                    ctx.stroke();
                }
            }

            // 3. Central liquid shimmer on impact
            if (this.isImpact && progress < 0.35) {
                const coreAlpha = (1 - progress / 0.35) * 0.25;
                ctx.beginPath();
                ctx.arc(this.x, this.y, Math.max(0.1, this.radius * 0.4), 0, Math.PI * 2);
                ctx.fillStyle = `rgba(${colors.accentRgb}, ${coreAlpha.toFixed(3)})`;
                ctx.fill();
            }

            ctx.restore();
        }
    }

    /**
     * 3D Water Droplet Bead (Tetesan Embun Cair dengan Pantulan Cahaya)
     */
    class WaterDroplet {
        constructor(x, y, vx, vy, isSplash = false) {
            this.x = x;
            this.y = y;
            this.vx = vx;
            this.vy = vy;
            // Realistic fluid droplet sizes
            this.radius = isSplash ? (Math.random() * 2.2 + 1.2) : (Math.random() * 2.8 + 1.4);
            this.initialRadius = this.radius;
            this.life = 1.0;
            this.decay = isSplash ? (Math.random() * 0.018 + 0.016) : (Math.random() * 0.014 + 0.012);
            // High fluid retention friction
            this.friction = isSplash ? 0.92 : 0.95;
            this.isSplash = isSplash;
        }

        update() {
            this.x += this.vx;
            this.y += this.vy;

            this.vx *= this.friction;
            this.vy *= this.friction;

            // Slight surface tension pull
            this.life -= this.decay;
        }

        draw(ctx, colors) {
            if (this.life <= 0) return;

            const progress = 1 - this.life;
            const alpha = Math.sin(this.life * Math.PI * 0.5);
            const currentR = Math.max(0.3, this.radius * (1 - progress * 0.4));

            ctx.save();

            // 1. 3D Radial liquid gradient body
            const grad = ctx.createRadialGradient(
                this.x - currentR * 0.35, this.y - currentR * 0.35, currentR * 0.08,
                this.x, this.y, currentR
            );
            grad.addColorStop(0, `rgba(${colors.accentRgb}, ${(alpha * 0.9).toFixed(3)})`);
            grad.addColorStop(0.55, `rgba(${colors.primaryRgb}, ${(alpha * 0.65).toFixed(3)})`);
            grad.addColorStop(1, `rgba(${colors.deepRgb}, ${(alpha * 0.25).toFixed(3)})`);

            ctx.beginPath();
            ctx.arc(this.x, this.y, currentR, 0, Math.PI * 2);
            ctx.fillStyle = grad;
            ctx.shadowColor = colors.glow;
            ctx.shadowBlur = 6;
            ctx.fill();

            // 2. Liquid Surface Specular Highlight Glint (Glossy Water Shine)
            const specR = Math.max(0.4, currentR * 0.32);
            ctx.beginPath();
            ctx.arc(this.x - currentR * 0.35, this.y - currentR * 0.35, specR, 0, Math.PI * 2);
            ctx.fillStyle = colors.specular;
            ctx.shadowBlur = 2;
            ctx.fill();

            ctx.restore();
        }
    }

    /**
     * Ambient Floating Liquid Dewdrop (Tetesan Embun Melayang Halus di Background)
     */
    class AmbientDewdrop {
        constructor() {
            this.reset(true);
        }

        reset(initial = false) {
            this.x = Math.random() * width;
            this.y = initial ? Math.random() * height : height + 15;
            this.vx = (Math.random() - 0.5) * 0.3;
            this.vy = -(Math.random() * 0.4 + 0.15); // gentle upward fluid drift
            this.radius = Math.random() * 2.2 + 0.9;
            this.baseAlpha = Math.random() * 0.35 + 0.12;
            this.alpha = this.baseAlpha;
            this.pulseSpeed = Math.random() * 0.025 + 0.01;
            this.pulseAngle = Math.random() * Math.PI * 2;
            this.wobbleAngle = Math.random() * Math.PI * 2;
            this.wobbleSpeed = Math.random() * 0.03 + 0.015;
        }

        update() {
            this.x += this.vx;
            this.y += this.vy;

            this.pulseAngle += this.pulseSpeed;
            this.wobbleAngle += this.wobbleSpeed;
            this.alpha = this.baseAlpha + Math.sin(this.pulseAngle) * 0.1;

            // Elastic fluid reaction when mouse passes by (water surface tension ripple)
            if (mouse.active) {
                const dx = this.x - mouse.x;
                const dy = this.y - mouse.y;
                const dist = Math.hypot(dx, dy);
                if (dist < 130 && dist > 0) {
                    const force = (130 - dist) / 130;
                    this.x += (dx / dist) * force * 1.5;
                    this.y += (dy / dist) * force * 1.5;
                    this.alpha = Math.min(0.85, this.alpha + force * 0.35);
                }
            }

            if (this.y < -20 || this.x < -20 || this.x > width + 20) {
                this.reset(false);
            }
        }

        draw(ctx, colors) {
            if (this.alpha <= 0) return;

            ctx.save();
            ctx.globalAlpha = Math.max(0, Math.min(1, this.alpha));

            // Slight organic fluid shape wobble
            const wobbleX = 1 + Math.sin(this.wobbleAngle) * 0.1;
            const wobbleY = 1 + Math.cos(this.wobbleAngle) * 0.1;

            const grad = ctx.createRadialGradient(
                this.x - this.radius * 0.3, this.y - this.radius * 0.3, this.radius * 0.1,
                this.x, this.y, this.radius
            );
            grad.addColorStop(0, `rgba(${colors.accentRgb}, 0.85)`);
            grad.addColorStop(0.6, `rgba(${colors.primaryRgb}, 0.5)`);
            grad.addColorStop(1, `rgba(${colors.secondaryRgb}, 0.15)`);

            ctx.save();
            ctx.translate(this.x, this.y);
            ctx.scale(wobbleX, wobbleY);
            ctx.beginPath();
            ctx.arc(0, 0, this.radius, 0, Math.PI * 2);
            ctx.fillStyle = grad;
            ctx.shadowColor = colors.glow;
            ctx.shadowBlur = 6;
            ctx.fill();

            // Specular glint
            ctx.beginPath();
            ctx.arc(-this.radius * 0.32, -this.radius * 0.32, Math.max(0.4, this.radius * 0.3), 0, Math.PI * 2);
            ctx.fillStyle = colors.specular;
            ctx.shadowBlur = 2;
            ctx.fill();
            ctx.restore();

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

        if (ambientDroplets.length === 0) {
            for (let i = 0; i < AMBIENT_COUNT; i++) {
                ambientDroplets.push(new AmbientDewdrop());
            }
        }
    }

    /**
     * Spawn smooth flowing water ripples along the movement path
     */
    function spawnMovementRipples(x, y, deltaX, deltaY, speed) {
        const dist = Math.hypot(deltaX, deltaY);
        const now = performance.now();

        // 1. Smooth expanding water ripples (every 14-20px along path)
        if (now - lastRippleTime > 38 && dist > 3.0) {
            lastRippleTime = now;
            if (ripples.length >= MAX_RIPPLES) ripples.shift();

            // Fluid ripple size scales slightly with movement speed
            const maxRadius = Math.min(55, Math.max(26, speed * 1.5 + 24));
            const waveSpeed = Math.min(1.8, Math.max(0.9, speed * 0.06 + 0.95));
            const alpha = Math.min(0.55, Math.max(0.25, speed * 0.03 + 0.3));

            ripples.push(new WaterRipple(x, y, maxRadius, waveSpeed, alpha, false));
        }

        // 2. Micro liquid droplets bead along the cursor wake (tidak berpencar, menempel rapat)
        if (now - lastDropletTime > 24) {
            lastDropletTime = now;
            const steps = Math.min(3, Math.max(1, Math.floor(dist / 14)));

            for (let s = 0; s < steps; s++) {
                if (droplets.length >= MAX_DROPLETS) droplets.shift();

                const t = s / steps;
                const interX = lastMouse.x + deltaX * t;
                const interY = lastMouse.y + deltaY * t;

                // Tightly clustered offset (max 2 - 3.5px from line)
                const offsetDist = Math.random() * 3.0;
                const offsetAngle = Math.random() * Math.PI * 2;
                const spawnX = interX + Math.cos(offsetAngle) * offsetDist;
                const spawnY = interY + Math.sin(offsetAngle) * offsetDist;

                // Subtle fluid trailing motion
                const vx = (-deltaX * 0.04) + (Math.random() - 0.5) * 0.3;
                const vy = (-deltaY * 0.04) + (Math.random() - 0.5) * 0.3;

                droplets.push(new WaterDroplet(spawnX, spawnY, vx, vy, false));
            }
        }
    }

    /**
     * Water Drop Splash Impact on Click (Tetes Air Jatuh & Riak Konsentris)
     */
    function spawnWaterDropImpact(x, y) {
        // Multi-harmonic concentric water ripple rings
        const harmonicDelays = [0, 90, 180];
        harmonicDelays.forEach((delay, idx) => {
            setTimeout(() => {
                if (ripples.length >= MAX_RIPPLES) ripples.shift();
                const maxRadius = 90 + idx * 28;
                const speed = 2.0 - idx * 0.3;
                const alpha = 0.65 - idx * 0.12;
                ripples.push(new WaterRipple(x, y, maxRadius, speed, alpha, true));
            }, delay);
        });

        // 12-16 soft liquid splash droplets that bounce outward and settle
        const splashCount = 14;
        for (let i = 0; i < splashCount; i++) {
            if (droplets.length >= MAX_DROPLETS) droplets.shift();
            const angle = Math.random() * Math.PI * 2;
            const speed = Math.random() * 2.2 + 0.8;
            const vx = Math.cos(angle) * speed;
            const vy = Math.sin(angle) * speed;
            droplets.push(new WaterDroplet(x, y, vx, vy, true));
        }
    }

    function loop() {
        if (!ctx || !canvas) return;

        ctx.clearRect(0, 0, width, height);

        const colors = getThemeColors();

        // 1. Draw Ambient Dewdrops in background
        for (let i = 0; i < ambientDroplets.length; i++) {
            ambientDroplets[i].update();
            ambientDroplets[i].draw(ctx, colors);
        }

        // 2. Draw Concentric Water Waves & Ripples
        for (let i = ripples.length - 1; i >= 0; i--) {
            const ripple = ripples[i];
            ripple.update();
            if (ripple.life <= 0) {
                ripples.splice(i, 1);
            } else {
                ripple.draw(ctx, colors);
            }
        }

        // 3. Draw Water Droplets / Beads along cursor wake
        for (let i = droplets.length - 1; i >= 0; i--) {
            const droplet = droplets[i];
            droplet.update();
            if (droplet.life <= 0) {
                droplets.splice(i, 1);
            } else {
                droplet.draw(ctx, colors);
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

                if (speed > 1.0) {
                    spawnMovementRipples(x, y, deltaX, deltaY, speed);
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
            spawnWaterDropImpact(x, y);
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
        ripples = [];
        droplets = [];
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }

    document.addEventListener('turbo:load', init);
    document.addEventListener('turbo:before-cache', destroy);
})();
