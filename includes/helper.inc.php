<?php

	class Nora_Portfolio_Filter extends Walker_Category {
		
	   function start_el(&$output, $category, $depth = 0, $args = array(), $current_object_id = 0) {

	      extract($args);
	      $cat_slug = esc_attr( $category->slug );
	      $cat_slug = apply_filters( 'list_cats', $cat_slug, $category );
		  
	      $link = '<li><a href="#" data-filter=".'.strtolower(preg_replace('/\s+/', '-', $cat_slug)).'">';
		  
	      $cat_name = esc_attr( $category->name );
	      $cat_name = apply_filters( 'list_cats', $cat_name, $category );
		  	
	      $link .= $cat_name;
		  
	      if(!empty($category->description)) {
	         $link .= ' <span>'.$category->description.'</span>';
	      }
		  
	      $link .= '</a></li>';
	     
	      $output .= $link;
	       
	   }
	}

	class Nora_Walker_Main extends Walker_Nav_Menu {

	    function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {
	        $id_field = $this->db_fields['id'];

	        if ( is_object( $args[0] ) ) {
	            $args[0]->has_children = !empty( $children_elements[$element->$id_field] );
	        }

	        return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
	    }

	    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

			$item_output = '';
			if ($depth === 0 && $args->has_children) {
				$item_output .= '<li><a href="'. esc_attr( $item->url) .'">';
	            $item_output .= apply_filters( 'the_title', $item->title, $item->ID );
	            $item_output .= '<span class="menuspa"><i class="fa fa-angle-down"></i></span></a>';   
			}
			else {
				$item_output .= '<li><a href="'. esc_attr( $item->url) .'">';
	            $item_output .= apply_filters( 'the_title', $item->title, $item->ID );
	            $item_output .= '</a>';  				
			}
            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );   	    }	

	}

	if ( !function_exists('nora_get_term') ) {

		function nora_get_term($taxonomy, $field) {

			global $post;

			$taxonomy_terms = get_the_terms($post->ID, $taxonomy);

			if ( !empty($taxonomy_terms) ) {
				foreach ( $taxonomy_terms as $term ) {
				  $term_field[] = $term->$field;
				}
			}

			return $term_field;

		}

	}

	if ( !function_exists('nora_gallery_setup') ) {

		function nora_gallery_setup( $output = '', $atts, $instance ) {
			$return = $output; 

			if ( !empty($atts['ids']) ) { 

				$atts['columns'] = !empty($atts['columns']) ? $atts['columns'] : 3;
				$col = $atts['columns'];

				$gallery_ids = explode(',', $atts['ids']);

				$return = '<div class="portfolio portfolio-gutter portfolio-container portfolio-masonry portfolio-column-count-'. $atts['columns'] .'">';

				foreach( $gallery_ids as $image_id ) {

					$attachment_meta = nora_get_attachment_meta($image_id);

					$return .= '<div class="portfolio-item '. $attachment_meta['alt'] .'">';
					$return .= '<a href="'. esc_url( $attachment_meta['src'] ) .'" title="'. esc_attr( $attachment_meta['title'] ) .'" rel="lightbox">';
					$return .= '<img src="'. esc_url( $attachment_meta['src'] ) .'">';
					$return .= '</a>';
					$return .= '</div>';

				}

				$return .= '</div>';

			}

			return $return;
		}

	}

	add_filter( 'post_gallery', 'nora_gallery_setup', 10, 3 );


	if ( !function_exists('nora_post_class') ) {

		function nora_post_class( $classes ) {

			if ( get_post_type() == 'portfolio' ) {
				$classes[] = 'item portfolio ';
			} else {
				$classes[] = 'item clearfix';
			}

			return $classes;
		}

	}

	add_filter( 'post_class', 'nora_post_class' );

	if ( !function_exists('nora_search_filter') ) {

		function nora_search_filter($query) {

		    if ($query->is_search) {
		        $query->set('post_type', 'post');
		    }
		    return $query;

		}

	}
	
	add_filter('pre_get_posts','nora_search_filter');

	if ( !function_exists('nora_get_attachment_meta') ) {

		function nora_get_attachment_meta( $attachment_id ) {

			$attachment = get_post( $attachment_id );
			return array(
				'alt' => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
				'caption' => $attachment->post_excerpt,
				'description' => $attachment->post_content,
				'href' => esc_url( get_permalink( $attachment->ID ) ),
				'src' => $attachment->guid,
				'title' => $attachment->post_title
			);
		}

	}
	
	function nora_modify_read_more_link() {
	    return '<div class="blog-post-footer"><a class="more-link" href="' . get_permalink() . '">Read More</a></div>';
	}
	add_filter( 'the_content_more_link', 'nora_modify_read_more_link' );

	if ( !function_exists('nora_comments') ) {

		function nora_comments($comment, $args, $depth) {
		
	        $isByAuthor = false;

	        if($comment->comment_author_email == get_the_author_meta('email')) {
	            $isByAuthor = true;
	        }

	        $GLOBALS['comment'] = $comment; ?>
	        <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>" class="media">

					<div class="media-left">
						<?php echo wp_kses_post( get_avatar(get_the_author_meta('ID'), $size = '60') ); ?>
					</div>

					<div class="media-body">
						<h5  class="c-title"><?php echo wp_kses_post( get_comment_author_link() ); ?></h5>
						<p><span><?php echo human_time_diff( get_comment_time('U'), current_time('timestamp') ) .' '. esc_html__(' ago', 'nora'); ?></span></p>
						<p><?php comment_text() ?></p>
						<?php comment_reply_link(array_merge( $args, array('reply_text' => 'Reply', 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
					</div>

		<?php
		}
	}

	if ( !function_exists('nora_list_pings') ) {

		function nora_list_pings($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment;
		?>
		<li id="comment-<?php comment_ID(); ?>" class="media pingback"><?php comment_author_link(); ?>
		<?php } 

	}

	function nora_comment_uri($fields) {
		if(isset($fields['url']))
		unset($fields['url']);
		return $fields;
	}
	
	add_filter('comment_form_default_fields', 'nora_comment_uri');

	function nora_move_comment_field( $fields ) {
	    $comment_field = $fields['comment'];
	    unset( $fields['comment'] );
	    $fields['comment'] = $comment_field;
	    return $fields;
	}
	
	add_filter( 'comment_form_fields', 'nora_move_comment_field' );

	if ( !function_exists('nora_avatar') ) {

		function nora_avatar($avatar_defaults){

			$new_default_icon = get_template_directory_uri() . '/images/avatar.png';
			$avatar_defaults[$new_default_icon] = esc_html__('Custom Avatar', 'nora');
			return $avatar_defaults;

		}
	}

	add_filter('avatar_defaults','nora_avatar');

	function wp_search_filter($query) {
		$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
	    if ( (strpos($url,'post_type=product') !== false) && is_search() ) {
            $query->set('post_type', 'product');
        }
	    return $query;
	}

	add_filter('pre_get_posts','wp_search_filter');

	remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
?>