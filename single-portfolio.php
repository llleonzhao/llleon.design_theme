<?php get_header(); ?>

<?php

    $portfolio_type = isset($_GET['portfolio_type']) ? $_GET['portfolio_type'] : get_post_meta(get_the_ID(), 'portfolio_type', true);
	$menu_layout = isset($_GET['menu']) ? $_GET['menu'] : get_theme_mod('nora_menu_layout', 'classic');

    $project_client = get_post_meta(get_the_ID(), 'project_client', true); 
    $project_date = get_post_meta(get_the_ID(), 'project_date', true); 
    $project_category = get_post_meta(get_the_ID(), 'project_category', true); 
    $portfolio_type = get_post_meta(get_the_ID(), 'portfolio_type', true); 

    $share_enable = get_post_meta(get_the_ID(), 'share_enable', true);
    $project_share = is_array($share_enable) && in_array('is_share', $share_enable) ? true : false;

	$have_olders_posts = get_adjacent_post(false,'',true) ? '' : 'no-more-posts';
	$have_newer_posts = get_adjacent_post(false,'',false) ? '' : 'no-more-posts';

	if ($have_olders_posts != "no-more-posts") {
		$prev_post = get_adjacent_post( false, '', true);
		$prev_title = get_the_title( $prev_post->ID );
	}

	if ($have_newer_posts != "no-more-posts") {
		$next_post = get_adjacent_post( false, '', false);
		$next_title = get_the_title( $next_post->ID );
	}
