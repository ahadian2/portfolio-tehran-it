<?php
/**
 * Plugin Name: Portfolio Tehran IT
 * Plugin URI: https://tehranit.net
* Description: A lightweight developer-focused WordPress portfolio plugin with custom post type, portfolio categories, custom fields, reusable template parts, and theme-friendly portfolio templates.
* Version: 1.0.2
 * Author: Mohammadreza Ahadian (Tehran IT)
 * Author URI: https://tehranit.net
 * Text Domain: portfolio-tehran-it
 * Domain Path: /languages
 * Requires at least: 6.0
 * Requires PHP: 8.0
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

if (!defined('ABSPATH')) {
    exit;
}

define('TIT_20260606_VERSION', '1.0.0');
define('TIT_20260606_FILE', __FILE__);
define('TIT_20260606_DIR', plugin_dir_path(__FILE__));
define('TIT_20260606_URL', plugin_dir_url(__FILE__));
define('TIT_20260606_BASENAME', plugin_basename(__FILE__));

require_once TIT_20260606_DIR . 'includes/class-tit-20260606-plugin.php';

function tit_20260606_run_plugin() {
    if (class_exists('TIT_20260606_Plugin')) {
        $plugin = new TIT_20260606_Plugin();
        $plugin->run();
    }
}

function tit_20260606_activate_plugin() {
    tit_20260606_run_plugin();
    flush_rewrite_rules();
}

function tit_20260606_deactivate_plugin() {
    flush_rewrite_rules();
}

register_activation_hook(__FILE__, 'tit_20260606_activate_plugin');
register_deactivation_hook(__FILE__, 'tit_20260606_deactivate_plugin');

tit_20260606_run_plugin();