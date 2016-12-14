<?php

function shouldLoadPlugin($name, $tinymce_enterprise_options) {
    $isEnabled = false;
    $keyToCheck = 'enable_' . $name;
    if ($tinymce_enterprise_options[$keyToCheck]) {
        $isEnabled = $tinymce_enterprise_options[$keyToCheck] == 'on';
    }
    $shouldLoadThePlugin = $isEnabled;

    return $shouldLoadThePlugin;
}
?>