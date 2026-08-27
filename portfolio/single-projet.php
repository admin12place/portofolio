<?php get_header(); ?>

<?php
    $image_id   = get_post_meta(get_the_ID(), 'project_img', true);
    $title      = get_post_meta(get_the_ID(), 'project_title', true);
    $customer   = get_post_meta(get_the_ID(), 'project_customer', true);
    $link       = get_post_meta(get_the_ID(), 'project_link', true);
    $activity   = get_post_meta(get_the_ID(), 'project_activity', true);
    $desc       = get_post_meta(get_the_ID(), 'project_desc', true);
    $image_url  = wp_get_attachment_url($image_id);
    $imgalt     = get_post_meta($image_id, '_wp_attachment_image_alt', true);
    $imgtitle   = get_the_title($image_id);
?>
<main class="site-main">
    <article class="main-single">
        <div class="single-title">
            <h1><?php echo $title; ?></h1>
        </div>
        <div class="body-single">
            <div class="single-image">
            <img class="screen-image" src="<?php echo $image_url; ?>" alt="<?php echo $imgalt; ?>" title="<?php echo $imgtitle; ?>" />
            </div>
            <div class="single-verbose">
                <p>TITRE DU PROJET : <?php echo $title; ?></p>
                <p>NOM DU CLIENT : <?php echo $customer; ?></p>
                <p>SECTEUR D'ACTIVITÉ : <?php echo $activity; ?></p>
                <p> DESCRIPTION DU PROJET : <?php echo nl2br(esc_html($desc)); ?></p>
            </div>
        </div>
    </article>
    <div class="single-navigation">
        <a href="">
            <img class="arrow-preview" src="<?php echo get_stylesheet_directory_uri() . '/assets/icon-arrowleft.png'?>" alt="Projet précédent" title="Projet précédent"/>
        </a>
        
        <a href="">
            <img class="arrow-next" src="<?php echo get_stylesheet_directory_uri() . '/assets/icon-arrowright.png'?>" alt="Projet précédent" title="Projet précédent"/>
        </a>
    </div>

</main>

<?php get_footer(); ?>