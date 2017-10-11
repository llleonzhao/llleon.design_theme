<?php

    if ( post_password_required() ) 
		return;
?>

    <div class="theme-comment-section">

    <?php if ( have_comments() ) : ?>

	   <?php

        if ( ! empty($comments_by_type['comment']) ) :  ?>

        <h4 class="comment-title"><?php comments_number(esc_html__('0 Comments', 'nora'), esc_html__('1 Comment', 'nora'), esc_html__('% Comments', 'nora')); ?></h4>

        <ul class="media-list">
                <?php wp_list_comments( 'type=comment&callback=nora_comments' ); ?>
        </ul>

        <?php endif;  
        
        if ( ! empty($comments_by_type['pings']) ) : ?>
        
            <h4 class="comment-title"><?php esc_html_e('Trackbacks', 'nora') ?></h4>
        
            <ol class="media-list">
                <?php wp_list_comments( 'type=pings&callback=nora_list_pings' ); ?>
            </ol>

        <?php endif; 
		
		if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
    		<div class="comment-navigation">
    			<div class="nav-previous"><?php previous_comments_link( sprintf( '&larr; %s', esc_html__('Older Comments', 'nora') ) ); ?></div>
                <div class="nav-next"><?php next_comments_link( sprintf( '%s &rarr; ', esc_html__('Newer Comments', 'nora') ) ); ?></div>
    		</div>
		<?php endif; 

		elseif ( ! comments_open() && ! is_page() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
			
			<p class="nocomments"><?php esc_html_e('Comments are closed.', 'nora') ?></p>
			
	    <?php endif;  ?>

<div class="comment-form-wrapper">
<div class="row">
    <div class="col-md-12">
        <div class="comment-form ">
<?php


	if ( comments_open() ) : 
	
	    $fields = array(
	        'title_reply' => '<h4  class="comment-title">Leave a reply</h4>',
            'comment_notes_before' => '',
            'class_submit' => 'btn-submitt btn-medium',
            
            'label_submit' => esc_html__('Submit', 'nora')	    
        );
		    	
	    comment_form($fields); 
?>
        </div>
    </div>
</div>
</div>

   	 </div>

    <?php endif; 
