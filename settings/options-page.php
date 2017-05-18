<?php
require_once dirname(__FILE__) . "/../general-helpers.php";

function tinymce_enterprise_settings_page() {
?>
<div class="wrap">
    <h2 style="padding-bottom:20px;">TinyMCE Cloud Pro</h2>
</div>
<form method="post" action="options.php">
    <?php
    settings_fields('tinymce-enterprise-settings-group');
    $tinymce_enterprise_options = get_option('tinymce_enterprise_options');
    require "plugin-settings/api-key.php";
    ?>
    <h3 style="padding-top: 25px;">Please activate each of the TinyMCE Cloud Pro extensions you have purchased by clicking on the box next to "Enable."</h3>
    <?php
    require "plugin-settings/a11y.php";
    require "plugin-settings/advcode.php";
//    require "plugin-settings/linkchecker.php";
    require "plugin-settings/media-embed.php";
    require "plugin-settings/powerpaste.php";
    require "plugin-settings/spelling.php";
    ?>
    <p class="submit">
        <input type="submit" class="button-primary" value="Save Changes"/>
    </p>
</form>
<?php
}
?>