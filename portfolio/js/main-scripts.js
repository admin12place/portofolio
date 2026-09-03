
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
        e.preventDefault();
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


    function displayProject(project, direction) {

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
            `LIEN : <a href="${project.link}" target="blank"> ${project.title} </a>`;

        paragraphs[4].innerHTML =
            `DESCRIPTION DU PROJET : ${
                project.description.replace(/\n/g, '<br>')
            }`;

        currentId = project.id;
        article.dataset.projectId = project.id;


        history.pushState({}, '', project.url);

    }

    //TRANSITION ENTRE LES PROJETS
    const projectTransition = document.querySelector('.project-transition');
    
    previous.addEventListener('click', () => {
        const index = getIndex();
        const previousIndex = (index - 1 + projects.length) % projects.length;
        article.classList.add('hide-article');
        projectTransition.classList.add('transition');
        setTimeout(() => {
            displayProject(projects[previousIndex]);
            projectTransition.classList.remove('transition');
            }, 500);
    });
    
    
    next.addEventListener('click', () => {
        const index = getIndex();
        const nextIndex = (index + 1) % projects.length;
        article.classList.add('hide-article');
        projectTransition.classList.add('transition');
        setTimeout(() => {
        displayProject(projects[nextIndex]);
        projectTransition.classList.remove('transition');
        }, 500);
    });
});

/*Animation de la single project*/



/*FIN DE GESTION DE LA SINGLE-PROJET*/

/*COULEURS DES MANIFESTOS*/
const colors = ['#0000FF', '#FF0000', '#00AA00'];
colors.sort(() => Math.random() - 0.5);

const elements = document.querySelectorAll('.manifesto');

elements.forEach((element, index) => {

    const color = colors[index % colors.length];

    element.querySelector('.manifesto-slogan').style.color = color;

});
/*FIN DE COULEURS DES MANIFESTOS*/
