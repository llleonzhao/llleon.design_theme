<?php get_header(); ?>

<?php 

    $post_style = isset($_GET['post_style']) ? $_GET['post_style'] : get_post_meta(get_the_ID(), 'post_style_options', true);
	$is_sidebar = ($post_style == 'left' || $post_style == 'right') ? true : false;

    if ($post_style == "")
        $post_style = 'classic';

    $category = get_the_category(); 
    
?>

<div class="content">
    <div class="nora-standard-row ptb-80">
        <div class="container">                    
            <div class="row">     
            
            <?php if ($post_style == 'classic') { ?>
                <div class="col-md-12">

					<?php while ( have_posts() ) : the_post(); ?>

                        <article class="single-post single-blog-post-area">
                            <?php if (has_post_thumbnail()) { ?>
                                <div class="single-thumbnail">
                                    <img src="<?php the_post_thumbnail_url(); ?>" alt="">
                                </div>
                            <?php } ?>

                        	<div class="post-content">
                                
                                <div class="post-meta">
                                    <span class="post-time"><i class="icon-clock"></i> <?php echo get_the_date(); ?></span>
                                    <span class="post-comment"><a href="<?php echo get_category_link( $category[0]->term_id ); ?>"><?php echo esc_attr( $category[0]->cat_name ); ?></a></span>
                                </div> 

								<?php the_content(); ?>

                                <div class="post-pages"><?php wp_link_pages(); ?></div>

							</div>

							 <?php if ( has_tag() ) { ?>
								<div class="tags">
									<?php the_tags('',' '); ?>
								</div>        
					        <?php } ?>

						</article>

				    <?php endwhile; ?>

					<?php if ( comments_open() ) { ?>

						<?php comments_template( '', true ); ?>

					<?php } ?>

                </div>
                
                <?php } elseif ($post_style == 'left') { ?>
                    <div class="col-lg-9 col-lg-push-3 col-md-8 col-md-push-4">
                    
					<?php while ( have_posts() ) : the_post(); ?>

                        <article class="single-post single-blog-post-area">
                            <?php if (has_post_thumbnail()) { ?>
                            
                                <img src="<?php the_post_thumbnail_url(); ?>" alt="">
                            
                            <?php } ?>
                            
                        	<div class="post-content">
                                
                                <div class="post-meta">
                                    <span class="post-time"><i class="icon-clock"></i> <?php echo get_the_date(); ?></span>
                                    <span class="post-comment"><a href="<?php echo get_category_link( $category[0]->term_id ); ?>"><?php echo esc_attr( $category[0]->cat_name ); ?></a></span>
                                </div> 

								<?php the_content(); ?>

							</div>

							 <?php if ( has_tag() ) { ?>
								<div class="tags">
									<?php the_tags('',' '); ?>
								</div>        
					        <?php } ?>

			        		<div class="post-pages"><?php wp_link_pages(); ?></div>
                        </article>
                        
    				    <?php endwhile; ?>
    
    					<?php if ( comments_open() ) { ?>
    
    						<?php comments_template( '', true ); ?>
    
    					<?php } ?>
                    </div>
                    <div class="col-lg-3 col-lg-pull-9 col-md-4 col-md-pull-8">
						<?php if ( $is_sidebar ) { ?>

							<?php get_sidebar(); ?>

						<?php } ?>
                    </div>
                <?php } else { ?>
                
                    <div class="col-lg-9 col-md-8">
                        
					<?php while ( have_posts() ) : the_post(); ?>

                        <article class="single-post single-blog-post-area">
                            <?php if (has_post_thumbnail()) { ?>
                            
                                <img src="<?php the_post_thumbnail_url(); ?>" alt="">
                            
                            <?php } ?>
                            
                        	<div class="post-content">
                                
                                <div class="post-meta">
                                    <span class="post-time"><i class="icon-clock"></i> <?php echo get_the_date(); ?></span>
                                    <span class="post-comment"><a href="<?php echo get_category_link( $category[0]->term_id ); ?>"><?php echo esc_attr( $category[0]->cat_name ); ?></a></span>
                                </div> 

								<?php the_content(); ?>

							</div>

							 <?php if ( has_tag() ) { ?>
								<div class="tags">
									<?php the_tags('',' '); ?>
								</div>        
					        <?php } ?>

			        		<div class="post-pages"><?php wp_link_pages(); ?></div>
                        </article>
                        
    				    <?php endwhile; ?>
    
    					<?php if ( comments_open() ) { ?>
    
    						<?php comments_template( '', true ); ?>
    
    					<?php } ?>
                    </div> 
                    <div class="col-lg-3 col-md-4">
						<?php if ( $is_sidebar ) { ?>

							<?php get_sidebar(); ?>

						<?php } ?>
                    </div>

                <?php } ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>