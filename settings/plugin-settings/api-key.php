<?php require_once "settings-page-helpers.php"; ?>
<div style="margin-bottom: 20px; border: 2px solid #ccc; padding: 0 15px; width: 95%;">
<!--    <h2 class="title">TinyMCE Cloud API Key</h2>-->
    <table class="form-table">
        <tbody>
        <tr>
            <th colspan="2" scope="row">Enter your TinyMCE Cloud API Key:</th>
            <td colspan="2">
                <?php insert_text_field('api_key', true, $tinymce_enterprise_options['api_key']); ?>
            </td>
        </tr>
        </tbody>
    </table>
</div>