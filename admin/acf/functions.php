<?php

define( 'ACF_LITE', true );

if(function_exists("register_field_group"))
{

	register_field_group(array (
		'id' => 'acf_contact-form',
		'title' => 'Contact Form',
		'fields' => array (
			array (
				'key' => 'field_5627b993f5e5e',
				'label' => 'Form Shortcode',
				'name' => 'contact_form_shortcode',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '[contact-form-7 id="XXX" title="XXX"]',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'template-contact.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'side',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_contact-info',
		'title' => 'Contact Info',
		'fields' => array (
			array (
				'key' => 'field_56277c7d6920b',
				'label' => 'Email Address',
				'name' => 'contact_email',
				'type' => 'email',
				'default_value' => '',
				'placeholder' => 'admin@example.com',
				'prepend' => '',
				'append' => '',
			),
			array (
				'key' => 'field_56277cf66920c',
				'label' => 'Phone Number',
				'name' => 'contact_phone_number',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '+00 123 456 7890',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_56277d466920e',
				'label' => 'Address',
				'name' => 'contact_address',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'template-contact.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));

	register_field_group(array (
		'id' => 'acf_map-info',
		'title' => 'Google Map Info',
		'fields' => array (
			array (
				'key' => 'field_5626b62984cea',
				'label' => 'Check to display Google Map on this page',
				'name' => 'contact_enable_map',
				'type' => 'checkbox',
				'choices' => array (
					'is_map' => 'Display Google Map',
				),
				'default_value' => '',
				'layout' => 'vertical',
			),
			array (
				'key' => 'field_5626b62984ceb',
				'label' => 'Map type',
				'name' => 'map_type',
				'type' => 'select',
				'choices' => array(
						'SATELLITE'	=> 'SATELLITE',
						'ROADMAP' => 'ROADMAP',
						'TERRAIN' => 'TERRAIN'
					),
				'default_value' => 'SATELLITE',
			),
			array (
				'key' => 'field_5626b62984cec',
				'label' => 'Latitude',
				'name' => 'map_latitude',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '40.805478',
				'prepend' => '',
				'append' => '',
			),
			array (
				'key' => 'field_5626b62984ced',
				'label' => 'Longtitude',
				'name' => 'map_longtitude',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '-73.965224',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5626b62984cee',
				'label' => 'Zoom level',
				'name' => 'map_zoom',
				'type' => 'text',
				'default_value' => '14',
				'placeholder' => '14',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5626b62984ceg',
				'label' => 'Info box content',
				'name' => 'map_info',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'br',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'template-contact.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	
	register_field_group(array (
		'id' => 'acf_post-style',
		'title' => 'Post style',
		'fields' => array (
			array (
				'key' => 'field_5626b6095b2kl',
				'label' => 'Select post layout',
				'name' => 'post_style_options',
				'type' => 'radio',
				'choices' => array (
					'classic' => 'Default layout',
					'left' => 'Sidebar left',
					'right' => 'Sidebar right'

				),
				'default_value' => 'classic',
				'layout' => 'vertical',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	
	register_field_group(array (
		'id' => 'acf_hero-header',
		'title' => 'Hero Settings',
		'fields' => array (
			array (
				'key' => 'field_5626b57c5b2e6',
				'label' => 'Hero title',
				'name' => 'hero_title',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5626b5955b2e7',
				'label' => 'Hero subtitle',
				'name' => 'hero_subtitle',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5626b6095b2ea',
				'label' => 'Select Hero type',
				'name' => 'hero_additional_options',
				'type' => 'radio',
				'choices' => array (
					'hero_none' => 'No Hero',
					'no_hero' => 'Hero Text',
				),
				'default_value' => '',
				'layout' => 'vertical',
			),			
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
					'order_no' => 0,
					'group_no' => 1,
				),
			),
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'portfolio',
					'order_no' => 0,
					'group_no' => 0,
				),
			),			
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	
	
	register_field_group(array (
		'id' => 'acf_portfolio',
		'title' => 'Portfolio layout',
		'fields' => array (
			array (
				'key' => 'field_5626b6095b2fg',
				'label' => 'Select Portfolio layout style',
				'name' => 'portfolio_style_options',
				'type' => 'radio',
				'choices' => array (
					'classic' => 'Default layout',
					'alt' => 'Card layout',
				),
				'default_value' => 'classic',
				'layout' => 'vertical',
			),
		
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'template-portfolio.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 5,
	));	
	
	register_field_group(array (
		'id' => 'acf_portfolio-details',
		'title' => 'Portfolio Details',
		'fields' => array (
			array (
				'key' => 'field_5627c76e06991',
				'label' => 'Portfolio Category',
				'name' => 'portfolio_category',
				'type' => 'taxonomy',
				'taxonomy' => 'portfolio_category',
				'field_type' => 'select',
				'allow_null' => 1,
				'load_save_terms' => 0,
				'return_format' => 'id',
				'multiple' => 0,
			),
			array (
				'key' => 'field_5627c7e2ca2cd',
				'label' => 'Portfolio Columns',
				'name' => 'portfolio_columns',
				'type' => 'select',
				'required' => 1,
				'choices' => array (
					2 => '2 Columns',
					3 => '3 Columns',
					4 => '4 Columns',
				),
				'default_value' => 3,
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_5626b6095b3if',
				'label' => 'Filter option',
				'name' => 'filter_option',
				'type' => 'checkbox',
				'choices' => array (
					'is_filtration' => 'Filter enabled',
				),
				'default_value' => '',
				'layout' => 'vertical',
			),	
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'template-portfolio.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 4,
	));
	register_field_group(array (
		'id' => 'acf_project-details',
		'title' => 'Project Details',
		'fields' => array (
			array (
				'key' => 'field_5627e2fd3d55c',
				'label' => 'Portfolio Page',
				'name' => 'portfolio_page',
				'type' => 'page_link',
				'required' => 1,
				'post_type' => array (
					0 => 'page',
				),
				'allow_null' => 1,
				'multiple' => 0,
			),
			array (
				'key' => 'field_5626b62984c23',
				'label' => 'Portfolio type',
				'name' => 'portfolio_type',
				'type' => 'select',
				'choices' => array(
						'standard'	=> 'Standard',
						'left' => 'Left Sidebar',
						'right' => 'Right Sidebar',
					),
				'default_value' => 'standard',
			),
			array (
				'key' => 'field_5627f51b74d38',
				'label' => 'Client',
				'name' => 'project_client',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => 'Acme Inc.',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5627f51b74d39',
				'label' => 'Date',
				'name' => 'project_date',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => 'march 2016',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5627f51b74d40',
				'label' => 'Category',
				'name' => 'project_category',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => 'Graphic design',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5626b629844d44',
				'label' => 'Check to display social sharing icons',
				'name' => 'share_enable',
				'type' => 'checkbox',
				'choices' => array (
					'is_share' => 'Display social icons',
				),
				'default_value' => '',
				'layout' => 'vertical',
			),
			array (
				'key' => 'field_5627f51b74d37',
				'label' => 'Custom URL',
				'name' => 'project_custom_url',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => 'http://www.example.com',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'portfolio',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));

}
