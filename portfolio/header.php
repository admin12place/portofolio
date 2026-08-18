<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>PortFolie</title>
        <?php wp_head(); ?>
    </head>
<body>
    <header>
        <section class="logo-menu">
            <?php get_template_part( 'template-parts/site-logo' ); ?>

            <div class="main-menu-place">
                <?php get_template_part( 'template-parts/site-main-menu' ); ?>
            </div>
        </section>

        <section class="site-description">
            <img class="title-text" src="<?php echo get_stylesheet_directory_uri() . '/assets/title-text-color.png'?>" alt="Bandeau de titre"/>
        </section>
    </header>
