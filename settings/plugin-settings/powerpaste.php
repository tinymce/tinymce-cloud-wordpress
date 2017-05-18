<?php require_once "settings-page-helpers.php"; ?>
<div style="margin-bottom: 20px; border: 2px solid #ccc; padding: 0 15px; width: 95%;">
    <h2 class="title">TinyMCE PowerPaste</h2>
    <p>For more details please see the
        <strong><a href="https://www.tinymce.com/docs/enterprise/paste-from-word/" target="_blank">product documentation</a></strong>
    </p>
    <table class="form-table">
        <tbody>
        <tr>
            <th style="width:40px;" scope="row">Enable:</th>
            <td colspan="3">
                <?php insert_checkbox('enable_powerpaste', array_key_exists('enable_powerpaste', $tinymce_enterprise_options) ? $tinymce_enterprise_options['enable_powerpaste'] : 'off'); ?>
            </td>
        </tr>
        </tbody>
    </table>
    <table class="form-table">
        <tbody>
        <tr>
            <th scope="row">Word Import:</th>
            <td>
                <?php
                $isEnabled = array_key_exists('enable_powerpaste', $tinymce_enterprise_options) ? $tinymce_enterprise_options['enable_powerpaste'] : 'off';
                $currentValue = $tinymce_enterprise_options['powerpaste_word_import'];
                $values = array("prompt", "clean","merge");
                insert_select_list('powerpaste_word_import', $isEnabled, $currentValue, $values);
                ?>
                &nbsp;&nbsp;
                <a href="https://www.tinymce.com/docs/enterprise/paste-from-word/#powerpaste_word_import" target="_blank">
                    <img style="vertical-align: middle;" src="<?php echo TENTP_URL . 'images/info22.png' ?>">
                </a>
            </td>
            <th scope="row">HTML Import:</th>
            <td>
                <?php
                $isEnabled = array_key_exists('enable_powerpaste', $tinymce_enterprise_options) ? $tinymce_enterprise_options['enable_powerpaste'] : 'off';
                $currentValue = $tinymce_enterprise_options['powerpaste_html_import'];
                $values = array("prompt", "clean","merge");
                insert_select_list('powerpaste_html_import', $isEnabled, $currentValue, $values);
                ?>
                &nbsp;&nbsp;
                <a href="https://www.tinymce.com/docs/enterprise/paste-from-word/#powerpaste_html_import" target="_blank">
                    <img style="vertical-align: middle;" src="<?php echo TENTP_URL . 'images/info22.png' ?>">
                </a>
            </td>
        </tr>
        <tr>
            <th scope="row">Allow Local Images:</th>
            <td>
                <?php
                $isEnabled = array_key_exists('enable_powerpaste', $tinymce_enterprise_options) ? $tinymce_enterprise_options['enable_powerpaste'] : 'off';
                $currentValue = $tinymce_enterprise_options['powerpaste_allow_local_images'];
                $values = array("true", "false");
                insert_select_list('powerpaste_allow_local_images', $isEnabled, $currentValue, $values);
                ?>
                &nbsp;&nbsp;
                <a href="https://www.tinymce.com/docs/enterprise/paste-from-word/#powerpaste_allow_local_images" target="_blank">
                    <img style="vertical-align: middle;" src="<?php echo TENTP_URL . 'images/info22.png' ?>">
                </a>
            </td>
            <th scope="row">Block Drop:</th>
            <td>
                <?php
                $isEnabled = array_key_exists('enable_powerpaste', $tinymce_enterprise_options) ? $tinymce_enterprise_options['enable_powerpaste'] : 'off';
                $currentValue = $tinymce_enterprise_options['powerpaste_block_drop'];
                $values = array("true", "false");
                insert_select_list('powerpaste_block_drop', $isEnabled, $currentValue, $values);
                ?>
                &nbsp;&nbsp;
                <a href="https://www.tinymce.com/docs/enterprise/paste-from-word/#powerpaste_block_drop" target="_blank">
                    <img style="vertical-align: middle;" src="<?php echo TENTP_URL . 'images/info22.png' ?>">
                </a>
            </td>
        </tr>
        </tbody>
    </table>
</div>