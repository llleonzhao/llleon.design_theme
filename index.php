<?php get_header(); ?>

<?php

	$blog_layout = isset($_GET['layout']) ? $_GET['layout'] : get_theme_mod('nora_blog_layout', 'default');
	$is_sidebar = ($blog_layout == 'sidebar_left' || $blog_layout == 'sidebar_right') ? true : false;

	$max_pages = nora_get_max_pages();

	$have_olders_posts = get_next_posts_link() ? '' : 'no-more-posts';
	$have_newer_posts = get_previous_posts_link() ? '' : 'no-more-posts';

?>

<div class="content">
    <div class="nora-standard-row ptb-80">
        <div class="container">
            <div class="row">
            	
            	<?php if ($blog_layout == 'default') { ?>
            	
	                <div class="blog-masonry">
	
						<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
							<?php get_template_part( 'templates/blog-details.inc' ); ?> 
						<?php endwhile; else: ?>
							<p class="entry"><?php esc_html_e( 'No posts were found.', 'nora' ); ?></p> 
						<?php endif; ?>
	
	                </div>

	
					<?php if ( $max_pages > 1 ) { ?>

						<div class="col-md-6 col-sm-6 col-xs-6 prev-pag float-left <?php echo esc_attr($have_olders_posts); ?>">
							<a href="<?php echo esc_url( get_permalink(get_adjacent_post(false,'',true)) ); ?>">
								<?php echo get_next_posts_link('<i class="fa fa-angle-left"></i> Older posts'); ?>						
							</a>
						</div>

						<div class="col-md-6 col-sm-6 col-xs-6 next-pag float-right text-right <?php echo esc_attr($have_newer_posts); ?>">
							<a href="<?php echo esc_url( get_permalink(get_adjacent_post(false,'',false)) ); ?>">
								<?php echo get_previous_posts_link('Newer posts <i class="fa fa-angle-right"></i>'); ?>			
							</a>
						</div>

					<?php } ?>
                
                <?php } elseif ($blog_layout == 'sidebar_left') { ?>
                    <div class="col-lg-9 col-lg-push-3 col-md-8 col-md-push-4 col-sm-12">
                        <div class="row">
                            <div class="blog-masonry">        
                            
		                        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
									<?php get_template_part( 'templates/blog-details-sidebar.inc' ); ?> 
								<?php endwhile; else: ?>
									<p class="entry"><?php esc_html_e( 'No posts were found.', 'nora' ); ?></p> 
								<?php endif; ?>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-lg-pull-9 col-md-4 col-md-pull-8 col-sm-12">
						<?php if ( $is_sidebar ) { ?>

								<?php get_sidebar(); ?>

						<?php } ?>
					</div>
					<?php if ( $max_pages > 1 ) { ?>

						<div class="col-md-6 col-sm-6 col-xs-6 prev-pag float-left <?php echo esc_attr($have_olders_posts); ?>">
							<a href="<?php echo esc_url( get_permalink(get_adjacent_post(false,'',true)) ); ?>">
								<?php echo get_next_posts_link('<i class="fa fa-angle-left"></i> Older posts'); ?>						
							</a>
						</div>

						<div class="col-md-6 col-sm-6 col-xs-6 next-pag float-right text-right <?php echo esc_attr($have_newer_posts); ?>">
							<a href="<?php echo esc_url( get_permalink(get_adjacent_post(false,'',false)) ); ?>">
								<?php echo get_previous_posts_link('Newer posts <i class="fa fa-angle-right"></i>'); ?>			
							</a>
						</div>

					<?php } ?>
                <?php } else { ?>
                    <div class="col-lg-9 col-md-8 col-sm-12">
                    	<div class="row">
                            <div class="blog-masonry"> 
		                        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
									<?php get_template_part( 'templates/blog-details-sidebar.inc' ); ?> 
								<?php endwhile; else: ?>
									<p class="entry"><?php esc_html_e( 'No posts were found.', 'nora' ); ?></p> 
								<?php endif; ?>
                            </div>
                        </div>
                	</div>
                	<div class="col-lg-3 col-md-4 col-sm-12">
						<?php if ( $is_sidebar ) { ?>

								<?php get_sidebar(); ?>

						<?php } ?>
                	</div>
                	<?php if ( $max_pages > 1 ) { ?>

						<div class="col-md-6 col-sm-6 col-xs-6 prev-pag float-left <?php echo esc_attr($have_olders_posts); ?>">
							<a href="<?php echo esc_url( get_permalink(get_adjacent_post(false,'',true)) ); ?>">
								<?php echo get_next_posts_link('<i class="fa fa-angle-left"></i> Older posts'); ?>						
							</a>
						</div>

						<div class="col-md-6 col-sm-6 col-xs-6 next-pag float-right text-right <?php echo esc_attr($have_newer_posts); ?>">
							<a href="<?php echo esc_url( get_permalink(get_adjacent_post(false,'',false)) ); ?>">
								<?php echo get_previous_posts_link('Newer posts <i class="fa fa-angle-right"></i>'); ?>			
							</a>
						</div>

					<?php } ?>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>