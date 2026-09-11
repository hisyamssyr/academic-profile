/* ==========================================================
 * Interaktivitas — vanilla JS, tanpa dependensi eksternal.
 * Hooks yang dikenali markup:
 *   [data-menu-button] [data-mobile-menu] [data-menu-icon]
 *   [data-menu-icon-close]
 *   [data-scroll-progress]        -> bar progres atas
 *   [data-reveal] / [data-reveal-group] -> reveal on scroll
 *   [data-count-up] [data-count-decimals] -> count-up angka
 *   [data-scroll-top] [data-scroll-top-label] -> tombol ke atas
 * ========================================================== */

(function () {
    'use strict';

    var reducedMotion = false;
    if (window.matchMedia) {
        reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    }

    /* ---------- 1. Menu mobile ---------- */

    var menuButton = document.querySelector('[data-menu-button]');
    var mobileMenu = document.querySelector('[data-mobile-menu]');
    var menuIcon = menuButton ? menuButton.querySelector('[data-menu-open]') : null;
    var menuIconClose = menuButton ? menuButton.querySelector('[data-menu-close]') : null;

    function setMobileMenu(open) {
        if (!menuButton || !mobileMenu) { return; }
        menuButton.setAttribute('aria-expanded', String(open));
        menuButton.setAttribute('aria-label', open ? 'Tutup menu navigasi' : 'Buka menu navigasi');
        if (menuIcon) { menuIcon.hidden = !open; }
        if (menuIconClose) { menuIconClose.hidden = open; }
        mobileMenu.hidden = !open;
        document.body.style.overflow = open ? 'hidden' : '';
    }

    if (menuButton && mobileMenu) {
        menuButton.addEventListener('click', function () {
            var open = menuButton.getAttribute('aria-expanded') === 'true';
            setMobileMenu(!open);
        });
        mobileMenu.querySelectorAll('a').forEach(function (link) {
            link.addEventListener('click', function () {
                if (menuButton.getAttribute('aria-expanded') === 'true') { setMobileMenu(false); }
            });
        });
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && menuButton.getAttribute('aria-expanded') === 'true') {
                setMobileMenu(false);
                menuButton.focus();
            }
        });
    }

    /* ---------- 2. Progress bar scroll ---------- */

    var progressBar = document.querySelector('[data-scroll-progress]');
    if (progressBar) {
        var updateProgress = function () {
            var doc = document.documentElement;
            var max = Math.max(doc.scrollHeight - doc.clientHeight, 1);
            var ratio = Math.min(doc.scrollTop / max, 1);
            progressBar.style.transform = 'scaleX(' + ratio + ')';
        };
        window.addEventListener('scroll', function () {
            if (reducedMotion) { updateProgress(); }
            else { this.requestAnimationFrame(updateProgress); }
        }, { passive: true });
        updateProgress();
    }

    /* ---------- 3. Reveal on scroll (stagger per child) ---------- */

    var revealables = Array.prototype.slice.call(document.querySelectorAll('[data-reveal-group]'));
    if (revealables.length) {
        var revealAll = function (el) {
            var children = el.querySelectorAll('[data-reveal]');
            Array.prototype.forEach.call(children, function (child, i) {
                var raw = child.getAttribute('data-reveal') || '';
                var delay = parseInt(raw, 10);
                if (isNaN(delay)) { delay = i * 60; }
                child.style.transitionDelay = delay * 60 + 'ms';
                child.classList.add('is-revealed');
            });
            el.classList.add('is-revealed');
        };
        if (!reducedMotion && 'IntersectionObserver' in window) {
            var revealObserver = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    if (!entry.isIntersecting) { return; }
                    revealAll(entry.target);
                    revealObserver.unobserve(entry.target);
                });
            }, { threshold: 0.12, rootMargin: '0px 0px -48px 0px' });
            revealables.forEach(function (el) { revealObserver.observe(el); });
        } else {
            revealables.forEach(revealAll);
        }
    }

    /* ---------- 4. Count-up angka ---------- */

    function animateCount(el) {
        var raw = (el.getAttribute('data-count-up') || '').trim();
        var decimals = parseInt(el.getAttribute('data-count-decimals') || '0', 10);
        if (isNaN(decimals)) { decimals = 0; }
        var target = parseFloat(raw);
        if (isNaN(target)) { return; }
        var isInt = decimals === 0;
        var duration = reducedMotion ? 0 : 1000;
        var start = null;
        var finalText = isInt ? String(Math.round(target)) : target.toFixed(decimals).replace('.', ',');

        function frame(ts) {
            if (start === null) { start = ts; }
            var progress = duration === 0 ? 1 : Math.min((ts - start) / duration, 1);
            var eased = 1 - Math.pow(1 - progress, 3);
            var value = target * eased;
            el.textContent = isInt
                ? String(Math.round(value))
                : value.toFixed(decimals).replace('.', ',');
            if (progress < 1) {
                window.requestAnimationFrame(frame);
            } else {
                el.textContent = finalText;
            }
        }
        window.requestAnimationFrame(frame);
    }

    var counters = Array.prototype.slice.call(document.querySelectorAll('[data-count-up]'));
    if (counters.length) {
        if ('IntersectionObserver' in window && !reducedMotion) {
            var countObserver = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    if (!entry.isIntersecting) { return; }
                    animateCount(entry.target);
                    countObserver.unobserve(entry.target);
                });
            }, { threshold: 0.35 });
            counters.forEach(function (el) { countObserver.observe(el); });
        } else {
            counters.forEach(animateCount);
        }
    }

    /* ---------- 5. Tombol kembali ke atas ---------- */

    var topButton = document.querySelector('[data-scroll-top]');
    if (topButton) {
        var checkTop = function () {
            topButton.hidden = document.documentElement.scrollTop < 420;
        };
        window.addEventListener('scroll', function () {
            if (reducedMotion) { checkTop(); }
            else { this.requestAnimationFrame(checkTop); }
        }, { passive: true });
        topButton.addEventListener('click', function () {
            window.scrollTo({ top: 0, behavior: reducedMotion ? 'auto' : 'smooth' });
        });
        checkTop();
    }
})();
