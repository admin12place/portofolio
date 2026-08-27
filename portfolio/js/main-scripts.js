
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

/*FERMETURE DU MENU BURGER*/
const closeBurger = document.querySelector('.icon-close');

if (menuBurger && closeBurger) {
    closeBurger.addEventListener('click', () => {
        menuContainer.classList.remove('active');
        menuBurger.classList.remove('undisplayed');
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

/*APPARITION DES ICONES DE RÉSEAUX SOCIAUX*/
const networkWrapper = document.querySelector('.network-wrapper');

if (networkWrapper) {
    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                networkWrapper.classList.add('display_networks');
                observer.unobserve(networkWrapper);
            }
        });
    }, {
        threshold: 0.5
    });

    observer.observe(networkWrapper);
}
/*FIN D'APPARITION DES ICONES DE RÉSEAUX SOCIAUX*/

/*GESTION DE LA MODALE-TEAM*/
const modaleTeam = document.querySelector('.modale-team');
const modaleTeamLink = document.querySelector('.modal-team-link');

if (modaleTeam && modaleTeamLink) {
    modaleTeamLink.addEventListener('click', (e) => {
        e.stopPropagation();
        document.body.classList.add('no-scroll');
        modaleTeam.classList.add('displayed');
    });

    document.body.addEventListener('click', () => {
        document.body.classList.remove('no-scroll');
        modaleTeam.classList.remove('displayed');
    });
}
/*FIN DE GESTION DE LA MODALE-TEAM*/
 
