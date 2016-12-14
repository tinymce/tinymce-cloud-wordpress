<?php
require_once dirname(__FILE__) . "/../general-helpers.php";

function tinymce_enterprise_settings_page() {
?>
<div class="wrap">
    <h2 style="padding-bottom:20px;">TinyMCE PowerPaste</h2>
</div>
<form method="post" action="options.php">
    <?php
    settings_fields('tinymce-enterprise-settings-group');
    $tinymce_enterprise_options = get_option('tinymce_enterprise_options');

    require "plugin-settings/powerpaste.php";
    ?>
    <p class="submit">
        <input type="submit" class="button-primary" value="Save Changes"/>
    </p>
</form>
<?php
}
?>