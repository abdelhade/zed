import './bootstrap';

document.addEventListener('DOMContentLoaded', () => {
    initNav();
    initZigZagScroll();
    initReveal();
    initCounters();
    initParallax();
    initSmoothAnchors();
    initMagneticButtons();
    initTiltCards();
    initDeerCursor();
});

function initNav() {
    const nav = document.getElementById('site-nav');
    const toggle = document.getElementById('nav-toggle');
    const drawer = document.getElementById('nav-drawer');

    if (!nav) return;

    const onScroll = () => {
        nav.classList.toggle('is-scrolled', window.scrollY > 24);
    };

    onScroll();
    window.addEventListener('scroll', onScroll, { passive: true });

    if (toggle && drawer) {
        toggle.addEventListener('click', () => {
            const open = toggle.getAttribute('aria-expanded') === 'true';
            toggle.setAttribute('aria-expanded', String(!open));
            drawer.hidden = open;
        });

        drawer.querySelectorAll('a').forEach((link) => {
            link.addEventListener('click', () => {
                toggle.setAttribute('aria-expanded', 'false');
                drawer.hidden = true;
            });
        });
    }
}

/**
 * Zig-zag SNAP on all screen sizes:
 * One wheel / swipe / next-button = full next panel.
 * LTR: RIGHT → DOWN → RIGHT → DOWN
 * RTL: LEFT  → DOWN → LEFT  → DOWN
 */
