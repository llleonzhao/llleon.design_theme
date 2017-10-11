<?php if ( is_active_sidebar( 'primary-sidebar' ) ) { ?>

	<?php dynamic_sidebar( 'primary-sidebar' ); ?>

<?php } else { ?>
    
	<p><?php esc_html_e('No widgets found.', 'nora') ?></p>

<?php } ?>