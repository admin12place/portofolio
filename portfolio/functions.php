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


/*RÉCUPERATION DES PROJETS EN FONCTION DE LEUR CATÉGORIE*/
function get_projects($cat) {
    $project = [];

    $query = new WP_Query([
        'post_type'      => 'projet',
        'posts_per_page' => -1,
        'post_status'    => 'publish',

        'tax_query' => [
            ['taxonomy' => 'category', 'field'  => 'slug', 'terms'  => $cat,],
        ],
    ]);

    if ($query->have_posts()) {

        while ($query->have_posts()) {
            $query->the_post();

            $image_id = get_post_meta (get_the_ID(), 'project_img', true);

            $project[] = [
                'title'    => get_post_meta(get_the_ID(), 'project_title', true),
                'customer' => get_post_meta(get_the_ID(), 'project_customer', true),
                'link'     => get_post_meta(get_the_ID(), 'project_link', true),
                'desc'     => get_post_meta(get_the_ID(), 'project_desc', true),
                'img'      => wp_get_attachment_url($image_id),
            ];
        }

        wp_reset_postdata();
    }

    return $project;
}
        

        
        

