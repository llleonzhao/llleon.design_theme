<?php

	$menu_layout = isset($_GET['menu']) ? $_GET['menu'] : get_theme_mod('nora_menu_layout', 'classic');

    if( is_home() || is_search() || is_archive() ) {
        $post_ID = get_option('page_for_posts');
    } else {
        $post_ID = get_the_ID();
    }

    $hero_enable = isset($_GET['hero']) ? $_GET['hero'] : get_post_meta($post_ID, 'hero_additional_options', true);

    $hero_title = get_field('hero_title'); 
    $hero_subtitle = get_post_meta($post_ID, 'hero_subtitle', true); 

    if( is_search() ) {
        $hero_title = esc_html__( 'Search Results', 'nora' );
        $hero_subtitle = sprintf( esc_html__( 'For the term "%s"', 'nora' ), get_search_query() );
    } else if( is_category() ) {
        $hero_title = sprintf( esc_html('%s'), single_cat_title( '', false ) );
        $hero_subtitle = sprintf( esc_html__( 'Posted in "%s"', 'nora' ), single_cat_title( '', false ) );
    } else if( is_tag() ) {
        $hero_title = sprintf( esc_html( '%s' ), single_tag_title( '', false ) );
        $hero_subtitle = sprintf( esc_html__( 'Posted with tag "%s"', 'nora' ), single_tag_title( '', false ) );
    } else if( is_date() ) {
        $hero_title = esc_html__( 'Archive', 'nora' );
        if ( is_day() ) {
            $hero_subtitle = sprintf( esc_html__( 'Posted in "%s"', 'nora' ), get_the_date() );
        } else if ( is_month() ) {
            $hero_subtitle = sprintf( esc_html__( 'Posted in "%s"', 'nora' ), get_the_date( 'F Y' ) );
        } else {
            $hero_subtitle = sprintf( esc_html__( 'Posted in "%s"', 'nora' ), get_the_date( 'Y' ) );
        }
    } else if( is_author() ) {
        $hero_title = esc_html__( 'Author', 'nora' );
        $hero_subtitle = sprintf( esc_html__( 'Posted by "%s"', 'nora' ), get_the_author() );
    } else if( is_home() ) {
        if ( $hero_enable == 'no_hero' || $hero_enable == 'hero_alt' || $hero_enable == 'is_hero' || $hero_enable == 'is_hero_video' ) { 
            $hero_title = !empty($hero_title) ? $hero_title : get_the_title( get_option('page_for_posts', true) );
        } else {
            $hero_title = esc_html__( 'Blog', 'nora' );;
        }
        if (  $hero_enable == 'no_hero' || $hero_enable == 'hero_alt' || $hero_enable == 'is_hero' || $hero_enable == 'is_hero_video' ) { 
            $hero_subtitle = !empty($hero_subtitle) ? $hero_subtitle : get_the_date('j M, Y');
        } else {
            $hero_subtitle = get_bloginfo( 'description' );
        }
    } else if( is_single() ) {

        if ( $hero_enable == 'no_hero' || $hero_enable == 'hero_alt' || $hero_enable == 'is_hero' || $hero_enable == 'is_hero_video' ) { 
            $hero_title = !empty($hero_title) ? $hero_title : get_the_title();
        } else {
            $hero_title = get_the_title();
        }
        
        if (  $hero_enable == 'no_hero' || $hero_enable == 'hero_alt' || $hero_enable == 'is_hero' || $hero_enable == 'is_hero_video' ) { 
            $hero_subtitle = !empty($hero_subtitle) ? $hero_subtitle : '';
        } else {
            $hero_subtitle = '';
        }
    } else if( is_page() ) {

        if (  $hero_enable == 'no_hero' || $hero_enable == 'hero_alt' || $hero_enable == 'is_hero' || $hero_enable == 'is_hero_video' ) { 
            $hero_title = !empty($hero_title) ? $hero_title : get_the_title();
        } else {
            $hero_title = get_the_title();
        }

        if (  $hero_enable == 'no_hero' || $hero_enable == 'hero_alt' || $hero_enable == 'is_hero' || $hero_enable == 'is_hero_video') { 
            $hero_subtitle = !empty($hero_subtitle) ? $hero_subtitle : '';
        } else {
            $hero_subtitle = !empty($hero_subtitle) ? $hero_subtitle : '';
        }

    }

?>

<?php if (is_404()) { ?>
    <div class="container-header-space"></div>
<?php } else { ?>

    <?php if ($menu_layout != '') { ?>
    
    <div class="container-header-space"></div>
    
    <?php } ?>

    <?php if ($hero_enable == '') { ?>
    <div class="breadcrumb-area text-center ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-content">
                        <h2 class="page-cat"><?php echo esc_attr( $hero_title ); ?></h2>
                        <p><?php echo esc_attr( $hero_subtitle ); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php } elseif ($hero_enable == 'no_hero') { ?>

	    <?php if ($menu_layout == 'central') { ?>

	    <div class="breadcrumb-area text-center pt-100">
	        <div class="container">
	            <div class="row">
	                <div class="col-md-12">
	                    <div class="breadcrumb-content central-hero">
	                        <h2 class="page-cat"><?php echo esc_attr( $hero_title ); ?></h2>
	                        <p><?php echo esc_attr( $hero_subtitle ); ?></p>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>

	    <?php } else { ?>
		    <div class="breadcrumb-area pt-100">
		        <div class="container">
		            <div class="row">
		                <div class="col-md-6">
		                    <div class="breadcrumb-content">
		                        <h2 class="page-cat"><?php echo esc_attr( $hero_title ); ?></h2>
		                        <p><?php echo esc_attr( $hero_subtitle ); ?></p>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
	    <?php } ?>

    <?php } else { ?>

	<?php } ?>

<?php } ?>