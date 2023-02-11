<?php
/**
 * File responsible for adding all core functionality of sigmacore plugin
 *
 * @package Sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*==========================
INCLUDE CORE FUNCTIONALITY
==========================*/

// Core scripts
require_once trailingslashit( SIGMACORE_PATH ) . 'core/functions/sigmacore-scripts.php';

// Helper functions
require_once trailingslashit( SIGMACORE_PATH ) . 'core/functions/sigmacore-helpers.php';

// Metafields logic
require_once trailingslashit( SIGMACORE_PATH ) . 'core/functions/sigmacore-metafields.php';

// Views
require_once trailingslashit( SIGMACORE_PATH ) . 'core/functions/sigmacore-views.php';

// Core CPTs
require_once trailingslashit( SIGMACORE_PATH ) . 'core/functions/sigmacore-templates.php';
require_once trailingslashit( SIGMACORE_PATH ) . 'core/functions/sigmacore-megamenu.php';

// Page Layouts
require_once trailingslashit( SIGMACORE_PATH ) . 'core/functions/sigmacore-layouts.php';

// Core meta fields
require_once trailingslashit( SIGMACORE_PATH ) . 'core/meta-fields/page.php';
require_once trailingslashit( SIGMACORE_PATH ) . 'core/meta-fields/layouts.php';
