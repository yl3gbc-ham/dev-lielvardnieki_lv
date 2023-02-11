<?php
/**
 * My Account Settings
 *
 * @package Poli
 */
return array(
    'title'  => esc_html( 'My Account', 'poli' ),
    'id'     => 'my_account_settings',
    'subsection'       => true,
    'fields' => array(
        array(
            'id'       => 'form-title',
            'type'     => 'text',
            'title'    => esc_html__( 'Form Title', 'poli' ),
            'subtitle' => esc_html__( 'Please enter login form title', 'poli' ),
        ),
        array(
            'id'       => 'form-description',
            'type'     => 'textarea',
            'title'    => esc_html__( 'Form Description', 'poli' ),
            'subtitle' => esc_html__( 'Please enter login form title', 'poli' ),
        ),
        array(
            'id'       => 'my_account_page_image',
            'type'     => 'media',
            'url'      => true,
            'title'    => esc_html__( 'My Account Page Image', 'poli' ),
            'compiler' => 'true',
        ),
    ),
);
