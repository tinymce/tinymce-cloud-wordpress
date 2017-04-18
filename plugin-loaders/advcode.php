<?php

add_filter('tiny_mce_before_init', 'add_advcode_plugin', 2000);
add_filter( 'mce_external_plugins', 'remove_code_plugin', 2002 );
add_filter('mce_buttons_2', 'remove_code_button', 2000);
add_filter('mce_buttons_3', 'remove_code_button', 2000);
add_filter('mce_buttons_4', 'remove_code_button', 2000);
add_filter('mce_buttons', 'add_advcode_button', 2001);

//Add Advanced Code plugin
function add_advcode_plugin($opt) {
    $pluginList = $opt['plugins'];

    //Add accessibilty checker to the plugin list
    $pluginList = "advcode," . $pluginList;

    //Update array with the new string list of plugins
    $opt['plugins'] = $pluginList;
    return $opt;
}

function remove_code_plugin($mcePlugins) {

    //If the paste plugin is loading remove it
    if (array_key_exists('code', $mcePlugins)) {
        unset($mcePlugins['code']);
    }

    //Update array with the new string list of plugins

    return $mcePlugins;
}

function add_advcode_button ($buttons) {
    if (array_key_exists('code', $buttons)) {
        //Nothing to add...
    } else {
        array_push($buttons, 'code');
    }
    return $buttons;
}

function remove_code_button( $buttons ) {
    //Remove the format dropdown select and text color selector
    $remove = array('code');

    return array_diff( $buttons, $remove );
}

?>