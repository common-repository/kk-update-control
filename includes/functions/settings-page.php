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
 * Add submenu page to the settings main menu
 * 
 * @author Kai Krannich
 * 
 * @since 1.0.0
 * 
 * @return void
 */
function kk_uc_add_settings_page() {
    $settings_page = add_options_page(
            __('KK-UPDATE-CONTROL settings', 'kk-update-control'),
            __('KK-UPDATE-CONTROL', 'kk-update-control'),
            'manage_options',
            'kk_uc_settings',
            'kk_uc_get_settings_page'
    );
}

/**
 * Add callback function to action hook fired before the administration menu loads in the admin
 * 
 * @author Kai Krannich
 * 
 * @since 1.0.0
 */
add_action('admin_menu', 'kk_uc_add_settings_page');

/**
 * Output the content for the settings page
 * 
 * @author Kai Krannich
 * 
 * @since 1.0.0
 * 
 * @return void
 */
function kk_uc_get_settings_page() {
    $errors = new WP_Error();
    if (!current_user_can('manage_options')) {
        $errors->add(
                'unauthorized',
                esc_html__('An error has occurred.', 'kk-update-control'),
                array(
                    'file' => __FILE__,
                    'function' => __FUNCTION__,
                    'line' => __LINE__
                )
        );
        do_action('kk_error', $errors);
        return;
    }
    include(plugin_dir_path(__FILE__) . '../templates/settings-page.php');
}

/**
 * Initionalize settings
 * 
 * @author Kai Krannich
 * 
 * @since 1.0.0
 * 
 * @return void
 */
function kk_uc_init_settings() {
    // Core
    add_settings_section(
            'kk_uc_core',
            __('Core', 'kk-update-control'),
            'kk_uc_get_core_section_intro',
            'kk_uc_settings'
    );
    register_setting(
            'kk_uc_settings',
            'kk_uc_core_default_disable'
    );
    add_settings_field(
            'kk_uc_core_default_disable',
            __('Default for core', 'kk-update-control'),
            'kk_uc_get_core_default_disable_field',
            'kk_uc_settings',
            'kk_uc_core'
    );
    // Plugins
    add_settings_section(
            'kk_uc_plugins',
            __('Plugins', 'kk-update-control'),
            'kk_uc_get_plugins_section_intro',
            'kk_uc_settings'
    );
    register_setting(
            'kk_uc_settings',
            'kk_uc_plugins_default_disable'
    );
    add_settings_field(
            'kk_uc_plugins_default_disable',
            __('Default for plugins', 'kk-update-control'),
            'kk_uc_get_plugins_default_disable_field',
            'kk_uc_settings',
            'kk_uc_plugins'
    );
    // Themes
    add_settings_section(
            'kk_uc_themes',
            __('Themes', 'kk-update-control'),
            'kk_uc_get_themes_section_intro',
            'kk_uc_settings'
    );
    register_setting(
            'kk_uc_settings',
            'kk_uc_themes_default_disable'
    );
    add_settings_field(
            'kk_uc_themes_default_disable',
            __('Default for themes', 'kk-update-control'),
            'kk_uc_get_themes_default_disable_field',
            'kk_uc_settings',
            'kk_uc_themes'
    );
    // Translations
    add_settings_section(
            'kk_uc_translations',
            __('Translations', 'kk-update-control'),
            'kk_uc_get_translations_section_intro',
            'kk_uc_settings'
    );
    register_setting(
            'kk_uc_settings',
            'kk_uc_translations_default_disable'
    );
    add_settings_field(
            'kk_uc_translations_default_disable',
            __('Default for translations', 'kk-update-control'),
            'kk_uc_get_translations_default_disable_field',
            'kk_uc_settings',
            'kk_uc_translations'
    );
}

/**
 * Add callback function to action hook fired as an admin screen or script is being initialized
 * 
 * @author Kai Krannich
 * 
 * @since 1.0.0
 */
add_action('admin_init', 'kk_uc_init_settings');

/**
 * Output settings section intro for core
 * 
 * @author Kai Krannich
 * 
 * @since 1.0.0
 * 
 * @return void
 */
function kk_uc_get_core_section_intro() {
    echo '<p>' . esc_html__('Set automatic core updates.', 'kk-update-control') . '</p>';
}

/**
 * Output settings field for core default
 * 
 * @author Kai Krannich
 * 
 * @since 1.0.0
 * 
 * @param array $args
 * 
 * @return void
 */
function kk_uc_get_core_default_disable_field($args) {
    $option = get_option('kk_uc_core_default_disable');
    echo '<label for="kk_uc_core_default_disable"><input type="checkbox" id="kk_uc_core_default_disable" name="kk_uc_core_default_disable" value="1" ' . checked($option, 1, false) . ' /> ' . esc_html__('Disable automatic core updates by default', 'kk-update-control') . '</label>';
}

/**
 * Output settings section intro for plugins
 * 
 * @author Kai Krannich
 * 
 * @since 1.0.0
 * 
 * @return void
 */
function kk_uc_get_plugins_section_intro() {
    echo '<p>' . esc_html__('Set automatic updates for plugins.', 'kk-update-control') . '</p>';
}

/**
 * Output settings field for plugins default
 * 
 * @author Kai Krannich
 * 
 * @since 1.0.0
 * 
 * @param array $args
 * 
 * @return void
 */
function kk_uc_get_plugins_default_disable_field($args) {
    $option = get_option('kk_uc_plugins_default_disable');
    echo '<label for="kk_uc_plugins_default_disable"><input type="checkbox" id="kk_uc_plugins_default_disable" name="kk_uc_plugins_default_disable" value="1" ' . checked($option, 1, false) . ' /> ' . esc_html__('Disable automatic updates for all plugins by default', 'kk-update-control') . '</label>';
}

/**
 * Output settings section intro for themes
 * 
 * @author Kai Krannich
 * 
 * @since 1.0.0
 * 
 * @return void
 */
function kk_uc_get_themes_section_intro() {
    echo '<p>' . esc_html__('Set automatic updates for themes.', 'kk-update-control') . '</p>';
}

/**
 * Output settings field for themes default
 * 
 * @author Kai Krannich
 * 
 * @since 1.0.0
 * 
 * @param array $args
 * 
 * @return void
 */
function kk_uc_get_themes_default_disable_field($args) {
    $option = get_option('kk_uc_themes_default_disable');
    echo '<label for="kk_uc_themes_default_disable"><input type="checkbox" id="kk_uc_themes_default_disable" name="kk_uc_themes_default_disable" value="1" ' . checked($option, 1, false) . ' /> ' . esc_html__('Disable automatic updates for all themes by default', 'kk-update-control') . '</label>';
}

/**
 * Output settings section intro for translations
 * 
 * @author Kai Krannich
 * 
 * @since 1.0.0
 * 
 * @return void
 */
function kk_uc_get_translations_section_intro() {
    echo '<p>' . esc_html__('Set automatic updates for translations.', 'kk-update-control') . '</p>';
}

/**
 * Output settings field for translations default
 * 
 * @author Kai Krannich
 * 
 * @since 1.0.0
 * 
 * @param array $args
 * 
 * @return void
 */
function kk_uc_get_translations_default_disable_field($args) {
    $option = get_option('kk_uc_translations_default_disable');
    echo '<label for="kk_uc_translations_default_disable"><input type="checkbox" id="kk_uc_translations_default_disable" name="kk_uc_translations_default_disable" value="1" ' . checked($option, 1, false) . ' /> ' . esc_html__('Disable automatic updates for all translations by default', 'kk-update-control') . '</label>';
}
