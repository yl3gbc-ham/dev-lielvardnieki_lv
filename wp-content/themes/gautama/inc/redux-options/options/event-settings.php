<?php
/**
 * Event settings
 *
 * @package Sigma
 */
return array(
	'title'  => esc_html__( 'Event Settings', 'gautama' ),
	'id'     => 'event_settings',
	'icon'   => 'el el-graph',
	'fields' => array(
		array(
			'id'       => 'event_sidebar',
			'type'     => 'select',
			'title'    => esc_html__( 'Event Sidebar', 'gautama' ),
			'subtitle' => esc_html__( 'Select the Event sidebar position.', 'gautama' ),
			'options'  => array(
				'left-sidebar' => esc_html__( 'Left Sidebar', 'gautama' ),
				'right-sidebar' => esc_html__( 'Right Sidebar', 'gautama' ),
			),
			'default'  => 'right-sidebar',
		),
		array(
			'id'       => 'event-style',
			'type'     => 'select',
			'title'    => esc_html__( 'Select Event Style', 'gautama' ),
			'subtitle' => esc_html__( 'Please select the Event archive style to display.', 'gautama' ),
			'options'  => array(
				'style-1' => esc_html__( 'Event Style 1', 'gautama' ),
        'style-2' => esc_html__( 'Event Style 2', 'gautama' ),
			),
			'default'  => 'style-1',
		),
		array(
			'id'       => 'event-columns',
			'type'     => 'select',
			'title'    => esc_html__( 'Number of Columns', 'gautama' ),
			'subtitle' => esc_html__( 'Please select the number of columns in event archive.', 'gautama' ),
			'options'  => array(
				'col-lg-12' => esc_html__( '1 Column', 'gautama' ),
				'col-lg-6' => esc_html__( '2 Columns', 'gautama' ),
				'col-lg-4' => esc_html__( '3 Columns', 'gautama' ),
				'col-lg-3' => esc_html__( '4 Columns', 'gautama' ),
			),
			'default'  => 'col-lg-12',
		),
		array(
			'id'       => 'show-event-detail-image',
			'type'     => 'switch',
			'title'    => esc_html__( 'Show Event Image', 'gautama' ),
			'default'  => 0,
			'subtitle' => esc_html__( 'Enable to show event image on detail page', 'gautama' ),
		),
		array(
			'id'       => 'show-event-meta-details',
			'type'     => 'switch',
			'title'    => esc_html__( 'Show Event Meta Details', 'gautama' ),
			'default'  => 1,
			'subtitle' => esc_html__( 'Enable to show event meta details on single event page', 'gautama' ),
		),
		array(
			'id'       => 'event_details_sidebar',
			'type'     => 'select',
			'title'    => esc_html__( 'Event Details Sidebar', 'gautama' ),
			'subtitle' => esc_html__( 'Select the Event Details sidebar position.', 'gautama' ),
			'options'  => array(
				'left-sidebar' => esc_html__( 'Left Sidebar', 'gautama' ),
				'right-sidebar' => esc_html__( 'Right Sidebar', 'gautama' ),
			),
			'default'  => 'right-sidebar',
		),
	),
);
