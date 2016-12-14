<?php
/*
Plugin Name: TinyMCE PowerPaste
Plugin URI: https://www.ephox.com/tinymce/powerpaste-for-wordpress/
Description: PowerPaste cleans content copied from Microsoft Word and the internet so that when you paste the content into WordPress it automatically matches the look and feel of your website. If your content contains images, PowerPaste will include the images and upload them to your Media Library. PowerPaste can also be configured to maintain the styling of your original content.
Version: 1.0
Author: Ephox
Author URI: https://www.ephox.com/
Text Domain: powerpaste_wordpress
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
        'version' => '1.0',
        'api_key' => '',
        'enable_powerpaste' => 'on',
        'powerpaste_word_import' => 'clean',
        'powerpaste_html_import' => 'merge',
        'powerpaste_block_drop' => false,
        'powerpaste_allow_local_images' => true
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
    add_options_page('TinyMCE PowerPaste Settings Page', 'TinyMCE (Cloud) PowerPaste', 'manage_options', 'powerpaste_wordpress', 'tinymce_enterprise_settings_page');
    add_action('admin_init', 'tinymce_enterprise_register_settings');
}


function tinymce_enterprise_register_settings () {
    register_setting('tinymce-enterprise-settings-group', 'tinymce_enterprise_options');
}
/* End Settings Page */


/* Add link to plugin desc that points to settings */
function plugin_add_settings_link( $links ) {
    $settings_link = '<a href="options-general.php?page=powerpaste_wordpress">' . __( 'Settings' ) . '</a>';
    array_push( $links, $settings_link );
    return $links;
}
$plugin = plugin_basename( __FILE__ );
add_filter( "plugin_action_links_" . $plugin, 'plugin_add_settings_link' );

/* Which plugins do we actually load - only PowerPaste an option right now */
require_once "general-helpers.php";
$tinymce_enterprise_options = get_option('tinymce_enterprise_options');
if(shouldLoadPlugin('powerpaste', $tinymce_enterprise_options)){
    require "plugin-loaders/powerpaste.php";
}

?>