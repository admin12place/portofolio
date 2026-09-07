<section class="network-wrapper">
    <?php
        $social_networks = get_social_network();
        
        foreach ($social_networks as $social) {
            ?>
            <a class="social-link" href="<?php echo $social['link'];?>" target="_blank"><img class="icon-network" src="<?php echo $social['iconurl'];?>" title="<?php echo $social['icontitle'];?>" alt="<?php echo $social['iconalt'];?>"/></a>
            <?php
        }?>
</section>