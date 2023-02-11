<?php
/**
 * Register widgets.
 *
 * @package sigma Core
 *
 * @version 1.0.0
 */

/**
 * Call Widgets loaded.
 */
function sigmacore_widgets() {
	require_once trailingslashit( SIGMACORE_PATH ) . '/includes/widgets/class-sigma-widget-recent-posts.php';
	require_once trailingslashit( SIGMACORE_PATH ) . '/includes/widgets/class-sigma-widget-social-share.php';
	require_once trailingslashit( SIGMACORE_PATH ) . '/includes/widgets/class-sigma-widget-call-to-action.php';
	require_once trailingslashit( SIGMACORE_PATH ) . '/includes/widgets/class-sigma-widget-recent-portfolio.php';
	require_once trailingslashit( SIGMACORE_PATH ) . '/includes/widgets/class-sigma-widget-recent-services.php';
	require_once trailingslashit( SIGMACORE_PATH ) . '/includes/widgets/class-sigma-widget-ministries-cta.php';
	require_once trailingslashit( SIGMACORE_PATH ) . '/includes/widgets/class-sigma-widget-event-cta.php';
	require_once trailingslashit( SIGMACORE_PATH ) . '/includes/widgets/class-sigma-widget-portfolio-cta.php';
	require_once trailingslashit( SIGMACORE_PATH ) . '/includes/widgets/class-sigma-widget-recent-ministries.php';
	require_once trailingslashit( SIGMACORE_PATH ) . '/includes/widgets/class-sigma-widget-recent-event.php';
	require_once trailingslashit( SIGMACORE_PATH ) . '/includes/widgets/class-sigma-widget-recent-sermons.php';

}
add_action( 'plugins_loaded', 'sigmacore_widgets', 99 );

/**
 * Register widgets
 */
function sigmacore_widgets_init() {
	register_widget( 'Sigma_Widget_Recent_Posts' );
	register_widget('sigma_social_share');
	register_widget('Sigma_Cta_Widget');
	register_widget('Sigma_Widget_Recent_Portfolio');
	register_widget('Sigma_Widget_Recent_Services');
	register_widget('Sigma_Widget_Ministries_Cta');
	register_widget('Sigma_Widget_Event_Cta');
	register_widget('Sigma_Widget_Portfolio_Cta');
	register_widget('Sigma_Widget_Recent_Ministries');
	register_widget('Sigma_Widget_Recent_Event');
	register_widget('Sigma_Widget_Recent_Sermons');

}
add_action( 'widgets_init', 'sigmacore_widgets_init' );
