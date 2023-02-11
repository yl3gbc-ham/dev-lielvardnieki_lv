<?php

/**
 * Product Details Settings
 *
 * @package Gautama
 */

return array(

	'title'            => esc_html__( 'Product Details', 'gautama' ),
	'id'               => 'product_details_settings',
	'customizer_width' => '400px',
  'subsection'       => true,
	'fields'           => array(
		array(
			'id'       => 'product_details_style',
			'type'     => 'select',
			'title'    => esc_html__('Product details style', 'gautama'),
			'options'  => array(
				'style-1' => esc_html__('Style 1', 'gautama'),
				'style-2' => esc_html__('Style 2', 'gautama'),
				'style-3' => esc_html__('Style 3', 'gautama'),
			),
			'default'  => 'style-1',
		),
		array(
			'id'       => 'display_product_share',
			'type'     => 'switch',
			'title'    => esc_html__( 'Display Product Social Share', 'gautama' ),
			'subtitle' => esc_html__( 'Please choose if you want to display the social share for products', 'gautama' ),
			'default'  => false
		),
		array(
			'id'       => 'display_payment_method',
			'type'     => 'switch',
			'title'    => esc_html__( 'Display Payment Method', 'gautama' ),
			'subtitle' => esc_html__( 'Please choose if you want to display payment method details under product share', 'gautama' ),
			'default'  => false
		),
		array(
			'id'       => 'payment_method_title',
			'type'     => 'text',
			'title'    => esc_html__( 'Payment Method Title', 'gautama' ),
			'subtitle' => esc_html__( 'Enter the title to show under product share.', 'gautama' ),
			'required'    => array( 'display_payment_method', '=', 'true' )
		),
		array(
			'id'       => 'payment_method_img',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Payment method Image', 'insubex' ),
			'required'    => array( 'display_payment_method', '=', 'true' ),
			'compiler' => 'true',
		),
	),

);
