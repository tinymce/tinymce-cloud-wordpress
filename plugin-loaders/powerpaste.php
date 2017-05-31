<?php

add_filter('tiny_mce_before_init', 'disable_paste_plugin', 1001);
add_filter('tiny_mce_before_init', 'add_powerpaste_options', 1002);

//Need to remove standard paste plugin as you don't want both running...
function disable_paste_plugin($opt) {

    $noPaste = $opt['plugins'];
    //If the paste plugin is loading remove it
    $noPaste = str_replace("paste", "", $noPaste);
    $noPaste = str_replace(",,", ",", $noPaste);

    //Add powerpaste to the plugin list
    $noPaste = "powerpaste," . $noPaste;

    //Update array with the new string list of plugins
    $opt['plugins'] = $noPaste;
    return $opt;
}

function add_powerpaste_options($opt) {
    $tinymce_enterprise_settings = get_option('tinymce_enterprise_options');
//    $uploads = wp_upload_dir();
//    $upload_path = $uploads['path'];
//    $upload_url = $uploads['url'];
    global $post;
    $post_id = $post->ID;

    //array_key_exists('enable_powerpaste', $tinymce_enterprise_settings)
    if(array_key_exists('powerpaste_word_import', $tinymce_enterprise_settings)) {
        $opt['powerpaste_word_import'] = $tinymce_enterprise_settings['powerpaste_word_import'];
    } else {
        $opt['powerpaste_word_import'] = 'clean';
    }
    if(array_key_exists('powerpaste_html_import', $tinymce_enterprise_settings)) {
        $opt['powerpaste_html_import'] = $tinymce_enterprise_settings['powerpaste_html_import'];
    } else {
        $opt['powerpaste_html_import'] = 'merge';
    }
    if(array_key_exists('powerpaste_block_drop', $tinymce_enterprise_settings)) {
        if($tinymce_enterprise_settings['powerpaste_block_drop'] == "true") {
//            $opt['powerpaste_block_drop'] = $tinymce_enterprise_settings['powerpaste_block_drop'];
            $opt['powerpaste_block_drop'] = true;
        } else {
            $opt['powerpaste_block_drop'] = false;
        }
    } else {
        $opt['powerpaste_block_drop'] = false;
    }
    if(array_key_exists('powerpaste_allow_local_images', $tinymce_enterprise_settings)) {
        if($tinymce_enterprise_settings['powerpaste_allow_local_images'] == "false") {
//            $opt['powerpaste_allow_local_images'] = $tinymce_enterprise_settings['powerpaste_allow_local_images'];
            $opt['powerpaste_allow_local_images'] = false;
        } else {
            $opt['powerpaste_allow_local_images'] = true;
        }
    } else {
        $opt['powerpaste_allow_local_images'] = true;
    }

    $opt['images_upload_url'] = plugins_url() . '/tmce-wordpress-cloud/imageHandler.php?postid=' . urlencode($post_id);

//    $opt['images_upload_url'] = plugins_url() . '/powerpaste-wordpress-cloud/imageHandler.php?path='
//        . urlencode($upload_path) . '&url=' . urlencode($upload_url) . '&postid=' . urlencode($post_id);

    // By default WordPress strips all inline styles (TinyMCE plugin - 'wordpress') from
    // the pasted content, messing up a formatting that we are trying to preserve (TINY-634)
    $opt['wp_paste_filters'] = false;

    return $opt;
}

?>