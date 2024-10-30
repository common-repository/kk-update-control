<?php
/**
 * @author Kai Krannich
 * 
 * @since 1.2.0 @return in documentation comment of function kk_uc_add_action_links changed to array
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
 * Add actions links
 * 
 * @author Kai Krannich
 * 
 * @since 1.0.0
 * 
 * @param array $actions
 * 
 * @return array
 */
function kk_uc_add_action_links($actions) {
    $pre_actions = array(
        '<a href="' . esc_url(menu_page_url('kk_uc_settings', false)) . '">' . esc_html__('Settings', 'kk-update-control') . '</a>'
    );
    return array_merge($pre_actions, $actions);
}

/**
 * Add callback function to filter hook filtering the list of action links displayed for a specific plugin in the Plugins list table
 * 
 * @author Kai Krannich
 * 
 * @since 1.0.0
 */
add_filter('plugin_action_links_' . kk_uc_get_plugin_file(), 'kk_uc_add_action_links');
