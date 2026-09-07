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
                'id'         => get_the_ID(),
                'title'      => get_post_meta(get_the_ID(), 'project_title', true),
                'link'       => get_post_meta(get_the_ID(), 'project_link', true),
                'customer'   => get_post_meta(get_the_ID(), 'project_customer', true),
                'activity'   => get_post_meta(get_the_ID(), 'project_activity', true),
                'description'=> get_post_meta(get_the_ID(), 'project_desc', true),
                'imgurl'     => wp_get_attachment_url($image_id),
                'imgalt'     => get_post_meta($image_id, '_wp_attachment_image_alt', true),
                'imgtitle'   => get_the_title($image_id),
                'url'        => get_permalink()."?from=".$cat,
            ];
        }

        wp_reset_postdata();
    }

    return $project;
}

/* RÉCUPÉRATION DES DONNÉES D'UNE MODALE */
function get_modale_datas($post_id = false) {

    $img_url = get_field('modal_team_img', $post_id);
    $img_id  = $img_url ? attachment_url_to_postid($img_url) : 0;

    return [
        'title'     => get_field('team_title', $post_id),
        'slogan'    => get_field('team_slogan', $post_id),
        'text'      => get_field('team_text', $post_id),
        'imgid'     => $img_id,
        'imgurl'    => $img_url,
        'imgalt'    => $img_id ? get_post_meta($img_id, '_wp_attachment_image_alt', true) : '',
        'imgtitle'  => $img_id ? get_the_title($img_id) : '',
        'modaltext' => get_field('modal_team_text', $post_id),
    ];
}

/*FONCTION D'AFFICHAGE DES ARTICLES 'MANIFESTO'*/
function display_article_manifesto($prefix) {
    ?>
    <article class="manifesto">
        <div class="manifesto-title">
            <h2><?php the_field($prefix . '_title'); ?></h2>
        </div>

        <div class="manifesto-concept">
            <div class="manifesto-slogan">
                <h3><?php the_field($prefix . '_slogan'); ?></h3>
            </div>

            <div class="manifesto-text">
                <p><?php the_field($prefix . '_text'); ?></p>
            </div>
        </div>
    </article>
    <?php
}

/*RÉCUPÈRATION DES RÉSEAUX SOCIAUX*/
function get_social_network() {
    $social_network = [];

    $query = new WP_Query([
        'post_type'      => 'social_network',
        'posts_per_page' => -1,
        'post_status'    => 'publish',
        'orderby'        => 'rand',
    ]);

    if ($query->have_posts()) {

        while ($query->have_posts()) {
            $query->the_post();

            $icon_id = get_post_meta (get_the_ID(), 'network_icon', true);

            $social_network[] = [
                'id'                => get_the_ID(),
                'title'             => get_post_meta(get_the_ID(), 'network_title', true),
                'link'              => get_post_meta(get_the_ID(), 'network_link', true),
                'iconurl'           => wp_get_attachment_url($icon_id),
                'iconalt'           => get_post_meta(get_the_ID(), 'network_alt', true),
                'icontitle'         => get_post_meta(get_the_ID(), 'network_title', true),
                'social_networkurl' => get_permalink(),
            ];
        }

        wp_reset_postdata();
    }

    return $social_network;
}

/*REMPLISSAGE SIMULTANÉ DU TITRE ACF ET DU TITRE H1 NATIF*/
add_action('admin_footer-post-new.php', function () {

    global $post_type;

    if ($post_type !== 'social_network') {
        return;
    }
    ?>

    <script>
    document.addEventListener('DOMContentLoaded', function () {

        const acfField = document.querySelector('#acf-field_6a9a6d149841b');

        if (!acfField) {
            return;
        }

        function updatePostTitle() {

            const title = acfField.value.trim();

            wp.data.dispatch('core/editor').editPost({
                title: title
            });
        }

        acfField.addEventListener('input', updatePostTitle);
        acfField.addEventListener('change', updatePostTitle);

    });
    </script>

    <?php
});

/* ENREGISTRE LE TITRE NATIF À PARTIR DU CHAMP ACF */
add_action('acf/save_post', function ($post_id) {

    if (get_post_type($post_id) !== 'social_network') {
        return;
    }

    $network_title = get_field('network_title', $post_id);

    if (empty($network_title)) {
        return;
    }

    wp_update_post([
        'ID'         => $post_id,
        'post_title' => sanitize_text_field($network_title),
    ]);

}, 20);