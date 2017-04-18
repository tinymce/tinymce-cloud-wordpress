<?php

add_filter('tiny_mce_before_init', 'add_linkchecker_plugin', 1000);

//Add Link Checker plugin
function add_linkchecker_plugin($opt) {
    $pluginList = $opt['plugins'];

    //Add link checker checker to the plugin list
    $pluginList = "linkchecker," . $pluginList;

    //Update array with the new string list of plugins
    $opt['plugins'] = $pluginList;
    return $opt;
}

?>