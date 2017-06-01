<?php require_once "settings-page-helpers.php"; ?>
<div style="margin-bottom: 20px; border: 2px solid #ccc; padding: 0 15px; width: 95%;">
    <h2 class="title">TinyMCE PowerPaste</h2>
    <p>
        Enjoy clean copy/paste of content from Word, Excel, and other popular content tools.  PowerPaste
        seamlessly matches the pasted content to your site’s look and feel, freeing you from the need to
        fix rogue formatting errors, and increasing your productivity.
    </p>
    <p>
        <strong><a href="https://www.ephox.com/products/powerpaste/" target="_blank">Learn More</a></strong>
         |
        <strong><a href=" https://www.tinymce.com/docs/plugins/powerpaste/" target="_blank">Documentation</a></strong>
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
                <a href="https://www.tinymce.com/docs/plugins/powerpaste/#powerpaste_word_import" target="_blank">
                    <img width="22" height="22" style="vertical-align: middle;" src="<?php echo TENTP_URL . 'images/info_outline.png' ?>">
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
                <a href="https://www.tinymce.com/docs/plugins/powerpaste/#powerpaste_html_import" target="_blank">
                    <img width="22" height="22" style="vertical-align: middle;" src="<?php echo TENTP_URL . 'images/info_outline.png' ?>">
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
                <a href="https://www.tinymce.com/docs/plugins/powerpaste/#powerpaste_allow_local_images" target="_blank">
                    <img width="22" height="22" style="vertical-align: middle;" src="<?php echo TENTP_URL . 'images/info_outline.png' ?>">
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
                <a href="https://www.tinymce.com/docs/plugins/powerpaste/#powerpaste_block_drop" target="_blank">
                    <img width="22" height="22" style="vertical-align: middle;" src="<?php echo TENTP_URL . 'images/info_outline.png' ?>">
                </a>
            </td>
        </tr>
        </tbody>
    </table>
</div>