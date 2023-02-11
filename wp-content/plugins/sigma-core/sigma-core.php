<?php
/**
 * Plugin Name:       Sigma Core
 * Description:       This is core plugin for Sigma themes.
 * Version:           1.0.0
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       sigma-core
 *
 * @package Sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'SIGMACORE_PATH', plugin_dir_path( __FILE__ ) );
define( 'SIGMACORE_URL', plugin_dir_url( __FILE__ ) );

/**
 * Load plugin textdomain.
 *
 * @since 1.0.0
 */
function sigmacore_load_textdomain() {
	load_plugin_textdomain( 'sigma-core', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}
add_action( 'plugins_loaded', 'sigmacore_load_textdomain' );

/**
 * Sigma Core Functions
 */
require_once trailingslashit( SIGMACORE_PATH ) . 'core/sigmacore-includes.php';

/**
 * Required template post types
 */
require_once trailingslashit( SIGMACORE_PATH ) . 'includes/custom-post-types/custom-post-types.php';

/**
 * Require template meta fields
 */
require_once trailingslashit( SIGMACORE_PATH ) . 'includes/custom-post-metas/custom-post-metas.php';

/**
 * Load shortcodes.
 */
require_once trailingslashit( SIGMACORE_PATH ) . 'vc/shortcodes.php';

/**
 * Load helper functions.
 */
require_once trailingslashit( SIGMACORE_PATH ) . 'includes/helper-functions.php';

/**
 * Load script style
 */
require_once trailingslashit( SIGMACORE_PATH ) . 'includes/script-styles.php';

/**
 * Load widgets
 */
require_once trailingslashit( SIGMACORE_PATH ) . 'includes/widgets.php';
