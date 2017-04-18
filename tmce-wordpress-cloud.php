<?php
/*
Plugin Name: TinyMCE Pro (Cloud)
Plugin URI: https://www.ephox.com/tinymce/???
Description: TinyMCE Pro provides additional functionality for the editor in WordPress.  For more details see:  http://www.ephox.com/tinymce/????
Version: 1.1
Author: Ephox
Author URI: https://www.ephox.com/
Text Domain: tinymce_pro_wordpress
*/

if ( ! defined( 'TENTP_URL' ) ) define( 'TENTP_URL', plugin_dir_url( __FILE__ ) );

/* Activation */
register_activation_hook(__FILE__, 'tinymce_enterprise_activate');

function tinymce_enterprise_activate () {
    //check WP version to ensure this is compatible with TinyMCE included?
//    global $wp_version;
//    if(version_compare($wp_version, '4.4.2', '<')) {
//        wp_die('This plugin requires WordPress 4.4.x or greater (TinyMCE v4.2.8) to function properly');
//    }
    //create defaults for settings
    $tinymce_enterprise_options_array = array(
        'version' => '1.1',
        'api_key' => '',
        'enable_powerpaste' => 'on',
        'powerpaste_word_import' => 'clean',
        'powerpaste_html_import' => 'merge',
        'powerpaste_block_drop' => false,
        'powerpaste_allow_local_images' => true,
        'enable_a11y' => 'on',
        'enable_advcode' => 'on',
        'enable_linkchecker' => 'on',
        'enable_mediaembed' => 'on',
        'enable_spellcheck' => 'on'
    );

    //Don't overwrite existing options if plugin was installed previously???
    //TODO: What to do on upgrade?  Perhaps store this plugin version in settings and add only new options?
    add_option('tinymce_enterprise_options', $tinymce_enterprise_options_array);
}

/* End Activation */

/* Deactivation */
register_deactivation_hook(__FILE__, 'tinymce_enterprise_deactivate');

function tinymce_enterprise_deactivate () {
    //TODO: Do we want to delete settings on deactivation?
    delete_option ('tinymce_enterprise_options');
}
/* End Deactivation */

/* Settings Page */
require "settings/options-page.php";

add_action('admin_menu', 'tinymce_enterprise_settings_submenu');
function tinymce_enterprise_settings_submenu () {
    add_options_page('TinyMCE Pro Settings Page', 'TinyMCE Pro (Cloud)', 'manage_options', 'tmce_pro', 'tinymce_enterprise_settings_page');
    add_action('admin_init', 'tinymce_enterprise_register_settings');
}


function tinymce_enterprise_register_settings () {
    register_setting('tinymce-enterprise-settings-group', 'tinymce_enterprise_options');
}
/* End Settings Page */


/* Add link to plugin desc that points to settings */
function plugin_add_settings_link( $links ) {
    $settings_link = '<a href="options-general.php?page=tmce_pro">' . __( 'Settings' ) . '</a>';
    array_push( $links, $settings_link );
    return $links;
}
$plugin = plugin_basename( __FILE__ );
add_filter( "plugin_action_links_" . $plugin, 'plugin_add_settings_link' );

/* Which plugins do we actually load - only PowerPaste an option right now */
require_once "general-helpers.php";
$tinymce_enterprise_options = get_option('tinymce_enterprise_options');

// Always need to load the script from the cloud server
require "plugin-loaders/script-loader.php";

// What plugins are enabled?
if(shouldLoadPlugin('powerpaste', $tinymce_enterprise_options)){
    require "plugin-loaders/powerpaste.php";
}
if(shouldLoadPlugin('a11y', $tinymce_enterprise_options)){
    require "plugin-loaders/a11y.php";
}
if(shouldLoadPlugin('advcode', $tinymce_enterprise_options)){
    require "plugin-loaders/advcode.php";
}
if(shouldLoadPlugin('linkchecker', $tinymce_enterprise_options)){
    require "plugin-loaders/linkchecker.php";
}
if(shouldLoadPlugin('mediaembed', $tinymce_enterprise_options)){
    require "plugin-loaders/media-embed.php";
}
if(shouldLoadPlugin('spellcheck', $tinymce_enterprise_options)){
    require "plugin-loaders/spelling.php";
}

?>