<?php get_header(); ?>

<main class="site-main">

    <header class="entry-header">
        <h1><?php the_title(); ?></h1>
    </header>

    <div class="page-content">
        <?php
        while (have_posts()) :

            the_post();
            the_content();

        endwhile;
        ?>
    </div>

    <section class="main-projects">
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
    </section>

    <section class="realized-projects">
        <?php
            $realized = get_projects('projet');
            foreach ($realized as $real) {
                $title = $real['title'];
                $link = $real['link'];
                $customer = $real['customer'];
                $description = $real['desc'];
                $img_url = !empty($real['img']) ? $real['img'] : get_stylesheet_directory_uri() . '/assets/no-image-screen.png';
                $img_alt   = $real['alt'] ?? '';
                $img_title = $real['title'] ?? '';
        ?>

            <div class="projects-screens">

                <a href="<?php echo $link; ?>" target="_blank">
                    <img class="screen-image" src="<?php echo $img_url; ?>" alt="<?php echo $img_alt; ?>" title="<?php echo $img_title; ?>" />
                </a>

                <article class="screen-project">
                    <h3 class="title-project"><?php echo $title; ?></h3>
                    <p class="client-project"><?php echo $customer; ?></p>
                    <p class="desc-project"><?php echo $description; ?></p>
                </article>
                
            </div>
        <?php
        }
        ?>
        
    </section>

    <div class="manifesto-postscriptum">
        <p><?php the_field('projects_postscriptum'); ?></p>
    </div>

</main>

<?php get_footer(); ?>