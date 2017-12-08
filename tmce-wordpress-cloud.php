<?php
/*
Plugin Name: TinyMCE Cloud
Plugin URI: https://www.tinymce.com/wordpress
Description: Turbocharge your content creation experience with premium tools enabling clean copy and paste, embedded media previews, as-you-type spell checking, accessibility best practices, and a more IDE-like code viewer.
Version: 1.2
Author: Ephox
Author URI: https://www.tinymce.com/wordpress
Text Domain: tinymce_cloud_wordpress
*/

if ( ! defined( 'TENTP_URL' ) ) define( 'TENTP_URL', plugin_dir_url( __FILE__ ) );

/* Activation */
register_activation_hook(__FILE__, 'tinymce_enterprise_activate');

function tinymce_enterprise_activate () {
    //create defaults for settings
    $tinymce_enterprise_options_array = array(
        'version' => '1.1',
        'api_key' => '',
        'enable_powerpaste' => 'off',
        'powerpaste_word_import' => 'prompt',
        'powerpaste_html_import' => 'merge',
        'powerpaste_block_drop' => 'false',
        'powerpaste_allow_local_images' => 'true',
        'enable_a11y' => 'off',
        'enable_advcode' => 'off',
        'enable_linkchecker' => 'off',
        'enable_mediaembed' => 'off',
        'enable_spellcheck' => 'off'
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
    add_options_page('TinyMCE Cloud Settings', 'TinyMCE Cloud', 'manage_options', 'tmce_cloud', 'tinymce_enterprise_settings_page');
    add_action('admin_init', 'tinymce_enterprise_register_settings');
}


function tinymce_enterprise_register_settings () {
    register_setting('tinymce-enterprise-settings-group', 'tinymce_enterprise_options');
}
/* End Settings Page */


/* Add link to plugin desc that points to settings */
function plugin_add_settings_link( $links ) {
    $settings_link = '<a href="options-general.php?page=tmce_cloud">' . __( 'Settings' ) . '</a>';
    array_push( $links, $settings_link );
    return $links;
}
$plugin = plugin_basename( __FILE__ );
add_filter( "plugin_action_links_" . $plugin, 'plugin_add_settings_link' );

/* Fix WP 4.9 admin page header policy change - https://developer.wordpress.org/reference/hooks/admin_referrer_policy/ */
if (isAtLeastVersion('4.9.0')) {
    add_filter( 'admin_referrer_policy', function(){
        // return 'origin';
        return 'strict-origin-when-cross-origin';
    });
}


/* Which plugins do we actually load */
require_once "general-helpers.php";
//$tinymce_enterprise_options = get_option('tinymce_enterprise_options');
$tinymce_enterprise_options = get_option('tinymce_enterprise_options') ? get_option('tinymce_enterprise_options') : array();

// Always need to load the actual JavaScript code from the cloud server
require "plugin-loaders/script-loader.php";

// What plugins are enabled and available based on WP version?
if(shouldLoadPlugin('powerpaste', $tinymce_enterprise_options)){
    require "plugin-loaders/powerpaste.php";
}
if(shouldLoadPlugin('a11y', $tinymce_enterprise_options)){
    require "plugin-loaders/a11y.php";
}
if(shouldLoadPlugin('advcode', $tinymce_enterprise_options)){
    require "plugin-loaders/advcode.php";
}
//if(shouldLoadPlugin('linkchecker', $tinymce_enterprise_options)){
//    require "plugin-loaders/linkchecker.php";
//}

if(shouldLoadPlugin('mediaembed', $tinymce_enterprise_options) && (isAtLeastVersion('4.7.0'))){
    require "plugin-loaders/media-embed.php";
}
if(shouldLoadPlugin('spellcheck', $tinymce_enterprise_options) && (isAtLeastVersion('4.7.0'))){
    require "plugin-loaders/spelling.php";
}

?>