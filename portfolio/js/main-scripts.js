
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

/*GESTION DE LA SINGLE-PROJET*/
document.addEventListener('DOMContentLoaded', () => {

    const article = document.querySelector('.main-single');
    const previous = document.querySelector('.arrow-preview');
    const next = document.querySelector('.arrow-next');

    if (!article || !previous || !next) {
        return;
    }
    let currentId = currentProjectId;


    function getIndex() {
        return projects.findIndex(
            project => Number(project.id) === Number(currentId)
        );
    }


    function displayProject(project) {

        article.querySelector('h1').textContent = project.title;
        const image = article.querySelector('.screen-image');

        image.src = project.imgurl;
        image.alt = project.imgalt;
        image.title = project.imgtitle;

        const paragraphs =
            article.querySelectorAll('.single-verbose p');

        paragraphs[0].textContent =
            `TITRE DU PROJET : ${project.title}`;

        paragraphs[1].textContent =
            `NOM DU CLIENT : ${project.customer}`;

        paragraphs[2].textContent =
            `SECTEUR D'ACTIVITÉ : ${project.activity}`;

        paragraphs[3].innerHTML =
            `LIEN : <a href="${project.link}"> ${project.link} </a>`;

        paragraphs[4].innerHTML =
            `DESCRIPTION DU PROJET : ${
                project.description.replace(/\n/g, '<br>')
            }`;

        currentId = project.id;
        article.dataset.projectId = project.id;


        history.pushState(
            {},
            '',
            project.url
        );

    }
    

    previous.addEventListener('click', () => {
        const index = getIndex();
        const previousIndex = (index - 1 + projects.length) % projects.length;
        displayProject(projects[previousIndex]);
    });
    
    
    next.addEventListener('click', () => {
        const index = getIndex();
        const nextIndex = (index + 1) % projects.length;
        displayProject(projects[nextIndex]);
    });
});
 
