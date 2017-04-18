<?php

add_filter('tiny_mce_before_init', 'add_a11y_plugin', 1000);
add_filter('mce_buttons', 'add_a11y_button', 1001);

//Add A11Y plugin
function add_a11y_plugin($opt) {
    $pluginList = $opt['plugins'];

    //Add accessibilty checker to the plugin list
    $pluginList = "a11ychecker," . $pluginList;

    //Update array with the new string list of plugins
    $opt['plugins'] = $pluginList;
    return $opt;
}

function add_a11y_button ($buttons) {
    array_push($buttons, 'a11ycheck');
    return $buttons;
}

?>