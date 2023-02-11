<?php

/**
 * Product Settings
 *
 * @package Gautama
 */

return array(

	'title'            => esc_html__( 'Product', 'gautama' ),
	'id'               => 'product_settings',
	'customizer_width' => '400px',
  'subsection'       => true,
	'fields'           => array(

		array(
			'id'       => 'product_style',
			'type'     => 'select',
			'title'    => esc_html__('Product card style', 'gautama'),
			'options'  => array(
				'style-1' => esc_html__('Style 1', 'gautama'),
				'style-2' => esc_html__('Style 2', 'gautama'),
			),
			'default'  => 'style-1',
		),

		array(
			'id'       => 'show_featured_badge',
			'type'     => 'switch',
			'title'    => esc_html__( 'Show featured badge?', 'gautama' ),
			'subtitle' => esc_html__( 'Check if you want to show the featured product badge (Only if set)', 'gautama' ),
			'default'  => true
		),
		array(
			'id'       => 'show_sale_badge',
			'type'     => 'switch',
			'title'    => esc_html__( 'Show sale badge?', 'gautama' ),
			'subtitle' => esc_html__( 'Check if you want to show the sale product badge', 'gautama' ),
			'default'  => true
		),
		array(
			'id'       => 'product_show_excerpt',
			'type'     => 'switch',
			'title'    => esc_html__( 'Show Excerpt?', 'gautama' ),
			'subtitle' => esc_html__( 'Check if you want to show the recipe excerpt', 'gautama' ),
			'default'  => true
		),
		array(
			'id'       => 'product_excerpt_length',
			'type'     => 'text',
			'title'    => esc_html__( 'Excerpt Length', 'gautama' ),
			'subtitle' => esc_html__( 'Number of words to display in the text', 'gautama' ),
			'default'  => 10,
			'required' => array('product_show_excerpt','=','1'),
		),
		array(
			'id'       => 'add_to_cart_snackbar',
			'type'     => 'switch',
			'title'    => esc_html__( 'Show Notification On added to cart', 'gautama' ),
			'subtitle' => esc_html__( 'Check if you want to show a notification popup when a user adds an item to the cart.', 'gautama' ),
			'default'  => false
		),

	),

);
