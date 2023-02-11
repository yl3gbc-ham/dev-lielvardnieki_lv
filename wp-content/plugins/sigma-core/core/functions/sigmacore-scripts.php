<?php
/**
 * File responsible for enqueuing necessary core scripts and styles
 *
 * @package Sigma Core
 */
 if ( ! defined( 'ABSPATH' ) ) {
 	exit;
 }
 
/**
 * Enqueue scripts and styles for admin.
 */
function sigmacore_register_core_scripts() {

  wp_enqueue_style( 'sigma-core', trailingslashit( SIGMACORE_URL ) . 'core/assets/sigma-core.css', array(), '1.0.0' );
  wp_enqueue_script( 'sigma-core', trailingslashit( SIGMACORE_URL ) . 'core/assets/sigma-core.js', array( 'jquery' ), '1.0.0', true );

}
add_action( 'admin_enqueue_scripts', 'sigmacore_register_core_scripts', 99 );

?>
