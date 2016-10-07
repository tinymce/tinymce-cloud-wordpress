<?php
require_once dirname(__FILE__) . "/../general-helpers.php";

function tinymce_enterprise_settings_page() {
?>
<div class="wrap">
    <h2 style="padding-bottom:20px;">TinyMCE Enterprise Plugins - Options</h2>
</div>
<form method="post" action="options.php">
    <?php
    settings_fields('tinymce-enterprise-settings-group');
    $tinymce_enterprise_options = get_option('tinymce_enterprise_options');
    $rootDirForEntPlugins = plugin_dir_path(__DIR__) . 'plugins/';
    $validPlugins = getValidPlugins();

    $pp_name = 'powerpaste';
    $ac_name = 'a11ychecker';
    $am_name = 'mentions';
    $sp_name = 'tinymcespellchecker';
    $advcode_name = 'advcode';
    $cs_name = 'codesample';

    $ppFolderExists = file_exists($rootDirForEntPlugins . $pp_name);
    $acFolderExists = file_exists($rootDirForEntPlugins . $ac_name);
    $amFolderExists = file_exists($rootDirForEntPlugins . $am_name);
    $spFolderExists = file_exists($rootDirForEntPlugins . $sp_name);
    $advcodeFolderExists = file_exists($rootDirForEntPlugins . $advcode_name);
    $csFolderExists = file_exists($rootDirForEntPlugins . $cs_name);
    $noPluginFoldersPresent = !($ppFolderExists || $acFolderExists || $amFolderExists || $spFolderExists || $advcodeFolderExists || $csFolderExists);

    if ($noPluginFoldersPresent) {
        require "plugin-settings/no-plugins-found.php";
    } else {
        if (isPluginValidForWPVersion($pp_name, $validPlugins, $rootDirForEntPlugins)) {
            require "plugin-settings/powerpaste.php";
        }
        if (isPluginValidForWPVersion($ac_name, $validPlugins, $rootDirForEntPlugins)) {
            require "plugin-settings/accessibilitychecker.php";
        }
        if (isPluginValidForWPVersion($am_name, $validPlugins, $rootDirForEntPlugins)) {
            require "plugin-settings/mentions.php";
        }
        if (isPluginValidForWPVersion($sp_name, $validPlugins, $rootDirForEntPlugins)) {
            require "plugin-settings/spellchecker.php";
        }
        if (isPluginValidForWPVersion($advcode_name, $validPlugins, $rootDirForEntPlugins)) {
            require "plugin-settings/advcode.php";
        }
        if (isPluginValidForWPVersion($cs_name, $validPlugins, $rootDirForEntPlugins)) {
            require "plugin-settings/codesample.php";
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