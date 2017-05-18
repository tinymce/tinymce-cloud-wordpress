<?php require_once "settings-page-helpers.php"; ?>
<div style="margin-bottom: 20px; border: 2px solid #ccc; padding: 0 15px; width: 95%;">
    <h2 class="title">TinyMCE Enhanced Media Embed</h2>
    <p>For more details please see the
        <strong><a href="https://www.tinymce.com/docs/plugins/mediaembed/" target="_blank">product documentation</a></strong>
    </p>
    <!-- Requires TinyMCE 4.5.2 -->
    <?php if(is474OrNewer()) : ?>
        <table class="form-table">
            <tbody>
            <tr>
                <th style="width:40px;" scope="row">Enable:</th>
                <td colspan="3">
                    <?php insert_checkbox('enable_mediaembed', array_key_exists('enable_mediaembed', $tinymce_enterprise_options) ? $tinymce_enterprise_options['enable_mediaembed'] : 'off'); ?>
                </td>
            </tr>
            </tbody>
        </table>
    <?php else : ?>
        <p><em>Feature Unavailable: This feature requires <a href="https://wordpress.org/download/" target="_blank">WordPress 4.7.4 or greater</a></em></p>
    <?php endif; ?>
</div>