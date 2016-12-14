<?php
/* Add the TinyMCE Enterprise PowerPaste Plugin */
add_filter('tiny_mce_before_init', 'disable_paste_plugin', 1001);
add_filter('tiny_mce_before_init', 'add_powerpaste_options', 1002);
//add_filter('mce_buttons', 'add_a11y_button', 1003);

//Inject the TinyMCE Cloud script one time
add_action( 'wp_tiny_mce_init', function () {
    $tinymce_enterprise_settings = get_option('tinymce_enterprise_options');
    $urlForCloud = "http://cloud.tinymce.com/4/plugins.min.js?apiKey=" . $tinymce_enterprise_settings['api_key'] . "\"";
    ?>
        <script src="<?php echo $urlForCloud ?>"></script>
    <?php
} );

//Need to remove standard paste plugin as you don't want both running...
function disable_paste_plugin($opt) {
    //Set button that will be show in row 1
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

//function add_a11y_button ($buttons) {
//    array_push($buttons, 'a11ycheck');
//    return $buttons;
//}

function add_powerpaste_options($opt) {
    $tinymce_enterprise_settings = get_option('tinymce_enterprise_options');
//    $uploads = wp_upload_dir();
//    $upload_path = $uploads['path'];
//    $upload_url = $uploads['url'];
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

    $opt['images_upload_url'] = plugins_url() . '/powerpaste-wordpress/imageHandler.php?postid=' . urlencode($post_id);

//    $opt['images_upload_url'] = plugins_url() . '/powerpaste-wordpress/imageHandler.php?path='
//        . urlencode($upload_path) . '&url=' . urlencode($upload_url) . '&postid=' . urlencode($post_id);

    // By default WordPress strips all inline styles (TinyMCE plugin - 'wordpress') from
    // the pasted content, screwing a formatting that we are trying to preserve (TINY-634)
    $opt['wp_paste_filters'] = false;

    return $opt;
}
/* End add the TinyMCE Enterprise PowerPaste Plugin */

?>