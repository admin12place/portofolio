
/*CURSOR DOT*/
const cursorDot = document.querySelector('.cursor-dot');

document.addEventListener('mousemove', (e) => {
    cursorDot.style.left = `${e.clientX}px`;
    cursorDot.style.top = `${e.clientY}px`;
});

/*MENU BURGER*/
const menuBurger = document.querySelector('.burger');
const menuContainer = document.querySelector('.primary-navigation');

if (menuBurger && menuContainer) {
    menuBurger.addEventListener('click', () => {
        menuBurger.classList.add('undisplayed');
        menuContainer.classList.add('active');
    });

    document.addEventListener('click', (e) => {
        if (
            (!menuContainer.contains(e.target) && !menuBurger.contains(e.target)) ||
            e.target.closest('a[href="#contact"]')
        ) {
            menuContainer.classList.remove('active');
            menuBurger.classList.remove('undisplayed');
        }
    });
}

/*EFFET MIRROIR*/
window.addEventListener('load', () => {
    const titleMirror = document.querySelector('.title-mirror');
    const titleText = document.querySelector('.title-text');
    const siteMain = document.querySelector('.site-main');

    setTimeout(() => {
        titleMirror.classList.add('vanished');
        titleText.classList.add('decaled');
        siteMain.classList.add('decaled');
    }, 500);
});
