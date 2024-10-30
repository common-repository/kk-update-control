<?php
/**
 * @author Kai Krannich
 * 
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
 * Load translated strings
 * 
 * @author Kai Krannich
 * 
 * @since 1.0.0
 * 
 * @return void
 */
function kk_uc_load_textdomain() {
    load_plugin_textdomain('kk-update-control', false, 'kk-update-control/languages');
}

/**
 * Add callback function to action hook fired after WordPress has finished loading but before any headers are sent
 * 
 * @author Kai Krannich
 * 
 * @since 1.0.0
 */
add_action('init', 'kk_uc_load_textdomain');

/**
 * Call dummy gettext
 * 
 * @author Kai Krannich
 * 
 * @since 1.0.0
 */
__('Use the WordPress plugin KK-UPDATE-CONTROL to disable automatic core updates or auto-updates for plugins, themes and translations. Each type of update is set separately.', 'kk-update-control');
