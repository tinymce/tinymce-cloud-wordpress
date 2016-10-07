<?php
function getValidPlugins() {
    global $wp_version;
    $validPlugins = array('powerpaste', 'tinymcespellchecker', 'codesample');
    if((strpos($wp_version, '4.4') !== false) && (strpos($wp_version, '4.4') == 0)) {
    //    No other plugins are available
    } else if((strpos($wp_version, '4.5') !== false) && (strpos($wp_version, '4.5') == 0)) {
        array_push($validPlugins, 'a11ychecker', 'mentions', 'advcode');
    }

    return $validPlugins;
}

function shouldLoadPlugin($name, $validPlugins, $rootDirForEntPlugins, $tinymce_enterprise_options) {
    $isEnabled = false;
    $keyToCheck = 'enable_' . $name;
//    error_log('IN HELPERS checking <' . $keyToCheck . '> $tinymce_enterprise_options object is of type:');
//    error_log(gettype($tinymce_enterprise_options));
//    error_log('$tinymce_enterprise_options[' . $keyToCheck . ']: ' . $tinymce_enterprise_options[$keyToCheck]);
//    if (array_key_exists($keyToCheck , $tinymce_enterprise_options)) {
//        $isEnabled = $tinymce_enterprise_options[$keyToCheck] == 'on';
//    }

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