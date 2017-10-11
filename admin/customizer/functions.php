<?php

/*-----------------------------------------------------------------------------------*/
/*	Theme Customization Options
/*-----------------------------------------------------------------------------------*/
 
add_action( 'customize_register', 'nora_customize_register' );

function nora_customize_register($wp_customize) {

	$wp_customize->remove_section('colors');
	$wp_customize->remove_section('background_image');
	$wp_customize->get_section('static_front_page')->priority = 20;

	$wp_customize->get_section('title_tagline')->title = esc_html__('Main Settings', 'nora');
	$wp_customize->get_section('title_tagline')->priority = 10;
    
    $wp_customize->add_setting( 'nora_logo', array (
		'sanitize_callback' => 'esc_url_raw',
    ) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'nora_logo', array(
        'label'   => esc_html__('Image Logo', 'nora'),
        'section' => 'title_tagline',
    ) ) );

	$wp_customize->add_setting( 'nora_color', array (
	    'default' => '#fff',
		'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control('nora_color', array(
	    'label'    => esc_html__('Color Scheme', 'nora'),
	    'section'  => 'title_tagline',
		'type'     => 'select',
		'choices'  => array(
			'white'  => 'White',
			'dark'  => 'Dark',
		),

	) );
	$wp_customize->add_setting( 'nora_menu_layout', array (
	    'default' => 'classic',
		'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control('nora_menu_layout', array(
	    'label'    => esc_html__('Header layout', 'nora'),
	    'section'  => 'title_tagline',
		'type'     => 'select',
		'choices'  => array(
			'classic'  => 'Classic',
			'minimal'  => 'Minimal',
			'central'  => 'Central',
		),

	) );

    $wp_customize->add_setting( 'nora_blog_layout', array (
	    'default' => 'classic',
		'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control('nora_blog_layout', array(
	    'label'    => esc_html__('Blog layout', 'nora'),
	    'section'  => 'title_tagline',
		'type'     => 'select',
		'choices'  => array(
			'default'  => 'Default Blog',
			'sidebar_left'  => 'Blog Sidebar Left',
			'sidebar_right'  => 'Blog Sidebar Right',
		),

	) );

    $wp_customize->add_setting( 'nora_copyright', array (
	    'default' => esc_html__('Copyright © themesymbol.', 'nora'),
		'sanitize_callback' => 'nora_sanitize_textarea',
    ) );	

    $wp_customize->add_control('nora_copyright', array(
	    'label'    => esc_html__('Copyright Text', 'nora'),
	    'section'  => 'title_tagline',
	    'type'     => 'textarea',
	) );


    $wp_customize->add_setting( 'nora_map_key', array (
		'sanitize_callback' => 'nora_sanitize_textarea',
    ) );	

    $wp_customize->add_control('nora_map_key', array(
	    'label'    => esc_html__('Google Map API Key', 'nora'),
	    'section'  => 'title_tagline',
	    'type'     => 'textarea',
	) );

	$wp_customize->add_section( 'nora_social', array(
	    'title'          => esc_html__( 'Social Links', 'nora' ),
	    'priority'       => 80,
	));	

    $wp_customize->add_setting( 'nora_facebook', array (
		'sanitize_callback' => 'nora_sanitize_textarea',
    ) );	

    $wp_customize->add_control('nora_facebook', array(
	    'label'    => esc_html__('Facebook link', 'nora'),
	    'section'  => 'nora_social',
	    'type'     => 'text',
	) );

    $wp_customize->add_setting( 'nora_instagram', array (
		'sanitize_callback' => 'nora_sanitize_textarea',
    ) );	

    $wp_customize->add_control('nora_instagram', array(
	    'label'    => esc_html__('Instagram link', 'nora'),
	    'section'  => 'nora_social',
	    'type'     => 'text',
	) );

    $wp_customize->add_setting( 'nora_twitter', array (
		'sanitize_callback' => 'nora_sanitize_textarea',
    ) );	

    $wp_customize->add_control('nora_twitter', array(
	    'label'    => esc_html__('Twitter link', 'nora'),
	    'section'  => 'nora_social',
	    'type'     => 'text',
	) );

    $wp_customize->add_setting( 'nora_linkedin', array (
		'sanitize_callback' => 'nora_sanitize_textarea',
    ) );	

    $wp_customize->add_control('nora_linkedin', array(
	    'label'    => esc_html__('LinkedIn link', 'nora'),
	    'section'  => 'nora_social',
	    'type'     => 'text',
	) );

    $wp_customize->add_setting( 'nora_dribble', array (
		'sanitize_callback' => 'nora_sanitize_textarea',
    ) );	

    $wp_customize->add_control('nora_dribble', array(
	    'label'    => esc_html__('Dribbble link', 'nora'),
	    'section'  => 'nora_social',
	    'type'     => 'text',
	) );

    $wp_customize->add_setting( 'nora_custom_css', array (
		'sanitize_callback' => 'nora_sanitize_textarea',
    ) );

    $wp_customize->add_control('nora_custom_css', array(
	    'label'    => esc_html__('Custom CSS', 'nora'),
	    'section'  => 'nora_styling',
	    'type'     => 'textarea',
	) );

} 

function nora_sanitize_textarea( $input ) {
      return wp_kses_post( force_balance_tags( $input ) );
}

?>