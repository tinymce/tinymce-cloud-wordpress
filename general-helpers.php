<?php
function getValidPlugins() {
//    global $wp_version;
    $validPlugins = array('powerpaste');
    return $validPlugins;
}

function shouldLoadPlugin($name, $validPlugins, $rootDirForEntPlugins, $tinymce_enterprise_options) {
    $isEnabled = false;
    $keyToCheck = 'enable_' . $name;
    if ($tinymce_enterprise_options[$keyToCheck]) {
        $isEnabled = $tinymce_enterprise_options[$keyToCheck] == 'on';
    }
    $shouldLoadThePlugin = $isEnabled && isPluginValidForWPVersion($name, $validPlugins, $rootDirForEntPlugins);

    return $shouldLoadThePlugin;
}

function isPluginValidForWPVersion($name, $validPlugins, $rootDirForEntPlugins) {
    $pluginFolderExists = file_exists($rootDirForEntPlugins . $name);
    $isValidForWPVersion = in_array($name, $validPlugins);
    return $pluginFolderExists && $isValidForWPVersion;
}
?>