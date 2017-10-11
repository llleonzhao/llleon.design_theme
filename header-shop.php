<?php

    $menu_layout = isset($_GET['menu']) ? $_GET['menu'] : get_theme_mod('nora_menu_layout', 'classic');
 
    $header_settings = nora_header_layout($menu_layout);

    $nav_class = $header_settings[0];
    $header_class = $header_settings[1];
    $GLOBALS['map_key'] = get_theme_mod('nora_map_key', 'AIzaSyD2IAXpxSCRAdQ-ORLlhL0C1zykdcrE9Rc');

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>

        <!-- preloader -->
        <div id="preloader">
            <div class="spinner spinner-round"></div>
        </div>

        <div class="wrapper">
            
            <?php if ($menu_layout != '') {  ?>
            <header <?php if ($menu_layout == 'minimal' || $menu_layout == 'central') echo "id='sticky-header'"; ?> class="<?php echo esc_attr($header_class); ?>">
                <div class="header-middle-area">

                    <div class="container">
                        <div class="row">

                        <?php if ($menu_layout == 'central') { ?>
                            <div class="col-sm-12 col-xs-2">
                        <?php } else { ?>
                            <div class="col-md-4 col-sm-2 col-xs-6">
                        <?php } ?>
                                <div class="logo <?php if ($menu_layout == 'central') echo "text-center"; ?>">
                                    <?php if ( get_theme_mod('nora_logo') ) { ?>
                                        <a href="<?php echo esc_url( home_url('/') ); ?>">
                                            <img src="<?php echo esc_url( get_theme_mod('nora_logo') ); ?>" alt="<?php echo esc_attr( get_bloginfo('name') ); ?>">
                                        </a>
                                    <?php } else { ?>
                                        <h3><a href="<?php echo esc_url( home_url('/') ); ?>"><?php echo esc_html( get_bloginfo('name') ); ?></a></h3>
                                    <?php } ?>
                                </div>
                            </div>

                        <?php if ($menu_layout == 'central') { ?>
                            <div class="col-sm-12 hidden-xs">
                        <?php } else { ?>
                            <div class="col-md-8 col-sm-10 hidden-xs hidden-sm">
                        <?php } ?>
                        
                                <div class="menu-area <?php if ($menu_layout == 'minimal' || $menu_layout == 'central') echo 'clearfix'; ?>">
                                    <?php if ($menu_layout == 'minimal') { ?>
                                    
                                        <button class="hamburger hamburger--slider" type="button">
                                          <span class="hamburger-box">
                                            <span class="hamburger-inner"></span>
                                          </span>
                                        </button>  
                                        
                                    <?php } ?>
                                    <?php 
                                    $args = array(
                                        'theme_location'  => 'nora-main-nav',
                                        'container'       => 'nav',
                                        'container_class' => "$nav_class",
                                        'menu_class'    => 'main-menu hover-style-one clearfix',
                                        'fallback_cb'     => false,
                                        'walker' => new Nora_Walker_Main(),
                                        'depth' => 3
                                    );

                                    wp_nav_menu($args);
                                    ?>                                  
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="mobile-menu-area clearfix hidden-md hidden-lg">
                                    <?php 
                                    $args = array(
                                        'theme_location'  => 'nora-main-nav',
                                        'container'       => 'nav',
                                        'container_class'    => 'mobile-menu',
                                        'fallback_cb'     => false,
                                        'walker' => new Nora_Walker_Main(),
                                        'depth' => 3
                                    );

                                    wp_nav_menu($args);
                                    ?>  
                            </div>
                        </div>
                    </div>

                </div>
            </header>

            <?php } ?>
            <div class="product-separator" style="height: 50px"></div>