<?php require_once "settings-page-helpers.php"; ?>
<div style="margin-bottom: 20px; border: 2px solid #ccc; padding: 0 15px; width: 95%;">
    <h2 class="title">TinyMCE Accessibility Checker Settings</h2>
    <p>For more details on the Accessibility Checker please see the
        <strong><a href="https://www.tinymce.com/docs/plugins/a11ychecker/" target="_blank">product documentation</a></strong>
    </p>
    <table class="form-table">
        <tbody>
        <tr>
            <th scope="row">Enable Accessibility Checker:</th>
            <td colspan="3">
                <?php insert_checkbox('enable_a11y', array_key_exists('enable_a11y', $tinymce_enterprise_options) ? $tinymce_enterprise_options['enable_a11y'] : 'off'); ?>
            </td>
        </tr>
        </tbody>
    </table>
</div>