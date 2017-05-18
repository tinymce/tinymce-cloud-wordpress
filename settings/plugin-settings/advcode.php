<?php require_once "settings-page-helpers.php"; ?>
<div style="margin-bottom: 20px; border: 2px solid #ccc; padding: 0 15px; width: 95%;">
    <h2 class="title">TinyMCE Advanced Code Editor</h2>
    <p>For more details please see the
        <strong><a href="https://www.tinymce.com/docs/plugins/advcode/" target="_blank">product documentation</a></strong>
    </p>
    <table class="form-table">
        <tbody>
        <tr>
            <th scope="row">Enable:</th>
            <td colspan="3">
                <?php insert_checkbox('enable_advcode', array_key_exists('enable_advcode', $tinymce_enterprise_options) ? $tinymce_enterprise_options['enable_advcode'] : 'off'); ?>
            </td>
        </tr>
        </tbody>
    </table>
</div>