function initZigZagScroll() {
    const root = document.querySelector('[data-zz]');
    const world = document.querySelector('[data-zz-world]');
    const panels = [...document.querySelectorAll('[data-zz-panel]')];
    const hudDir = document.querySelector('[data-zz-hud-dir]');
    const hudFill = document.querySelector('[data-zz-hud-fill]');
    const hudStep = document.querySelector('[data-zz-hud-step]');
    const isRtl = document.documentElement.dir === 'rtl';
    const isAr = document.documentElement.lang === 'ar';

    if (!root || !world || !panels.length) return;

    let path = [];
    let current = 0;
    let locked = false;
    let touchX = 0;
    let touchY = 0;

    const buildPath = () => {
        let col = 0;
        let row = 0;
        path = [{ col, row, id: panels[0].id }];

        for (let i = 1; i < panels.length; i += 1) {
            if (i % 2 === 1) {
                col += isRtl ? -1 : 1;
            } else {
                row += 1;
            }
            path.push({ col, row, id: panels[i].id });
        }

        panels.forEach((panel, i) => {
            const { col: c, row: r } = path[i];
            panel.style.left = `${c * 100}vw`;
            panel.style.top = `${r * 100}vh`;
        });
    };

    const nextDirectionLabel = () => {
        if (current >= path.length - 1) return isAr ? '■ النهاية' : '■ END';
        if ((current + 1) % 2 === 1) {
            return isAr || isRtl ? '← يسار' : '→ RIGHT';
        }
        return isAr ? '↓ تحت' : '↓ DOWN';
    };

    const activatePanel = (index) => {
        panels.forEach((panel, i) => {
            panel.classList.toggle('is-active', i === index);
            panel.classList.remove('is-leaving');
        });

        document.querySelectorAll('.section-rail__btn').forEach((btn) => {
            const id = btn.getAttribute('data-section');
            btn.classList.toggle('is-active', id === panels[index]?.id);
        });

        panels[index].querySelectorAll('.reveal:not(.is-visible)').forEach((el) => {
            el.classList.add('is-visible');
        });

        if (panels[index].id === 'services') {
            panels[index].querySelectorAll('[data-count]:not([data-counted])').forEach((el) => {
                el.setAttribute('data-counted', '1');
                animateCounter(el);
            });
        }
    };

    const updateHud = () => {
        if (hudDir) hudDir.textContent = nextDirectionLabel();
        if (hudFill) hudFill.style.width = `${(current / Math.max(panels.length - 1, 1)) * 100}%`;
        if (hudStep) {
            hudStep.textContent = `${String(current + 1).padStart(2, '0')} / ${String(panels.length).padStart(2, '0')}`;
        }
    };

    const goTo = (index, { instant = false } = {}) => {
        if (index < 0 || index >= panels.length) return;
        if (index === current && !instant) return;
        if (locked && !instant) return;

        const prev = current;
        current = index;

        if (!instant && prev !== current) {
            locked = true;
            root.classList.add('is-animating');
            panels[prev]?.classList.add('is-leaving');
            panels[prev]?.classList.remove('is-active');
            panels[current]?.classList.add('is-active');
        } else {
            activatePanel(current);
        }

        const point = path[current];
        const x = point.col * window.innerWidth;
        const y = point.row * window.innerHeight;

        if (instant) {
            world.style.transition = 'none';
            world.style.transform = `translate3d(${-x}px, ${-y}px, 0)`;
            void world.offsetHeight;
            world.style.transition = '';
            locked = false;
            root.classList.remove('is-animating');
            activatePanel(current);
        } else {
            world.style.transform = `translate3d(${-x}px, ${-y}px, 0)`;
        }

        updateHud();
    };

    const step = (delta) => {
        if (locked) return;
        goTo(current + delta);
    };

    const onWheel = (event) => {
        event.preventDefault();
        if (locked) return;
        if (Math.abs(event.deltaY) < 10 && Math.abs(event.deltaX) < 10) return;

        const dominant =
            Math.abs(event.deltaY) >= Math.abs(event.deltaX) ? event.deltaY : event.deltaX;
        step(dominant > 0 ? 1 : -1);
    };

    const onKey = (event) => {
        const nextKeys = isRtl
            ? ['ArrowDown', 'ArrowLeft', 'PageDown', ' ']
            : ['ArrowDown', 'ArrowRight', 'PageDown', ' '];
        const prevKeys = isRtl
            ? ['ArrowUp', 'ArrowRight', 'PageUp']
            : ['ArrowUp', 'ArrowLeft', 'PageUp'];

        if (nextKeys.includes(event.key)) {
            event.preventDefault();
            step(1);
        }
        if (prevKeys.includes(event.key)) {
            event.preventDefault();
            step(-1);
        }
    };

    const onTouchStart = (event) => {
        touchX = event.changedTouches[0].clientX;
        touchY = event.changedTouches[0].clientY;
    };

    const onTouchEnd = (event) => {
        if (locked) return;
        const dx = touchX - event.changedTouches[0].clientX;
        const dy = touchY - event.changedTouches[0].clientY;
        if (Math.abs(dx) < 36 && Math.abs(dy) < 36) return;

        if (Math.abs(dy) >= Math.abs(dx)) {
            step(dy > 0 ? 1 : -1);
        } else {
            // LTR: swipe left = next | RTL: swipe right = next
            step(isRtl ? (dx < 0 ? 1 : -1) : dx > 0 ? 1 : -1);
        }
    };

    const onTransitionEnd = (event) => {
        if (event.target !== world || event.propertyName !== 'transform') return;
        locked = false;
        root.classList.remove('is-animating');
        panels.forEach((panel) => panel.classList.remove('is-leaving'));
        activatePanel(current);
    };

    const setup = () => {
        document.body.classList.add('zz-locked');
        document.body.style.overflow = 'hidden';
        buildPath();
        root.style.height = '100vh';
        world.style.transition = '';
        goTo(current, { instant: true });
    };

    window.zzJumpTo = (id) => {
        const index = panels.findIndex((panel) => panel.id === id);
        if (index < 0) return;
        goTo(index);
    };

    window.zzNext = () => step(1);

    document.querySelectorAll('[data-zz-next]').forEach((btn) => {
        btn.addEventListener('click', (event) => {
            event.preventDefault();
            window.zzNext();
        });
    });

    setup();
    world.addEventListener('transitionend', onTransitionEnd);
    window.addEventListener('wheel', onWheel, { passive: false });
    window.addEventListener('keydown', onKey);
    window.addEventListener('touchstart', onTouchStart, { passive: true });
    window.addEventListener('touchend', onTouchEnd, { passive: true });
    window.addEventListener('resize', setup);
}

function animateCounter(el) {
    const target = Number(el.getAttribute('data-count') || 0);
    const duration = 1400;
    const start = performance.now();

    const tick = (now) => {
        const progress = Math.min((now - start) / duration, 1);
        const eased = 1 - Math.pow(1 - progress, 3);
        el.textContent = String(Math.round(target * eased));
        if (progress < 1) requestAnimationFrame(tick);
    };

    requestAnimationFrame(tick);
}

