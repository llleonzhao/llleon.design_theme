<?php

	$project_cats_slug = implode(' ', nora_get_term('portfolio_category', 'slug'));
	$project_cats_name = implode(', ', nora_get_term('portfolio_category', 'name'));

	$thumbnail_data = nora_get_attachment_meta( get_post_thumbnail_id() );

    $thumbnail_id = get_post_thumbnail_id( get_the_ID() );
    $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);

	$is_portfolio_dim = get_post_meta(get_the_ID(), 'project_thumb_dimension', true);
	$portfolio_dim = is_array($is_portfolio_dim) ? $is_portfolio_dim : array();

	$project_class = 'portfolio-item' .' ';

	$project_url = get_post_meta(get_the_ID(), 'project_custom_url', true) != false ? esc_url( get_post_meta(get_the_ID(), 'project_custom_url', true) ) : esc_url( get_permalink() );

?>

<div id="post-<?php the_ID(); ?>" <?php post_class("$project_class $project_cats_slug"); ?>>
	<div class="portfolio-item-content">
        <a href="<?php echo esc_url( $project_url ); ?>">
        <div class="item-thumbnail">
            <img src="<?php echo esc_attr( $thumbnail_data['src'] ); ?>" alt="<?php echo esc_html($alt); ?>">
        </div>
        </a>
        <div class="portfolio-description">
            <h4><a href="<?php echo esc_url( $project_url ); ?>" ><?php the_title(); ?></a></h4>
            <ul class="portfolio-cat">
                <li><a href="#"><?php echo esc_html( $project_cats_name ); ?></a></li>
            </ul>
        </div>   
	</div>
</div>