?>
<div class="content">
    <div class="single-project-area">
        <div class="container">
            <div class="row">
            	<?php if ($portfolio_type == 'standard') { ?>
            		<div class="col-md-12 pb-50">
                    <div class="project-meta-wrapper">
                        <ul class="single-portfolio-meta">
							<?php if($project_client) { ?>
                                <li><span><?php esc_html_e( 'Client', 'nora' ); ?>:</span><?php echo esc_attr( $project_client ); ?></li>
                            <?php } ?>
                            <?php if($project_date) { ?>
                            	<li><span><?php esc_html_e( 'Date', 'nora' ); ?>:</span><?php echo esc_attr( $project_date ); ?></li>
                            <?php } ?>
                            <?php if($project_category) { ?>
                            	<li><span><?php esc_html_e( 'Category', 'nora' ); ?>:</span><?php echo esc_attr( $project_category ); ?></li>
                            <?php } ?>
                        </ul>
						<?php if($project_share) { ?>
                            <div class="post-share">
                                <ul>
                                    <li><?php esc_html_e( 'Share', 'nora' ); ?>: </li>
                                    <li><a href="<?php echo esc_url('http://facebook.com/sharer/sharer.php?u='. get_permalink()); ?>"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="<?php echo esc_url('https://twitter.com/home?status='. get_permalink()); ?>"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="<?php echo esc_url('http://pinterest.com/pin/create/button/?url='. get_permalink()); ?>"><i class="fa fa-pinterest"></i></a></li>
                                </ul>
                            </div>    
                        <?php } ?>
                    </div> 
                    </div>
	                <div class="col-lg-12 col-md-12">
		                <?php while ( have_posts() ) : the_post(); ?>
	
							<?php the_content(); ?>
	
						<?php endwhile; ?>	
	
			            <div class="post-navigation-wrapper">
		                    <a href="<?php echo esc_url( get_permalink(get_adjacent_post(false,'',true)) ); ?>" class="post-navigation previous-post <?php echo esc_attr($have_olders_posts); ?>"><i class="fa fa-angle-left"></i><?php esc_html_e( 'Previous Project', 'nora' ); ?></a>
		                    <a href="<?php echo esc_url( get_permalink(get_adjacent_post(false,'',false)) ); ?>" class="post-navigation next-post <?php echo esc_attr($have_newer_posts); ?>"><?php esc_html_e( 'Next Project', 'nora' ); ?><i class="fa fa-angle-right"></i></a>
		                </div>   
	                </div>
                <?php } elseif ($portfolio_type == 'right') { ?>
	                <div class="col-md-9">
		                <?php while ( have_posts() ) : the_post(); ?>
	
							<?php the_content(); ?>
	
						<?php endwhile; ?>	
	
	                </div>    
                    <div class="col-md-3">
                        <div class="project-meta-wrapper">
                            <ul class="single-portfolio-meta">
								<?php if($project_client) { ?>
	                                <li><span><?php esc_html_e( 'Client', 'nora' ); ?>:</span><?php echo esc_attr( $project_client ); ?></li>
	                            <?php } ?>
	                            <?php if($project_date) { ?>
                                	<li><span><?php esc_html_e( 'Date', 'nora' ); ?>:</span><?php echo esc_attr( $project_date ); ?></li>
                                <?php } ?>
                                <?php if($project_category) { ?>
                                	<li><span><?php esc_html_e( 'Category', 'nora' ); ?>:</span><?php echo esc_attr( $project_category ); ?></li>
                                <?php } ?>
                            </ul>
							<?php if($project_share) { ?>
	                            <div class="post-share">
	                                <ul>
	                                    <li><?php esc_html_e( 'Share', 'nora' ); ?>: </li>
	                                    <li><a href="<?php echo esc_url('http://facebook.com/sharer/sharer.php?u='. get_permalink()); ?>"><i class="fa fa-facebook"></i></a></li>
	                                    <li><a href="<?php echo esc_url('https://twitter.com/home?status='. get_permalink()); ?>"><i class="fa fa-twitter"></i></a></li>
	                                    <li><a href="<?php echo esc_url('http://pinterest.com/pin/create/button/?url='. get_permalink()); ?>"><i class="fa fa-pinterest"></i></a></li>
	                                </ul>
	                            </div>    
	                        <?php } ?>
                        </div>                            
                    </div>  
                    <div class="col-md-12">
	             		<div class="post-navigation-wrapper">
		                    <a href="<?php echo esc_url( get_permalink(get_adjacent_post(false,'',true)) ); ?>" class="post-navigation previous-post <?php echo esc_attr($have_olders_posts); ?>"><i class="fa fa-angle-left"></i><?php esc_html_e( 'Previous Project', 'nora' ); ?></a>
		                    <a href="<?php echo esc_url( get_permalink(get_adjacent_post(false,'',false)) ); ?>" class="post-navigation next-post <?php echo esc_attr($have_newer_posts); ?>"><?php esc_html_e( 'Next Project', 'nora' ); ?><i class="fa fa-angle-right"></i></a>
		                </div>  
	                </div>
                <?php } else { ?>
                    <div class="col-md-3">
                        <div class="project-meta-wrapper">
                            <ul class="single-portfolio-meta">
								<?php if($project_client) { ?>
	                                <li><span><?php esc_html_e( 'Client', 'nora' ); ?>:</span><?php echo esc_attr( $project_client ); ?></li>
	                            <?php } ?>
	                            <?php if($project_date) { ?>
                                	<li><span><?php esc_html_e( 'Date', 'nora' ); ?>:</span><?php echo esc_attr( $project_date ); ?></li>
                                <?php } ?>
                                <?php if($project_category) { ?>
                                	<li><span><?php esc_html_e( 'Category', 'nora' ); ?>:</span><?php echo esc_attr( $project_category ); ?></li>
                                <?php } ?>
                            </ul>
							<?php if($project_share) { ?>
	                            <div class="post-share">
	                                <ul>
	                                    <li><?php esc_html_e( 'Share', 'nora' ); ?>: </li>
	                                    <li><a href="<?php echo esc_url('http://facebook.com/sharer/sharer.php?u='. get_permalink()); ?>"><i class="fa fa-facebook"></i></a></li>
	                                    <li><a href="<?php echo esc_url('https://twitter.com/home?status='. get_permalink()); ?>"><i class="fa fa-twitter"></i></a></li>
	                                    <li><a href="<?php echo esc_url('http://pinterest.com/pin/create/button/?url='. get_permalink()); ?>"><i class="fa fa-pinterest"></i></a></li>
	                                </ul>
	                            </div>    
	                        <?php } ?>
                        </div>                            
                    </div> 
	                <div class="col-md-9">
		                <?php while ( have_posts() ) : the_post(); ?>
	
							<?php the_content(); ?>
	
						<?php endwhile; ?>	
	
			            <div class="post-navigation-wrapper">
		                    <a href="<?php echo esc_url( get_permalink(get_adjacent_post(false,'',true)) ); ?>" class="post-navigation previous-post <?php echo esc_attr($have_olders_posts); ?>"><i class="fa fa-angle-left"></i><?php esc_html_e( 'Previous Project', 'nora' ); ?></a>
		                    <a href="<?php echo esc_url( get_permalink(get_adjacent_post(false,'',false)) ); ?>" class="post-navigation next-post <?php echo esc_attr($have_newer_posts); ?>"><?php esc_html_e( 'Next Project', 'nora' ); ?><i class="fa fa-angle-right"></i></a>
		                </div>   
	                </div>    
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
