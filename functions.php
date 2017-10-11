<?php

 	
#-----------------------------------------------------------------#
#  Nora Constants
#-----------------------------------------------------------------#

	define('NORA_ADMIN', get_template_directory() .'/admin');
	define('NORA_ADMIN_URI', get_template_directory_uri() .'/admin');
	define('NORA_JS', get_template_directory() .'/js');
	define('NORA_JS_URI', get_template_directory_uri() .'/js');
	define('NORA_CSS', get_template_directory() .'/css');
	define('NORA_CSS_URI', get_template_directory_uri() .'/css');
	define('NORA_INCLUDE', get_template_directory() .'/includes');
	define('NORA_INCLUDE_URI', get_template_directory_uri() .'/includes');

#-----------------------------------------------------------------#
# Nora Setup
#-----------------------------------------------------------------#

	function nora_theme_setup() {

		global $content_width;

		if ( !isset($content_width) ) {
			$content_width = 960;
		}

		load_theme_textdomain( 'nora', get_template_directory() . '/lang' );

		add_theme_support('automatic-feed-links');

		add_theme_support( 'title-tag' );

		add_theme_support( 'post-thumbnails' );

		add_theme_support( 'wc-product-gallery-lightbox' );
		
	    add_action('init', 'nora_register_menu');
	    add_action('widgets_init', 'nora_register_sidebar');

	    add_action('wp_enqueue_scripts', 'nora_load_js');

	    add_action('wp_enqueue_scripts', 'nora_load_css');
		add_action( 'wp_enqueue_scripts', 'nora_highlight', 20 );
		add_action('wp_enqueue_scripts', 'nora_child_css', 20);

	}

	add_action('after_setup_theme', 'nora_theme_setup');

	add_action( 'after_setup_theme', 'woocommerce_support' );
	function woocommerce_support() {
	    add_theme_support( 'woocommerce' );
	}

#-----------------------------------------------------------------#
# Nora Menu
#-----------------------------------------------------------------#

	function nora_register_menu() {
		register_nav_menu('nora-main-nav', esc_html__('Primary Navigation', 'nora'));
	}

#-----------------------------------------------------------------#
# Nora Sidebar
#-----------------------------------------------------------------#

	function nora_register_sidebar() {

		register_sidebar( array(
			'name' => esc_html__( 'Primary Sidebar', 'nora' ),
			'id' => 'primary-sidebar',
			'before_widget' => '<aside id="%1$s" class="single-widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h4 class="widget-title">',
			'after_title' => '</h4>',
		) );

		register_sidebar( array(
			'name' => esc_html__( 'Shop Sidebar', 'nora' ),
			'id' => 'shop-sidebar',
			'before_widget' => '<aside id="%1$s" class="single-widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h4 class="widget-title">',
			'after_title' => '</h4>',
		) );

	}

#-----------------------------------------------------------------#
# Nora JS
#-----------------------------------------------------------------#

	function nora_load_js() {
		if ( !is_admin() ) {

			wp_enqueue_script('bootstrap', NORA_JS_URI . '/bootstrap.min.js', array('jquery'), null, true);
			wp_enqueue_script('isotope', NORA_JS_URI . '/jquery.isotope.js', array('jquery'), null, true);
			wp_enqueue_script('meanmenu', NORA_JS_URI . '/meanmenu.js', array('jquery'), null, true);
			wp_enqueue_script('treeview', NORA_JS_URI . '/treeview.js', array('jquery'), null, true);
			wp_enqueue_script('imagesloaded');  
			wp_enqueue_script('wow', NORA_JS_URI . '/wow.js', array('jquery'), null, true);
			wp_enqueue_script('nora-main', NORA_JS_URI . '/main.js', array('jquery'), null, true);

			if ( is_singular() ) {
				wp_enqueue_script( 'comment-reply' );
			}			

		}
	}

#-----------------------------------------------------------------#
# Nora CSS
#-----------------------------------------------------------------#

	function nora_load_css() {
		if ( !is_admin() ) {

			wp_enqueue_style('nora-css', get_template_directory_uri() . '/style.css');
			wp_enqueue_style('bootstrap', NORA_CSS_URI . '/bootstrap.min.css', array('nora-css'));
			wp_enqueue_style('nora-animate', NORA_CSS_URI . '/animate.css', array('nora-css'));
			wp_enqueue_style('nora-elements', NORA_CSS_URI . '/elements.css', array('nora-css'));
			wp_enqueue_style('nora-main', NORA_CSS_URI . '/main.css', array('nora-css'));
			wp_enqueue_style('nora-responsive', NORA_CSS_URI . '/responsive.css', array('nora-css'));
			wp_enqueue_style('font-awesome', NORA_CSS_URI . '/font-awesome.min.css', array('nora-css'));
			wp_enqueue_style('nora-google-fonts', nora_fonts(),  array(), '1.0.0');

			wp_add_inline_style('nora-css', get_theme_mod('nora_custom_css'));

		}
	}


	function nora_child_css() {
		if ( !is_admin() && is_child_theme() ) {

		    wp_enqueue_style( 'nora-child-style', get_stylesheet_directory_uri().'/style.css');

		}
	}

