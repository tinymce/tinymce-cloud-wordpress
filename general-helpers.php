<?php

function shouldLoadPlugin($name, $tinymce_enterprise_options) {
    $isEnabled = false;
    $keyToCheck = 'enable_' . $name;
    if (array_key_exists($keyToCheck, $tinymce_enterprise_options)) {
        $isEnabled = $tinymce_enterprise_options[$keyToCheck] == 'on';
    }

    return $isEnabled;
}

function isAtLeastVersion($version) {
    $wpVersion = get_bloginfo('version');
    if (version_compare($wpVersion, $version) >= 0) {
        return true;
    } else {
        return false;
    }
}
?>