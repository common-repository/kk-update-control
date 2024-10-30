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
 * Set automatic updates for core
 * 
 * @author Kai Krannich
 * 
 * @since 1.0.0
 * 
 * @param boolean|null $update
 * @param object $item
 * 
 * @return boolean|int
 */
function kk_uc_auto_update_core($update, $item) {
    $option = get_option('kk_uc_core_default_disable');
    if ($option === '1') {
        return false;
    }
    return $update;
}

/**
 * Add callback function to filter hook filtering whether to automatically update core
 * 
 * @author Kai Krannich
 * 
 * @since 1.0.0
 */
add_filter('auto_update_core', 'kk_uc_auto_update_core', 10, 2);

/**
 * Set automatic updates for plugins
 * 
 * @author Kai Krannich
 * 
 * @since 1.0.0
 * 
 * @param boolean|null $update
 * @param object $item
 * 
 * @return boolean|int
 */
function kk_uc_auto_update_plugins($update, $item) {
    $option = get_option('kk_uc_plugins_default_disable');
    if ($option === '1') {
        return false;
    }
    return $update;
}

/**
 * Add callback function to filter hook filtering whether to automatically update a plugin
 * 
 * @author Kai Krannich
 * 
 * @since 1.0.0
 */
add_filter('auto_update_plugin', 'kk_uc_auto_update_plugins', 10, 2);

/**
 * Set automatic updates for themes
 * 
 * @author Kai Krannich
 * 
 * @since 1.0.0
 * 
 * @param boolean|null $update
 * @param object $item
 * 
 * @return boolean|int
 */
function kk_uc_auto_update_themes($update, $item) {
    $option = get_option('kk_uc_themes_default_disable');
    if ($option === '1') {
        return false;
    }
    return $update;
}

/**
 * Add callback function to filter hook filtering whether to automatically update a theme
 * 
 * @author Kai Krannich
 * 
 * @since 1.0.0
 */
add_filter('auto_update_theme', 'kk_uc_auto_update_themes', 10, 2);

/**
 * Set automatic updates for translations
 * 
 * @author Kai Krannich
 * 
 * @since 1.0.0
 * 
 * @param boolean|null $update
 * @param object $item
 * 
 * @return boolean|int
 */
function kk_uc_auto_update_translations($update, $item) {
    $option = get_option('kk_uc_translations_default_disable');
    if ($option === '1') {
        return false;
    }
    return $update;
}

/**
 * Add callback function to filter hook filtering whether to automatically update a translation
 * 
 * @author Kai Krannich
 * 
 * @since 1.0.0
 */
add_filter('auto_update_translation', 'kk_uc_auto_update_translations', 10, 2);
