document.addEventListener('DOMContentLoaded', () => {
    // Menu mobile
    const toggle = document.getElementById('mobile-menu-toggle');
    const menu = document.getElementById('mobile-menu');

    if (toggle && menu) {
        toggle.addEventListener('click', () => {
            const isOpen = menu.classList.toggle('is-open');
            toggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
        });
    }

    // En-tête : ombre + fond opaque au scroll
    const header = document.getElementById('site-header');
    if (header) {
        const onScroll = () => {
            header.classList.toggle('is-scrolled', window.scrollY > 12);
        };
        onScroll();
        window.addEventListener('scroll', onScroll, { passive: true });
    }

    // Alertes flash auto-masquées
    document.querySelectorAll('[data-auto-dismiss]').forEach((el) => {
        setTimeout(() => {
            el.classList.add('opacity-0');
            setTimeout(() => el.remove(), 500);
        }, 5000);
    });

    // Animations douces à l'apparition au scroll
    const animated = document.querySelectorAll('[data-animate]');
    if (animated.length) {
        if ('IntersectionObserver' in window) {
            const observer = new IntersectionObserver(
                (entries) => {
                    entries.forEach((entry) => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('in-view');
                            observer.unobserve(entry.target);
                        }
                    });
                },
                { threshold: 0.15, rootMargin: '0px 0px -40px 0px' }
            );
            animated.forEach((el) => observer.observe(el));

            // Filet de sécurité : si un élément n'a toujours pas été révélé
            // après un délai raisonnable (observer jamais déclenché, onglet
            // resté en arrière-plan, etc.), on l'affiche quand même plutôt
            // que de le laisser invisible indéfiniment.
            window.setTimeout(() => {
                animated.forEach((el) => el.classList.add('in-view'));
            }, 2500);
        } else {
            animated.forEach((el) => el.classList.add('in-view'));
        }
    }

    // Compteurs animés (statistiques du hero, etc.)
    const counters = document.querySelectorAll('[data-count]');
    if (counters.length) {
        const animateCount = (el) => {
            const target = parseInt(el.dataset.count, 10);
            const suffix = el.dataset.countSuffix || '';
            if (!Number.isFinite(target)) return;

            el.classList.add('in-view');
            const duration = 1100;
            const start = performance.now();

            const step = (now) => {
                const progress = Math.min((now - start) / duration, 1);
                const eased = 1 - Math.pow(1 - progress, 3);
                el.textContent = Math.round(eased * target) + suffix;
                if (progress < 1) {
                    requestAnimationFrame(step);
                }
            };
            requestAnimationFrame(step);
        };

        if ('IntersectionObserver' in window) {
            const countObserver = new IntersectionObserver(
                (entries) => {
                    entries.forEach((entry) => {
                        if (entry.isIntersecting) {
                            animateCount(entry.target);
                            countObserver.unobserve(entry.target);
                        }
                    });
                },
                { threshold: 0.6 }
            );
            counters.forEach((el) => countObserver.observe(el));
        } else {
            counters.forEach((el) => animateCount(el));
        }
    }
});
