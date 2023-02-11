<?php
/**
 * Isotope layout shortcode options
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Return a list of all isotope options
 *
 * @since 1.0.0
 */
function sigmacore_get_isotope_options( $taxonomy ){

  $isotope_options = [
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Isotope Tabs Style', 'sigma-core' ),
			'description' => esc_html__( 'Select Style.', 'sigma-core' ),
			'param_name'  => 'isotope_style',
			'value'       => array(
				esc_html__( 'Square', 'sigma-core' ) => 'style-square',
				esc_html__( 'Bordered', 'sigma-core' ) => 'style-bordered',
				esc_html__( 'Round', 'sigma-core' ) => 'style-round',
				esc_html__( 'Pill', 'sigma-core' ) => 'style-pill',
				esc_html__( 'Tabs', 'sigma-core' ) => 'style-tabs',
				esc_html__( 'List Tabs', 'sigma-core' ) => 'style-list-tabs',
			),
			'dependency' => array(
				'element' => 'layout',
				'value'   => 'isotope',
			),
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Isotope Tabs Alignment', 'sigma-core' ),
			'description' => esc_html__( 'Select Style.', 'sigma-core' ),
			'param_name'  => 'isotope_alignment',
			'value'       => array(
				esc_html__( 'Left', 'sigma-core' ) => 'justify-content-start',
				esc_html__( 'Center', 'sigma-core' ) => 'justify-content-center',
				esc_html__( 'Right', 'sigma-core' ) => 'justify-content-end',
			),
			'dependency' => array(
				'element' => 'layout',
				'value'   => 'isotope',
			),
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Select Number of Columns (Categories)', 'sigma-core' ),
			'param_name'  => 'isotope_num_columns_cats',
			'value'       => array(
				'1 Column' => 'col-lg-12',
				'2 Columns' => 'col-lg-6',
				'3 Columns' => 'col-lg-4',
				'4 Columns' => 'col-lg-3',
				'6 Columns' => 'col-lg-2',
			),
			'dependency'  => array(
				'element' => 'layout',
				'value'   => 'isotope',
			),
		),
		array(
			'type'       => 'param_group',
			'param_name' => 'isotope_list_items',
			'dependency' => array(
				'element' => 'layout',
				'value'   => 'isotope',
			),
			'params'     => array(
				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__( 'Select Category', 'sigma-core' ),
					'param_name'  => 'isotope_cat_slug',
					'description' => esc_html__( 'Select Type.', 'sigma-core' ),
					'value'       => sigmacore_get_tax_terms($taxonomy),
				),
				array(
					'type'             => 'checkbox',
					'heading'          => esc_html__( 'Show Icon in Tab?', 'sigma-core' ),
					'param_name'       => 'show_icon',
					'value'            => array( esc_html__( 'Yes', 'sigma-core' ) => 'yes' ),
					'description'      => esc_html__( 'Select this checkbox to show icon in tabs.', 'sigma-core' ),
					'edit_field_class' => 'vc_col-sm-6 vc_column',
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Icon library', 'sigma-core' ),
					'value' => array(
						esc_html__( 'Font Awesome 5', 'sigma-core' ) => 'fontawesome',
						esc_html__( 'Open Iconic', 'sigma-core' )    => 'openiconic',
						esc_html__( 'Typicons', 'sigma-core' )       => 'typicons',
						esc_html__( 'Entypo', 'sigma-core' )         => 'entypo',
						esc_html__( 'Linecons', 'sigma-core' )       => 'linecons',
						esc_html__( 'Mono Social', 'sigma-core' )    => 'monosocial',
						esc_html__( 'Material', 'sigma-core' )       => 'material',
						esc_html__( 'Flaticon', 'sigma-core' )       => 'flaticon',
					),
					'admin_label' => true,
					'param_name'  => 'isotope_icon_type',
					'group'       => esc_html__( 'Icon Settings', 'sigma-core' ),
					'description' => esc_html__( 'Select icon library.', 'sigma-core' ),
					'dependency' => array(
						'element' => 'show_icon',
						'value'   => 'yes',
					),
				),
				array(
					'type'             => 'iconpicker',
					'heading'          => esc_html__( 'Icon', 'sigma-core' ),
					'param_name'       => 'isotope_icon_flaticon',
					'settings'   => array(
						'emptyIcon'    => false,
						'iconsPerPage' => 500,
						'type' => 'flaticon',
					),
					'dependency' => array(
						'element' => 'isotope_icon_type',
						'value'   => 'flaticon',
					),
					'description'      => esc_html__( 'Select icon from library.', 'sigma-core' ),
					'group'            => esc_html__( 'Icon Settings', 'sigma-core' ),
					'edit_field_class' => 'vc_col-sm-6 vc_column vc_column-with-padding',
				),
				array(
					'type'       => 'iconpicker',
					'heading'    => esc_html__( 'Icon', 'sigma-core' ),
					'param_name' => 'isotope_icon_fontawesome',
					'value'      => 'fas fa-adjust',
					'settings'   => array(
						'emptyIcon'    => false,
						'iconsPerPage' => 500,
					),
					'dependency' => array(
						'element' => 'isotope_icon_type',
						'value'   => 'fontawesome',
					),
					'group'       => esc_html__( 'Icon Settings', 'sigma-core' ),
					'description' => esc_html__( 'Select icon from library.', 'sigma-core' ),
				),
				array(
					'type'       => 'iconpicker',
					'heading'    => esc_html__( 'Icon', 'sigma-core' ),
					'param_name' => 'isotope_icon_openiconic',
					'value'      => 'vc-oi vc-oi-dial',
					'settings'   => array(
						'emptyIcon'    => false,
						'type'         => 'openiconic',
						'iconsPerPage' => 4000,
					),
					'dependency' => array(
						'element' => 'isotope_icon_type',
						'value'   => 'openiconic',
					),
					'group'       => esc_html__( 'Icon Settings', 'sigma-core' ),
					'description' => esc_html__( 'Select icon from library.', 'sigma-core' ),
				),
				array(
					'type'       => 'iconpicker',
					'heading'    => esc_html__( 'Icon', 'sigma-core' ),
					'param_name' => 'isotope_icon_typicons',
					'value'      => 'typcn typcn-adjust-brightness',
					'settings' => array(
						'emptyIcon'    => false,
						'type'         => 'typicons',
						'iconsPerPage' => 4000,
					),
					'dependency' => array(
						'element' => 'isotope_icon_type',
						'value'   => 'typicons',
					),
					'group'       => esc_html__( 'Icon Settings', 'sigma-core' ),
					'description' => esc_html__( 'Select icon from library.', 'sigma-core' ),
				),
				array(
					'type'       => 'iconpicker',
					'heading'    => esc_html__( 'Icon', 'sigma-core' ),
					'param_name' => 'isotope_icon_entypo',
					'value'      => 'entypo-icon entypo-icon-note',
					'settings'   => array(
						'emptyIcon' => false,
						'type'         => 'entypo',
						'iconsPerPage' => 4000,
					),
					'dependency' => array(
						'element' => 'isotope_icon_type',
						'value'   => 'entypo',
					),
					'group'      => esc_html__( 'Icon Settings', 'sigma-core' ),
				),
				array(
					'type'       => 'iconpicker',
					'heading'    => esc_html__( 'Icon', 'sigma-core' ),
					'param_name' => 'isotope_icon_linecons',
					'value'      => 'vc_li vc_li-heart',
					'settings' => array(
						'emptyIcon'    => false,
						'type'         => 'linecons',
						'iconsPerPage' => 4000,
					),
					'dependency' => array(
						'element' => 'isotope_icon_type',
						'value'   => 'linecons',
					),
					'group'       => esc_html__( 'Icon Settings', 'sigma-core' ),
					'description' => esc_html__( 'Select icon from library.', 'sigma-core' ),
				),
				array(
					'type'       => 'iconpicker',
					'heading'    => esc_html__( 'Icon', 'sigma-core' ),
					'param_name' => 'isotope_icon_monosocial',
					'value'      => 'vc-mono vc-mono-fivehundredpx',
					'settings'   => array(
						'emptyIcon'    => false,
						'type'         => 'monosocial',
						'iconsPerPage' => 4000,
					),
					'dependency'  => array(
						'element' => 'isotope_icon_type',
						'value'   => 'monosocial',
					),
					'group'       => esc_html__( 'Icon Settings', 'sigma-core' ),
					'description' => esc_html__( 'Select icon from library.', 'sigma-core' ),
				),
				array(
					'type'       => 'iconpicker',
					'heading'    => esc_html__( 'Icon', 'sigma-core' ),
					'param_name' => 'isotope_icon_material',
					'value'      => 'vc-material vc-material-cake',
					'settings'   => array(
						'emptyIcon'    => false,
						'type'         => 'material',
						'iconsPerPage' => 4000,
					),
					'dependency'  => array(
						'element' => 'isotope_icon_type',
						'value'   => 'material',
					),
					'group'       => esc_html__( 'Icon Settings', 'sigma-core' ),
					'description' => esc_html__( 'Select icon from library.', 'sigma-core' ),
				),

			),

		),
  ];

  return $isotope_options;

}

/**
 * Return a list of all isotope attributes
 *
 * @since 1.0.0
 */
function sigmacore_get_isotope_attributes(){

  $isotope_attributes = [
		'isotope_style'							=> '',
		'isotope_num_columns_cats'  => 'col-lg-12',
		'isotope_alignment'					=> '',
		'isotope_list_items'				=> '',
		'isotope_cat_slug'					=> '',
		'isotope_icon_type'					=> 'fontawesome',
		'isotope_icon_flaticon'			=> '',
		'isotope_icon_fontawesome'	=> 'fas fa-adjust',
		'isotope_icon_openiconic'		=> 'vc-oi vc-oi-dial',
		'isotope_icon_typicons'			=> 'typcn typcn-adjust-brightness',
		'isotope_icon_entypo'				=> 'entypo-icon entypo-icon-note',
		'isotope_icon_linecons'			=> 'vc_li vc_li-heart',
		'isotope_icon_monosocial'		=> 'vc-mono vc-mono-fivehundredpx',
		'isotope_icon_material'			=> 'vc-material vc-material-cake'
  ];

  return $isotope_attributes;

}

?>