#-----------------------------------------------------------------#
# Accent Color
#-----------------------------------------------------------------#

	function nora_highlight() {
		
		$optColor = get_theme_mod('nora_color', 'white');
		if ( isset ($optColor) && ($optColor != 'white') ) {
			$accent = "body, .header-middle-area, .footer-area, .post-content, .media-list li, .comment-form form, .main-menu li ul, .main-menu li ul li ul, .single-widget, .price_label {background-color: #000 !important;}" . "\n";
			$accent .= "p, .logo h3, .main-menu li a, .page-cat, .breadcrumb-content p, .copy-right p, .to-top-btn, .post-content p, h3.custom_head, .read-more, .meta-info a, .post-meta, .post-meta a, .comment-title, .comment-form p, .comment-form label, .comment-form a, .c-title a, .theme-comment-section .media-body > p span, .media-body p, .mean-container a.meanmenu-reveal, .single-widget .widget-title, .single-widget > ul li a, .recentcomments, .search-widget button, .social-bookmark-wrapper a, .woocommerce .widget_price_filter .price_slider_amount, .woocommerce .woocommerce-ordering select, .woocommerce div.product .product_title, .product_meta, .woocommerce div.product .woocommerce-tabs ul.tabs li a, .woocommerce-Tabs-panel h2, .comment-reply-title, .woocommerce-review__author, .woocommerce .quantity .qty {color: #fff !important}" . "\n";
			$accent .= ".portfolio-filter > li a {color: #a6a6a6 !important}" . "\n";
			$accent .= ".portfolio-filter > li.active a, .portfolio-filter > li a:hover, .portfolio-description h4 a, .portfolio-cat a, .post-navigation, .contact-style-two h4, .contact-style-two p, .contact-style-two label, .comment-reply-link, #cancel-comment-reply-link, .post-content li, .media-list li, .post-content > h4, .single-portfolio-meta > li, .single-portfolio-meta li span, .post-share li a, .post-share, .product-content h2.woocommerce-loop-product__title, .woocommerce .products-grid .woocommerce-Price-amount, .woocommerce div.product p.price del, .woocommerce div.product span.price del, .woocommerce-Price-amount, .star-rating, .related.products h2:first-child, .woocommerce #review_form #respond textarea, textarea#comment {color: #fff !important}" . "\n";
			$accent .= ".item-thumbnail::before { background: rgba(0, 0, 0, 0.6) none repeat scroll 0 0 !important}" . "\n";
			$accent .= ".wpcf7-text, .wpcf7-textarea, .clear-fix textarea {background-color: #000 !important; border: 1px solid #fff !important}" . "\n";
			$accent .= ".hamburger--slider .hamburger-inner::before, .hamburger--slider .hamburger-inner::after {border: 1px solid #fff !important; left: -1px !important}" . "\n";
			$accent .= ".hamburger--slider .hamburger-inner {border: 1px solid #fff}" . "\n";
			$accent .= ".woocommerce .widget_price_filter .ui-slider-range, .woocommerce .widget_price_filter .ui-slider .ui-slider-handle, .woocommerce div.product form.cart .button, .woocommerce span.onsale, .woocommerce .products-grid .product span.onsale {background-color: #fff !important}" . "\n";
			$accent .= ".woocommerce div.product form.cart .button,  .woocommerce span.onsale  {color: #000 !important}" . "\n";
			$accent .= ".woocommerce div.product .woocommerce-tabs .panel, .woocommerce div.product .woocommerce-tabs ul.tabs li, .woocommerce #review_form #respond .form-submit input, .woocommerce #review_form #respond textarea, .woocommerce .quantity .qty, textarea#comment {background: #000 !important}" . "\n";
			$accent .= ".portfolio-style-four .portfolio-description {background: #000 none repeat scroll 0 0}" . "\n";
			$accent .= ".mean-container a.meanmenu-reveal span {background: #fff none repeat scroll 0 0}" . "\n";
			$accent .= ".wpcf7-submit, .more-link, .comment-form input[type='submit'], pre {background-color: #000 !important; border: 1px solid #fff !important; color: #fff !important}";
		} else { $accent = ''; }

		if ( $accent == '' )
			return;
		wp_add_inline_style( 'nora-main', $accent );
	}

#-----------------------------------------------------------------#
# Google Fonts
#-----------------------------------------------------------------#

	function nora_fonts() {
	    $font_url = '';

	    if ( 'off' !== _x( 'on', 'Google font: on or off', 'nora' ) ) {
	        $font_url = add_query_arg( 'family', urlencode( 'Raleway:400,300,700' ), "//fonts.googleapis.com/css" );
	    }
	    return $font_url;
	}

#-----------------------------------------------------------------#
# Nora Header Layout
#-----------------------------------------------------------------#

	function nora_header_layout($layout) {
		
		$header_class = '';
		$nav_class = '';

		if ($layout == 'classic') {
		    $nav_class = '';
		    $header_class = 'header-area header-style-one container-header';
		}
		elseif ($layout == 'minimal') {
		    $nav_class = 'menu-style-two';
		    $header_class = 'header-area header-style-two';
		}
		elseif ($layout == 'central') {
		    $nav_class = 'menu-style-three';
		    $header_class = 'header-area header-style-three';
		}
		else {
		    $nav_class = '';
		}
		
		return array($nav_class, $header_class);
	}

	
#-----------------------------------------------------------------#
# Nora Get Max Pages
#-----------------------------------------------------------------#

	function nora_get_max_pages() {
		global $wp_query;
		$page_number = $wp_query->max_num_pages;
		return $page_number;
	}

#-----------------------------------------------------------------#
# Resources
#-----------------------------------------------------------------#

	require_once NORA_ADMIN . '/customizer/functions.php';
	require_once NORA_ADMIN . '/tgm/functions.php';
	require_once NORA_ADMIN . '/acf/functions.php';

	require_once NORA_INCLUDE . '/helper.inc.php';