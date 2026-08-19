<?php if ( has_nav_menu( 'footer' ) ) : ?>
	<nav aria-label="<?php esc_attr_e( 'Secondary menu', 'portfolie' ); ?>" class="footer-navigation">
		<ul class="footer-navigation-wrapper">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'footer',
					'items_wrap'     => '%3$s',
					'container'      => false,
					'depth'          => 1,
					'link_before'    => '<span>',
					'link_after'     => '</span>',
					'fallback_cb'    => false,
				)
			);
			?>
		</ul>
	</nav>
<?php endif; ?>