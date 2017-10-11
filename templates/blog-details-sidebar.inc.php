<?php

	$category = get_the_category();

    $thumbnail_id = get_post_thumbnail_id( get_the_ID() );
    $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);

?>

<div <?php post_class('col-md-12 col-sm-12 post-grid-item'); ?> id="post-<?php the_ID(); ?>">
    <article class="blog-post">
        <?php if (has_post_thumbnail()) { ?>
            <div class="post-thumbnail">
    			<a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title(); ?>">
    				<img src="<?php the_post_thumbnail_url(); ?>" alt="<?php echo esc_html($alt); ?>" />
    			</a>        
    		</div>
        <?php } ?>
        <div class="post-content">
            <div class="post-content-inner">
                <h3 class="custom_head"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a></h3>
                <ul class="meta-info">
                    <li><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo get_the_date(); ?></a></li>
                </ul>
				<?php the_content( esc_html__( 'Read More', 'nora' ) ); ?>
            </div>                                     
        </div>
    </article>
</div>