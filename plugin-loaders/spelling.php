<?php

add_filter('tiny_mce_before_init', 'add_spelling_plugin', 1000);
add_filter('mce_buttons', 'add_spelling_button', 1001);

//Add Spellchecker Pro plugin
function add_spelling_plugin($opt) {
    $pluginList = $opt['plugins'];

    //Add accessibilty checker to the plugin list
    $pluginList = "tinymcespellchecker," . $pluginList;

    //Update array with the new string list of plugins
    $opt['plugins'] = $pluginList;
    return $opt;
}

function add_spelling_button ($buttons) {
    array_push($buttons, 'spellchecker');
    return $buttons;
}

//TODO:  spellchecker_language: 'en' - allow people to select language default

?>