<?php get_header(); ?>

<div class="content">

   <div class="nora-standard-row ptb-80">

        <div class="container">

            <div class="row">

                <div class="col-md-12">

					<?php while( have_posts() ) : the_post(); ?>

						<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

							<div class="post-content">
								<?php the_content(); ?>
							</div>

						</div>

						<?php if ( comments_open() || get_comments_number() ) : ?>

							<?php comments_template( '', true ); ?>

						<?php endif; ?>

					<?php endwhile; ?>

                </div>

            </div>

        </div>

    </div>

</div>

<?php get_footer(); ?>