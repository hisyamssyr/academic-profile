const menuButton = document.querySelector('[data-menu-button]');
const mobileMenu = document.querySelector('[data-mobile-menu]');
const openIcon = document.querySelector('[data-menu-icon-open]');
const closeIcon = document.querySelector('[data-menu-icon-close]');

if (menuButton && mobileMenu) {
    menuButton.addEventListener('click', () => {
        const isOpen = menuButton.getAttribute('aria-expanded') === 'true';
        const nextState = !isOpen;

        menuButton.setAttribute('aria-expanded', String(nextState));
        mobileMenu.hidden = !nextState;

        if (openIcon && closeIcon) {
            openIcon.classList.toggle('hidden', nextState);
            closeIcon.classList.toggle('hidden', !nextState);
        }
    });
}
