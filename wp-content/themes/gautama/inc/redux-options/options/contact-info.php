<?php
/**
 * Contact Info
 *
 * @package Gautama
 */
return array(
	'title'            => esc_html__( 'Contact Information', 'gautama' ),
	'id'               => 'site_info',
	'customizer_width' => '400px',
	'icon'             => 'el el-envelope',
	'fields'           => array(
		array(
			'id'       => 'contact_email',
			'type'     => 'text',
			'title'    => esc_html__( 'Company Email', 'gautama' ),
			'subtitle' => esc_html__( 'Please enter contact email address.', 'gautama' ),
			'validate' => 'email',
			'msg'      => esc_html__( 'Please enter valid email.', 'gautama' ),
		),
		array(
			'id'       => 'contact_phone',
			'type'     => 'text',
			'title'    => esc_html__( 'Company Phone Number', 'gautama' ),
			'subtitle' => esc_html__( 'Please enter contact phone number.', 'gautama' ),
		),
		array(
			'id'       => 'contact_address',
			'type'     => 'text',
			'title'    => esc_html__( 'Company Address', 'gautama' ),
			'subtitle' => esc_html__( 'Please enter contact address.', 'gautama' ),
		),
		array(
			'id'       => 'contact_map_link',
			'type'     => 'text',
			'title'    => esc_html__( 'Company Google map link', 'gautama' ),
			'subtitle' => esc_html__( 'Please enter google maps link', 'gautama' ),
		),
		array(
			'id'       => 'contact_description',
			'type'     => 'textarea',
			'title'    => esc_html__( 'Company Description', 'gautama' ),
			'subtitle' => esc_html__( 'Please type a small description of your company', 'gautama' ),
		),
		array(
			'id'       => 'social_infos',
			'type'     => 'select',
			'options'  => array(
				'facebook-f'  => esc_html__( 'Facebook', 'gautama' ),
				'twitter'   => esc_html__( 'Twitter', 'gautama' ),
				'dribbble'  => esc_html__( 'Dribbble', 'gautama' ),
				'vimeo-v'     => esc_html__( 'Vimeo', 'gautama' ),
				'pinterest-p' => esc_html__( 'Pinterest', 'gautama' ),
				'linkedin-in'  => esc_html__( 'LinkedIn', 'gautama' ),
				'youtube'   => esc_html__( 'Youtube', 'gautama' ),
				'instagram' => esc_html__( 'Instagram', 'gautama' ),
			),
			'multi'    => true,
			'sortable' => true,
			'title'    => esc_html__( 'Social info to display.', 'gautama' ),
			'subtitle' => esc_html__( 'Arrange the fields you wanted to display.', 'gautama' ),
		),
		array(
			'id'       => 'facebook-f_link',
			'type'     => 'text',
			'title'    => esc_html__( 'Facebook Url', 'gautama' ),
			'subtitle' => esc_html__( 'Enter facebook url.', 'gautama' ),
		),
		array(
			'id'       => 'twitter_link',
			'type'     => 'text',
			'title'    => esc_html__( 'Twitter Url', 'gautama' ),
			'subtitle' => esc_html__( 'Enter twitter url.', 'gautama' ),
		),
		array(
			'id'       => 'dribbble_link',
			'type'     => 'text',
			'title'    => esc_html__( 'Dribbble Url', 'gautama' ),
			'subtitle' => esc_html__( 'Enter dribbble url.', 'gautama' ),
		),
		array(
			'id'       => 'vimeo-v_link',
			'type'     => 'text',
			'title'    => esc_html__( 'Vimeo Url', 'gautama' ),
			'subtitle' => esc_html__( 'Enter vimeo url.', 'gautama' ),
		),
		array(
			'id'       => 'pinterest-p_link',
			'type'     => 'text',
			'title'    => esc_html__( 'Pinterest Url', 'gautama' ),
			'subtitle' => esc_html__( 'Enter pinterest url.', 'gautama' ),
		),
		array(
			'id'       => 'linkedin-in_link',
			'type'     => 'text',
			'title'    => esc_html__( 'LinkedIn Url', 'gautama' ),
			'subtitle' => esc_html__( 'Enter linkedin url.', 'gautama' ),
		),
		array(
			'id'       => 'youtube_link',
			'type'     => 'text',
			'title'    => esc_html__( 'Youtube Url', 'gautama' ),
			'subtitle' => esc_html__( 'Enter youtube url.', 'gautama' ),
		),
		array(
			'id'       => 'instagram_link',
			'type'     => 'text',
			'title'    => esc_html__( 'Instagram Url', 'gautama' ),
			'subtitle' => esc_html__( 'Enter instagram url.', 'gautama' ),
		),
		array(
			'id'       => 'pinterest_link',
			'type'     => 'text',
			'title'    => esc_html__( 'Pinterest Url', 'gautama' ),
			'subtitle' => esc_html__( 'Enter pinterest url.', 'gautama' ),
		),
	),
);
