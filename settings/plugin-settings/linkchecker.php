<?php require_once "settings-page-helpers.php"; ?>
<div style="margin-bottom: 20px; border: 2px solid #ccc; padding: 0 15px; width: 95%;">
    <h2 class="title">TinyMCE Link Checker</h2>
    <p>For more details please see the
        <strong><a href="https://www.tinymce.com/docs/plugins/linkchecker/" target="_blank">product documentation</a></strong>
    </p>
    <!-- Requires TinyMCE 4.4.3 -->
    <p><em>Note: This plugin requires WordPress 4.7 or greater</em></p>
    <table class="form-table">
        <tbody>
        <tr>
            <th style="width:40px;" scope="row">Enable:</th>
            <td colspan="3">
                <?php insert_checkbox('enable_linkchecker', array_key_exists('enable_linkchecker', $tinymce_enterprise_options) ? $tinymce_enterprise_options['enable_linkchecker'] : 'off'); ?>
            </td>
        </tr>
        </tbody>
    </table>
</div>