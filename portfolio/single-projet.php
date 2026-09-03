<?php get_header(); ?>

<?php
    //Pour la gestion des flèches
    $from =  $_GET['from'] ?? 'projet';
    $projects = get_projects("$from");
    $current_id = get_the_ID();
    $current_index = array_search($current_id, array_column($projects, 'id'));

    //Pour l'affichage des infos
    $title      = get_post_meta(get_the_ID(), 'project_title', true);
    $customer   = get_post_meta(get_the_ID(), 'project_customer', true);
    $link       = get_post_meta(get_the_ID(), 'project_link', true);
    $activity   = get_post_meta(get_the_ID(), 'project_activity', true);
    $desc       = get_post_meta(get_the_ID(), 'project_desc', true);

    $image_id   = get_post_meta(get_the_ID(), 'project_img', true);
    $image_url  = wp_get_attachment_url($image_id);
    $imgalt     = get_post_meta($image_id, '_wp_attachment_image_alt', true);
    $imgtitle   = get_the_title($image_id);
?>

<main class="site-main">
    <article class="main-single" data-project-id="<?php echo get_the_ID(); ?>">
        <div class="single-title">
            <h1><?php echo $title; ?></h1>
        </div>
        <div class="body-single project-transition">
            <div class="single-image">
                <img class="screen-image project-image" src="<?php echo $image_url; ?>" alt="<?php echo $imgalt; ?>" title="<?php echo $imgtitle; ?>" />
            </div>
            <div class="single-verbose project-info">
                <p>TITRE DU PROJET : <?php echo $title; ?></p>
                <p>NOM DU CLIENT : <?php echo $customer; ?></p>
                <p>SECTEUR D'ACTIVITÉ : <?php echo $activity; ?></p>
                <p>LIEN : <a href="<?php echo $link; ?>" target="blank"><?php echo $title; ?></a></p>
                <p>DESCRIPTION DU PROJET : <?php echo nl2br(esc_html($desc)); ?></p>
            </div>
        </div>
    </article>
    <div class="single-navigation">

        <button class="arrow-preview" type="button" aria-label="Projet précédent">
            <img src="<?php echo get_stylesheet_directory_uri() . '/assets/icon-arrowleft.png'?>" alt="Projet précédent" title="Projet précédent"/>
        </button>

        <button class="arrow-next" type="button" aria-label="Projet suivant">
            <img src="<?php echo get_stylesheet_directory_uri() . '/assets/icon-arrowright.png'?>" alt="Projet précédent" title="Projet précédent"/>
        </button>

    </div>

</main>

<script>
    const projects = <?php echo wp_json_encode($projects); ?>;
    const currentProjectId = <?php echo get_the_ID(); ?>;
</script>

<script>
window.addEventListener('load', () => {
    window.scrollTo({
        top: 180,
        behavior: 'smooth'
    });
});
</script>

<?php get_footer(); ?>