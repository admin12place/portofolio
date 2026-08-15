<?php

register_nav_menus([
    'primary' => 'Menu principal',
    'footer'  => 'Menu footer'
]);
/*INJECTION DES FEUILLES DE STYLE*/
    function portfolio_enqueue_styles() {

        wp_enqueue_style(
            'portfolio',
            get_stylesheet_uri(),
            [],
            filemtime(get_stylesheet_directory() . '/style.css')
        );

        wp_enqueue_style(
            'main-style',
            get_stylesheet_directory_uri() . '/styles/main-style.css',
            ['portfolio'],
            filemtime(get_stylesheet_directory() . '/styles/main-style.css')
        );
    }

    add_action('wp_enqueue_scripts', 'portfolio_enqueue_styles');
/*FIN D'INJECTION DES FEUILLES DE STYLE*/

