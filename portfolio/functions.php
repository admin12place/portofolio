<?php

register_nav_menus([
    'primary' => 'Menu principal',
    'footer'  => 'Menu footer'
]);
/*INJECTION DES FEUILLES DE STYLE*/
    function portfolie_enqueue_styles() {

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

    add_action('wp_enqueue_scripts', 'portfolie_enqueue_styles');
/*FIN D'INJECTION DES FEUILLES DE STYLE*/

/*INJECTION DU SCRIPT JS PRINCIPAL*/
function portfolie_enqueue_main_scripts() {

    wp_enqueue_script(
        'script-global',
        get_stylesheet_directory_uri() . '/js/main-scripts.js',
        array(),
        filemtime(get_stylesheet_directory() . '/js/main-scripts.js'), true);
}

add_action( 'wp_enqueue_scripts', 'portfolie_enqueue_main_scripts' );
/*FIN D'INJECTION DU SCRIPT JS PRINCIPAL*/

