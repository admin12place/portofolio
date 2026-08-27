<?php get_header(); ?>

<section class="modale-team">
    <div class="modale-team-image">
        <img class="" src="<?php echo the_field('modal_team_img')?>"/>
    </div>
    <div class="modale-team-text">
        <p><?php echo nl2br(esc_html(get_field('modal_team_text'))); ?></p>
    </div>
</section>

<main class="site-main">

    <?php

        $articles_manifestos = ['home', 'team', 'projects'];//Les différents paragraphes de home
        foreach ($articles_manifestos as $article_manifesto) {
            display_article_manifesto($article_manifesto);
        }

    ?>

    <section class="realized-projects">
        <?php
            $realized = get_projects('realisation');
            foreach ($realized as $real) {
                $title = $real['title'];
                $link = $real['link'];
                $customer = $real['customer'];
                $activity = $real['activity'];
                $description = $real['description'];
                $img_url = !empty($real['imgid']) ? $real['imgid'] : get_stylesheet_directory_uri() . '/assets/no-image-screen.png';
                $img_alt   = $real['imgalt'] ?? '';
                $img_title = $real['imgtitle'] ?? '';
                $project_url = $real['url'] ?? '';
        ?>

            <div class="projects-screens">

            <a href="<?php echo $project_url; ?>">
            <img class="screen-image" src="<?php echo $img_url; ?>" alt="<?php echo $img_alt; ?>" title="<?php echo $img_title; ?>" />
                </a>

                <article class="screen-project">
                    <h3 class="title-project"><?php echo $title; ?></h3>
                    <p class="client-project"><?php echo $customer; ?></p>
                    <p class="desc-project"><?php echo $activity; ?></p>
                </article>
                
            </div>
        <?php
        }
        ?>
        
    </section>

</main>

<?php get_footer(); ?>