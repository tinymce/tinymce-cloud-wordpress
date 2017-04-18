<?php require_once "settings-page-helpers.php"; ?>
<div style="margin-bottom: 20px; border: 2px solid #ccc; padding: 0 15px; width: 95%;">
    <h2 class="title">TinyMCE Enhanced Media Embed Settings</h2>
    <p>For more details on Enhanced Media Embed please see the
        <strong><a href="https://www.tinymce.com/docs/plugins/mediaembed/" target="_blank">product documentation</a></strong>
    </p>
    <!-- Requires TinyMCE 4.5.2 -->
    <p><em>Note: This plugin requires WordPress ?.? or greater</em></p>
    <table class="form-table">
        <tbody>
        <tr>
            <th scope="row">Enable Link Checker:</th>
            <td colspan="3">
                <?php insert_checkbox('enable_mediaembed', array_key_exists('enable_mediaembed', $tinymce_enterprise_options) ? $tinymce_enterprise_options['enable_mediaembed'] : 'off'); ?>
            </td>
        </tr>
        </tbody>
    </table>
</div>