function initReveal() {
    const items = document.querySelectorAll('.reveal');
    if (!items.length) return;

    items.forEach((el, index) => {
        el.style.transitionDelay = `${Math.min(index % 6, 5) * 60}ms`;
        if (el.closest('#top')) {
            el.classList.add('is-visible');
        }
    });
}

function initCounters() {
    // Triggered by zig-zag when services panel activates
}

function initParallax() {
    const layers = document.querySelectorAll('[data-parallax]');
    if (!layers.length) return;

    let ticking = false;

    const update = () => {
        const y = window.scrollY;
        layers.forEach((layer) => {
            const speed = Number(layer.getAttribute('data-parallax') || 0);
            layer.style.transform = `translate3d(0, ${y * speed}px, 0)`;
        });
        ticking = false;
    };

    window.addEventListener(
        'scroll',
        () => {
            if (!ticking) {
                requestAnimationFrame(update);
                ticking = true;
            }
        },
        { passive: true }
    );

    update();
}

function initSmoothAnchors() {
    document.querySelectorAll('[data-zz-jump], a[href^="#"]').forEach((el) => {
        el.addEventListener('click', (event) => {
            const jump = el.getAttribute('data-zz-jump') || el.getAttribute('data-hs-jump');
            const id = jump || (el.getAttribute('href') || '').replace('#', '');
            if (!id) return;

            event.preventDefault();

            if (typeof window.zzJumpTo === 'function') {
                window.zzJumpTo(id);
                return;
            }

            const target = document.getElementById(id);
            if (target) target.scrollIntoView({ behavior: 'smooth', block: 'start' });
        });
    });
}

function initMagneticButtons() {
    if (window.matchMedia('(pointer: coarse)').matches) return;

    document.querySelectorAll('.btn--magnetic').forEach((btn) => {
        const strength = 28;

        btn.addEventListener('mousemove', (event) => {
            const rect = btn.getBoundingClientRect();
            const x = event.clientX - rect.left - rect.width / 2;
            const y = event.clientY - rect.top - rect.height / 2;
            btn.style.transform = `translate(${x / strength}px, ${y / strength}px) scale(1.04)`;
        });

        btn.addEventListener('mouseleave', () => {
            btn.style.transform = '';
        });
    });
}

function initTiltCards() {
    if (window.matchMedia('(pointer: coarse)').matches) return;

    document.querySelectorAll('.tilt-card').forEach((card) => {
        card.addEventListener('mousemove', (event) => {
            const rect = card.getBoundingClientRect();
            const x = event.clientX - rect.left;
            const y = event.clientY - rect.top;
            const midX = rect.width / 2;
            const midY = rect.height / 2;
            const rotateY = ((x - midX) / midX) * 8;
            const rotateX = ((midY - y) / midY) * 8;

            card.style.transform = `perspective(800px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) scale(1.02)`;
        });

        card.addEventListener('mouseleave', () => {
            card.style.transform = '';
        });
    });
}

function initDeerCursor() {
    const cursor = document.getElementById('deer-cursor');
    if (!cursor || window.matchMedia('(pointer: coarse)').matches) return;

    document.body.classList.add('has-deer-cursor');

    let x = 0;
    let y = 0;
    let currentX = 0;
    let currentY = 0;
    let active = false;

    document.addEventListener('mousemove', (event) => {
        x = event.clientX;
        y = event.clientY;
        if (!active) {
            active = true;
            cursor.classList.add('is-active');
            requestAnimationFrame(render);
        }
    });

    document.addEventListener('mousedown', () => cursor.classList.add('is-down'));
    document.addEventListener('mouseup', () => cursor.classList.remove('is-down'));

    document.addEventListener('mouseleave', () => {
        cursor.classList.remove('is-active');
        active = false;
    });

    function render() {
        if (!active) return;
        currentX += (x - currentX) * 0.2;
        currentY += (y - currentY) * 0.2;
        cursor.style.left = `${currentX}px`;
        cursor.style.top = `${currentY}px`;
        requestAnimationFrame(render);
    }
}
