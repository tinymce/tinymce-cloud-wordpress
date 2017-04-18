<?php

add_filter('tiny_mce_before_init', 'add_mediaembed_plugin', 1000);

//Add Enhanced Media Embedplugin
function add_mediaembed_plugin($opt) {
    $pluginList = $opt['plugins'];
    $mediaPlugin = 'media';

    //Media Embed requires the Media plugin...
    $pos = strpos($pluginList, $mediaPlugin);
    if ($pos === false) {
        $pluginList = "media," . $pluginList;
    }

    //Add link checker checker to the plugin list
    $pluginList = "mediaembed," . $pluginList;

    //Update array with the new string list of plugins
    $opt['plugins'] = $pluginList;
    return $opt;
}

?>