<?php
/**
 * WooCommerce Settings
 *
 * @package Gautama
 */
return array(
	'title'            => esc_html__( 'WooCommerce settings', 'gautama' ),
	'id'               => 'woocommerce_settings',
	'customizer_width' => '400px',
	'icon'             => 'el el-shopping-cart',
	'fields'           => array(
    array(
			'id'       => 'shop_layout',
			'type'     => 'select',
			'title'    => esc_html__('Shop Layout', 'gautama'),
			'options'  => array(
				'container' => esc_html__('Boxed', 'gautama'),
				'container-fluid' => esc_html__('Full Width', 'gautama'),
			),
			'default'  => 'container',
		),
		array(
			'id'       => 'display-cart',
			'type'     => 'switch',
			'title'    => esc_html__( 'Display Cart', 'gautama' ),
			'description' => esc_html__( 'This only shows in the following headers: Header Style 2, Header Style 3, Header Style 5, Header Style 7', 'gautama' ),
			'subtitle' => esc_html__( 'Display Cart in the Header', 'gautama' ),
			'default'  => false,
		),
		array(
			'id'       => 'display-user-icon',
			'type'     => 'switch',
			'title'    => esc_html__( 'Display User Icon', 'gautama' ),
			'default'  => false,
			'description' => esc_html__( 'This only shows in the following headers: Header Style 2, Header Style 3, Header Style 5, Header Style 7', 'gautama' ),
			'subtitle' => esc_html__( 'Enable to display the user icon in header. (WooCommerce Profile)', 'gautama' ),
		),
	),
);
