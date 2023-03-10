<?php
/**
 * @author    sh1zen
 * @copyright Copyright (C)  2022
 * @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
 */

/**
 * Plugin Name: WP Optimizer
 * Plugin URI: https://github.com/sh1zen/wp-optimizer
 * Description: Search Engine (SEO) & Performance Optimization plugin, support automatic image compression, integrated caching, database cleanup and Server enhancements.
 * Author: sh1zen
 * Author URI: https://sh1zen.github.io/
 * Text Domain: wpopt
 * Domain Path: /languages
 * Version: 1.8.1
 */

const WPOPT_VERSION = '1.8.1';

const WPOPT_FILE = __FILE__;
if (!defined('WPOPT_ABSPATH')) {
    define('WPOPT_ABSPATH', dirname(__FILE__) . '/');
}
const WPOPT_INCPATH = WPOPT_ABSPATH . 'inc/';
const WPOPT_MODULES = WPOPT_ABSPATH . 'modules/';
const WPOPT_ADMIN = WPOPT_ABSPATH . 'admin/';
const WPOPT_SUPPORTERS = WPOPT_MODULES . 'supporters/';
const WPOPT_VENDORS = WPOPT_ABSPATH . 'vendors/';

// setup constants
require_once WPOPT_INCPATH . 'constants.php';

// essential
require_once WPOPT_INCPATH . 'functions.php';
require_once WPOPT_INCPATH . 'Report.class.php';

// shzn-framework commons
if (!defined('SHZN_FRAMEWORK')) {
    if (!file_exists(WPOPT_VENDORS . 'shzn-framework/loader.php')) {
        return;
    }
    require_once WPOPT_VENDORS . 'shzn-framework/loader.php';
}

shzn('wpopt', ['path' => WPOPT_MODULES, 'table_name' => "wpopt"], [
    'meter'         => true,
    'cache'         => true,
    'storage'       => true,
    'settings'      => true,
    'cron'          => true,
    'ajax'          => true,
    'moduleHandler' => true,
    'options'       => true
]);

// initializer class
require_once WPOPT_ADMIN . 'PluginInit.class.php';

/**
 * Initialize the plugin.
 */
WPOptimizer\core\PluginInit::Initialize();
