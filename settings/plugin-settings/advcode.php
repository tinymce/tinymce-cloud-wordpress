<?php require_once "settings-page-helpers.php"; ?>
<div style="margin-bottom: 20px; border: 2px solid #ccc; padding: 0 15px; width: 95%;">
    <h2 class="title">TinyMCE Advanced Code Editor</h2>
    <p>
        Bring a more IDE-like code editor to TinyMCE and make it much easier to modify the HTML underneath
        your WYSIWYG content, with features like color syntax highlighting, bracket matching, code folding
        and multiple selections/carets.
    </p>
    <p>
        <strong><a href="https://www.ephox.com/products/advanced-code-editor/" target="_blank">Learn More</a></strong>
         |
        <strong><a href="https://www.tinymce.com/docs/plugins/advcode/" target="_blank">Documentation</a></strong>
    </p>
    <table class="form-table">
        <tbody>
        <tr>
            <th style="width:40px;" scope="row">Enable:</th>
            <td colspan="3">
                <?php insert_checkbox('enable_advcode', array_key_exists('enable_advcode', $tinymce_enterprise_options) ? $tinymce_enterprise_options['enable_advcode'] : 'off'); ?>
            </td>
        </tr>
        </tbody>
    </table>
</div>