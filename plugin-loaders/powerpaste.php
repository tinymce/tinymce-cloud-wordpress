<?php
error_log('In plugin-loaders/powerpaste.php');
/* Add the TinyMCE Enterprise PowerPaste Plugin */
add_filter('mce_external_plugins', 'add_powerpaste_plugin', 1000);
add_filter('tiny_mce_before_init', 'disable_paste_plugin', 1001);
add_filter('tiny_mce_before_init', 'add_powerpaste_options', 1002);

function add_powerpaste_plugin ($mce_plugins) {
    $plugins = array('powerpaste'); //Add any more plugins you want to load here

    //Build the response - the key is the plugin name, value is the URL to the plugin JS
    foreach ($plugins as $plugin ) {
        $mce_plugins[ $plugin ] = plugins_url( 'plugins/' . $plugin . '/plugin.js', dirname(__FILE__));
    }
    return $mce_plugins;
}

//Need to remove standard paste plugin as you don't want both running...
function disable_paste_plugin($opt) {
    //set button that will be show in row 1
    $noPaste = str_replace("paste", "", $opt['plugins']);
    $noPaste = str_replace(",,", ",", $noPaste);
    $opt['plugins'] = $noPaste;
    return $opt;
}

function add_powerpaste_options($opt) {
    $tinymce_enterprise_settings = get_option('tinymce_enterprise_options');
    $uploads = wp_upload_dir();
    $upload_path = $uploads['path'];
    $upload_url = $uploads['url'];
    global $post;
    $post_id = $post->ID;
    if($tinymce_enterprise_settings['powerpaste_word_import']) {
        $opt['powerpaste_word_import'] = $tinymce_enterprise_settings['powerpaste_word_import'];
    } else {
        $opt['powerpaste_word_import'] = 'clean';
    }
    if($tinymce_enterprise_settings['powerpaste_html_import']) {
        $opt['powerpaste_html_import'] = $tinymce_enterprise_settings['powerpaste_html_import'];
    } else {
        $opt['powerpaste_html_import'] = 'merge';
    }
    if($tinymce_enterprise_settings['powerpaste_block_drop']) {
        $opt['powerpaste_block_drop'] = $tinymce_enterprise_settings['powerpaste_block_drop'];
    } else {
        $opt['powerpaste_block_drop'] = false;
    }
    if($tinymce_enterprise_settings['powerpaste_allow_local_images']) {
        $opt['powerpaste_allow_local_images'] = $tinymce_enterprise_settings['powerpaste_allow_local_images'];
    } else {
        $opt['powerpaste_allow_local_images'] = true;

    }

    $opt['images_upload_url'] = plugins_url() . '/powerpaste-wordpress/imageHandler.php?path='
        . urlencode($upload_path) . '&url=' . urlencode($upload_url) . '&postid=' . urlencode($post_id);

    return $opt;
}
/* End add the TinyMCE Enterprise PowerPaste Plugin */

?>