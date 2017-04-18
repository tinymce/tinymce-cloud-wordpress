<?php require_once "settings-page-helpers.php"; ?>
<div style="margin-bottom: 20px; border: 2px solid #ccc; padding: 0 15px; width: 95%;">
    <h2 class="title">TinyMCE Spellchecker Pro Settings</h2>
    <p>For more details on the Spellchecker Pro plugin please see the
        <strong><a href="https://www.tinymce.com/docs/plugins/tinymcespellchecker/" target="_blank">product documentation</a></strong>
    </p>
    <!-- Fix for compat3x in TinyMCE 4.5.3 on 1-Feb-2017 -->
    <p><em>Note: This plugin requires WordPress ?.? or greater</em></p>
    <table class="form-table">
        <tbody>
        <tr>
            <th scope="row">Enable Spellchecker Pro:</th>
            <td colspan="3">
                <?php insert_checkbox('enable_spellcheck', array_key_exists('enable_spellcheck', $tinymce_enterprise_options) ? $tinymce_enterprise_options['enable_spellcheck'] : 'off'); ?>
            </td>
        </tr>
        </tbody>
    </table>
</div>