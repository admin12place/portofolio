<?php get_header(); ?>

<main class="site-main">

    <article class="manifesto">
        <div class="manifesto-title"><h2><?php the_field('home_title'); ?></h2></div>
        <div class="manifesto-concept">
            <div class="manifesto-slogan">
                <p><?php the_field('home_slogan'); ?></p>
            </div>
            <div class="manifesto-text">
                <p><?php the_field('home_text'); ?></p>
            </div>
        </div>

    </article>

    <article class="manifesto">
        <div class="manifesto-title"><h2><?php the_field('projects_title'); ?></h2></div>
        <div class="manifesto-concept">
            <div class="manifesto-slogan">
                <p><?php the_field('projects_slogan'); ?></p>
            </div>
            <div class="manifesto-text">
                <p><?php the_field('projects_text'); ?></p>
            </div>
        </div>

        <div class="page-nav"></div>

    </article>

    <section class="realized-projects">

        <div class="projects-screens">
            <img class="screen-image" src="http://www.thierrydel-pf.local/wp-content/uploads/2026/08/The-Artbox_screen.png" alt="" title="" />
            <article class="screen-project">
                <h3 class="title-project">THE ARTBOX</h3>
                <p class="client-project">The ArtBox Gallery</p>
                <p class="desc-project">Galerie d'art moderne</p>
            </article>
        </div>

        <div class="projects-screens">
            <img class="screen-image" src="http://www.thierrydel-pf.local/wp-content/uploads/2026/08/Koukaki_screen.png" alt="" title="" />
            <article class="screen-project">
                <h3 class="title-project">KOUKAKI</h3>
                <p class="client-project">Koukaki Studio</p>
                <p class="desc-project">Fleurs d'oranger & chats errants</p>
            </article>
        </div>

        <div class="projects-screens">
            <img class="screen-image" src="http://www.thierrydel-pf.local/wp-content/uploads/2026/08/N.Mota_screen.png" alt="" title="" />
            <article class="screen-project">
                <h3 class="title-project">NATHALIE MOTA</h3>
                <p class="client-project">N.Mota photografy</p>
                <p class="desc-project">Photographe professionnelle</p>
            </article>
        </div>

        <div class="projects-screens">
            <img class="screen-image" src="http://www.thierrydel-pf.local/wp-content/uploads/2026/08/Print-it_screen.png" alt="" title="" />
            <article class="screen-project">
                <h3 class="title-project">PRINT-IT</h3>
                <p class="client-project">Print-It</p>
                <p class="desc-project">Imprimerie en ligne</p>
            </article>
        </div>

        


    </section>

</main>

<?php get_footer(); ?>