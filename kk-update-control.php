<?php
/**
 * @author Kai Krannich
 * 
 * @since 1.3.0 Version field updated in plugin header comment
 * @since 1.2.0 Version field updated in plugin header comment
 * @since 1.1.0 License field added to plugin header comment
 * @since 1.1.0 Version field updated in plugin header comment
 * @since 1.0.0
 */

/**
 * Prevent direct access
 * 
 * @author Kai Krannich
 * 
 * @since 1.0.0
 */
defined('ABSPATH') or die();

/**
 * Plugin Name: KK-UPDATE-CONTROL
 * Description: Use the WordPress plugin KK-UPDATE-CONTROL to disable automatic core updates or auto-updates for plugins, themes and translations. Each type of update is set separately.
 * Version: 1.3.0
 * Author: Kai Krannich
 * Author URI:  https://www.linkedin.com/in/kaikrannich
 * License: GPLv2 or later
 * Text Domain: kk-update-control
 * Domain Path: /languages
 */

/**
 * Set the activation hook for the plugin
 * 
 * @author Kai Krannich
 * 
 * @since 1.0.0
 */
register_activation_hook(__FILE__, 'kk_uc_activation');

/**
 * Set the deactivation hook for the plugin
 * 
 * @author Kai Krannich
 * 
 * @since 1.0.0
 */
register_deactivation_hook(__FILE__, 'kk_uc_deactivation');

/**
 * Set the uninstallation hook for the plugin
 * 
 * @author Kai Krannich
 * 
 * @since 1.0.0
 */
register_uninstall_hook(__FILE__, 'kk_uc_uninstall');

/**
 * Get a URL within the plugins directory
 * 
 * @param string $path
 * 
 * @return string
 */
function kk_uc_get_plugin_url($path = '') {
    return plugins_url($path, __FILE__);
}

/**
 * Get the path to the plugin file relative to the plugins directory
 * 
 * @param string $path
 * 
 * @return string
 */
function kk_uc_get_plugin_file() {
    return plugin_basename(__FILE__);
}

/**
 * Require all functions
 * 
 * @author Kai Krannich
 * 
 * @since 1.0.0
 */
require_once( 'includes/functions/all.php' );
