<?php get_header(); ?>

<div id="page-content">

	<div class="container">

		<div class="row">
			<?php while( have_posts() ) : the_post(); ?>

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<div class="details">
						<a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a>
						<span><?php echo get_the_time('j M, Y'); ?></span>
					</div>

					<div class="attachment-media">
						<?php echo wp_get_attachment_image( get_the_ID(), 'large' ); ?>
					</div>

					<?php the_content( esc_html__( 'Read More', 'nora' ) ); ?>

					<p class='resolutions'> <?php esc_html_e('All resolutions', 'nora'); ?>
					<?php
						$images = array();
						$image_sizes = get_intermediate_image_sizes();
						array_unshift( $image_sizes, 'full' );
						foreach( $image_sizes as $image_size ) {
							$image = wp_get_attachment_image_src( get_the_ID(), $image_size );
							$name = $image_size . ' (' . $image[1] . 'x' . $image[2] . ')';
							$images[] = '<a href="' . $image[0] . '">' . $name . '</a>';
						}
						echo implode( ' | ', $images );
					?>
					</p>

				</div>

				<?php if ( comments_open() || get_comments_number() ) : ?>

					<?php comments_template( '', true ); ?>

				<?php endif; ?>

			<?php endwhile; ?>
		</div>

	</div>

</div>