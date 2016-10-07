<?php
require_once dirname(__FILE__) . "/../general-helpers.php";

function tinymce_enterprise_settings_page() {
?>
<div class="wrap">
    <h2 style="padding-bottom:20px;">TinyMCE PowerPaste for WordPress - Options</h2>
</div>
<form method="post" action="options.php">
    <?php
    settings_fields('tinymce-enterprise-settings-group');
    $tinymce_enterprise_options = get_option('tinymce_enterprise_options');
    $rootDirForEntPlugins = plugin_dir_path(__DIR__) . 'plugins/';
    $validPlugins = getValidPlugins();

    $pp_name = 'powerpaste';
    $ppFolderExists = file_exists($rootDirForEntPlugins . $pp_name);
    $noPluginFolderPresent = !($ppFolderExists);

    if ($noPluginFolderPresent) {
        require "plugin-settings/no-plugins-found.php";
    } else {
        if (isPluginValidForWPVersion($pp_name, $validPlugins, $rootDirForEntPlugins)) {
            require "plugin-settings/powerpaste.php";
        }
    }
    ?>
    <p class="submit">
        <input type="submit" class="button-primary" value="Save Changes" <?php if ($noPluginFoldersPresent) echo 'disabled'; ?>/>
    </p>
</form>
<?php
}
?>