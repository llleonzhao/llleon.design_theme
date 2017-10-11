<?php if ( is_active_sidebar( 'shop-sidebar' ) ) { ?>

	<?php dynamic_sidebar( 'shop-sidebar' ); ?>

<?php } else { ?>
    
	<p><?php esc_html_e('No widgets found.', 'nora') ?></p>

<?php } ?>