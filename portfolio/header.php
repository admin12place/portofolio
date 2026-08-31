<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="description" content="Le site  de l'agence web PortFolie, projets, réalisations et compétences."><meta name="description" content="Mon portfolio de développeur web présentant mes projets, réalisations et compétences.">
        <title>PortFolie, agence web</title>
        <?php wp_head(); ?>
    </head>
<body>
<div class="cursor-dot"></div>
    <header>
        <section class="logo-menu">
            <h1><?php get_template_part( 'template-parts/site-logo' ); ?></h1>

            

            <div class="main-menu-place">

                <button class="burger" aria-label="Ouvrir le menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>

                <?php get_template_part( 'template-parts/site-main-menu' ); ?>
                
            </div>
        </section>

        <section class="site-description">

            <img class="title-text" src="<?php echo get_stylesheet_directory_uri() . '/assets/title-text-color.png'?>" alt="Bandeau de titre" title="Image hero Portfolie"/>
        
            <img class="title-mirror" src="<?php echo get_stylesheet_directory_uri() . '/assets/title-text-color-reverse.png'?>" alt="Bandeau de titre inversé" title="Image hero Portfolie reverse"/>

        </section>

    </header>
