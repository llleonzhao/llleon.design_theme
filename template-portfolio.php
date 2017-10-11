<?php 
/*
Template Name: Portfolio
*/
?>

<?php get_header(); ?>

<?php

    $portfolio_style = isset($_GET['portfolio_style']) ? $_GET['portfolio_style'] : get_post_meta(get_the_ID(), 'portfolio_style_options', true);

    $filter_options = get_post_meta(get_the_ID(), 'filter_option', true);
    $is_filtration = is_array($filter_options) && in_array('is_filtration', $filter_options) ? true : false;

	$columns = isset($_GET['columns']) ? $_GET['columns'] : get_post_meta(get_the_ID(), 'portfolio_columns', true);
	$taxonomy = 'portfolio_category';
	$taxonomy_term_ID = get_post_meta(get_the_ID(), $taxonomy, true);

	$taxonomy_terms = get_terms( $taxonomy, array(
	    'child_of' 	 => $taxonomy_term_ID,
	    'hide_empty' => 0,
	    'fields' 	 => 'ids',
	) );

	array_push($taxonomy_terms, $taxonomy_term_ID); 

	$portfolio_args = array(
		'post_type' => 'portfolio',
		'tax_query' => array(
			array(
	            'taxonomy' => $taxonomy,
	            'field' => 'id',
	            'terms' => $taxonomy_terms
			),
		),
		'posts_per_page'      => -1
	);

	$portfolio_query = new WP_Query($portfolio_args);

?>

<div class="content">

	<div class="nora-standard-row ptb-80">
		<?php if ($portfolio_style == 'fullwidth' || $portfolio_style == 'fullwidth_alt' || $portfolio_style == 'fullwidth_boxed') { ?>
	    	<div class="portfolio-fullwidth">
	    <?php } else { ?>
	    	<div class="container">
	    <?php } ?>
         
	        <div class="portfolio-content">

				<?php if ($is_filtration) { ?>
	        		<div class="portfolio-filter-wrap" >
	                   <ul class="portfolio-filter hover-style-one">
	                        <li class="active"><a href="#" data-filter="*"> <?php esc_html_e('All', 'nora'); ?></a></li>
							<?php wp_list_categories(array('child_of' => $taxonomy_term_ID, 'title_li' => '', 'style' => 'none', 'taxonomy' => $taxonomy, 'show_option_none'   => '', 'walker' => new Nora_Portfolio_Filter())); ?>
	                   </ul>
	        		</div>
				<?php } ?>
			<?php if ($portfolio_style == 'classic' || $portfolio_style == 'fullwidth') { ?>
			
	        	<div class="portfolio portfolio-gutter portfolio-container portfolio-masonry portfolio-column-count-<?php echo esc_attr($columns);?>">
					<?php if ( $portfolio_query->have_posts() ) : while ( $portfolio_query->have_posts() ) : $portfolio_query->the_post(); ?>

						<?php get_template_part( 'templates/portfolio-details.inc' ); ?> 

					<?php endwhile; else: ?>

						<p class="entry"><?php esc_html_e('You have not created any portfolio items', 'nora'); ?></p> 
					<?php endif; ?>
	        	</div>
	        	
			<?php } elseif ($portfolio_style == 'alt' || $portfolio_style == 'fullwidth_alt') { ?>
				<div class="portfolio portfolio-gutter portfolio-style-four portfolio-container portfolio-masonry portfolio-column-count-<?php echo esc_attr($columns);?>">
					<?php if ( $portfolio_query->have_posts() ) : while ( $portfolio_query->have_posts() ) : $portfolio_query->the_post(); ?>

						<?php get_template_part( 'templates/portfolio-details.inc' ); ?> 

					<?php endwhile; else: ?>

						<p class="entry"><?php esc_html_e('You have not created any portfolio items', 'nora'); ?></p> 
					<?php endif; ?>					
				</div>
			<?php } else { ?>
				<div class="portfolio portfolio-container portfolio-style-three portfolio-masonry portfolio-column-count-<?php echo esc_attr($columns);?>">
					<?php if ( $portfolio_query->have_posts() ) : while ( $portfolio_query->have_posts() ) : $portfolio_query->the_post(); ?>

						<?php get_template_part( 'templates/portfolio-details.inc' ); ?> 

					<?php endwhile; else: ?>

						<p class="entry"><?php esc_html_e('You have not created any portfolio items', 'nora'); ?></p> 
					<?php endif; ?>					
				</div>			
			<?php } ?>
	        </div>
	    </div>
		<?php if ($menu_layout == 'left') { ?>
		</div>
		<?php } ?>
	</div>
</div>
<?php get_footer(); ?>