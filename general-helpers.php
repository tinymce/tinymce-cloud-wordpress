<?php

function shouldLoadPlugin($name, $tinymce_enterprise_options) {
    $isEnabled = false;
    $keyToCheck = 'enable_' . $name;
    if (array_key_exists($keyToCheck, $tinymce_enterprise_options)) {
        $isEnabled = $tinymce_enterprise_options[$keyToCheck] == 'on';
    }

    return $isEnabled;
}

function is474OrNewer() {
    $wpVersion = get_bloginfo('version');
    if (version_compare($wpVersion, '4.7.4') >= 0) {
        return true;
    } else {
        return false;
    }
}
?>