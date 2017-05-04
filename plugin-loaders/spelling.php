<?php

add_filter('tiny_mce_before_init', 'add_spelling_plugin', 1000);
add_filter('tiny_mce_before_init', 'remove_browserspellcheck_option', 1001);
//add_filter('mce_buttons', 'add_spelling_button', 1002);

//Add Spellchecker Pro plugin
function add_spelling_plugin($opt) {
    $pluginList = $opt['plugins'];

    //Add accessibilty checker to the plugin list
    $pluginList = "tinymcespellchecker," . $pluginList;

    //Update array with the new string list of plugins
    $opt['plugins'] = $pluginList;
    return $opt;
}

//TODO: browser_spellcheck: true - remove the default spelling configuration settting
function remove_browserspellcheck_option($opt) {

    // By default WordPress uses browser_spellcheck - we need to remove that from the TinyMCE configuration
    $opt['browser_spellcheck'] = false;

    return $opt;
}


//function add_spelling_button ($buttons) {
//    array_push($buttons, 'spellchecker');
//    return $buttons;
//}

//TODO: spellchecker_language: 'en' - allow people to select language default

?>