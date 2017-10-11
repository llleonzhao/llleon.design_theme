<?php 
/*
Template Name: Contact
*/
?>

<?php get_header(); ?>

<?php
    $map_key = get_theme_mod('nora_map_key');

    $contact_email = get_post_meta(get_the_ID(), 'contact_email', true);
    $contact_phone = get_post_meta(get_the_ID(), 'contact_phone_number', true);
    $contact_fax = get_post_meta(get_the_ID(), 'contact_fax_number', true);
    $contact_address = get_post_meta(get_the_ID(), 'contact_address', true);
    $contact_form_shortcode = get_post_meta(get_the_ID(), 'contact_form_shortcode', true);
    $contact_enable_map = get_post_meta(get_the_ID(), 'contact_enable_map', true);
    $map_enabled = isset($_GET['map']) ? $_GET['map'] : is_array($contact_enable_map) && in_array('is_map', $contact_enable_map) ? true : false;

    $map_latitude = get_post_meta(get_the_ID(), 'map_latitude', true);
    $map_longtitude = get_post_meta(get_the_ID(), 'map_longtitude', true); 
    $map_zoom = get_post_meta(get_the_ID(), 'map_zoom', true); 
    $map_info = get_post_meta(get_the_ID(), 'map_info', true); 
    $map_type = get_post_meta(get_the_ID(), 'map_type', true); 

    $is_info_meta = !empty($contact_message) || !empty($contact_email) || !empty($contact_phone) || !empty($contact_address);

?>

<div class="content">
    <div class="nora-standard-row ptb-100 contact-style-two">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="area-heading area-heading-style-two text-center">
                         <?php the_content( esc_html__( 'Read More', 'nora' ) ); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php if ($contact_address != "" || $contact_phone != "" || $contact_email != "") { ?>
                    <div class="col-md-3 col-sm-4">
                        <?php if ($contact_address) { ?>
                            <div class="single-contact-option text-left">
                                <i class=" icon-map"></i>
                                <h4><?php esc_html_e('Address', 'nora'); ?></h4>
                                <p><?php echo esc_attr( $contact_address ); ?></p>
                            </div>
                        <?php } ?>
                        <?php if ($contact_phone) { ?>
                            <div class="single-contact-option text-left">
                                <i class=" icon-map"></i>
                                <h4><?php esc_html_e('Phone', 'nora'); ?></h4>
                                <p><?php echo esc_attr( $contact_phone ); ?></p>
                            </div>
                        <?php } ?>
                        <?php if ($contact_email) { ?>
                            <div class="single-contact-option text-left">
                                <i class=" icon-map"></i>
                                <h4><?php esc_html_e('Email', 'nora'); ?></h4>
                                <p><?php echo esc_attr( $contact_email ); ?></p>
                            </div>
                        <?php } ?>
                    </div>  
                    <?php if ($contact_form_shortcode) { ?>

                    <div class="col-md-9 col-sm-8">
                        <div class="contact-page-area">
                            <?php echo do_shortcode($contact_form_shortcode); ?>
                        </div>
                    </div>

                    <?php } ?>

                    <?php } else { ?>
                        <?php if ($contact_form_shortcode) { ?>

                        <div class="col-md-12">
                            <div class="contact-page-area">
                                <?php echo do_shortcode($contact_form_shortcode); ?>
                            </div>
                        </div>

                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php if ($map_enabled) { ?>

        <div id="g_map" data-lat="<?php echo esc_attr($map_latitude); ?>" data-lon="<?php echo esc_attr($map_longtitude); ?>" data-zoom="<?php echo esc_attr($map_zoom); ?>" data-type="<?php echo esc_attr($map_type); ?>" data-info="<?php echo esc_attr($map_info); ?>"></div>

        <?php } ?>
    </div>
</div>

<?php get_footer(); ?>