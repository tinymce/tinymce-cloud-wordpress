<?php require_once "settings-page-helpers.php"; ?>
<div style="margin-bottom: 20px; border: 2px solid #ccc; padding: 0 15px; width: 95%;">
    <h2 class="title">TinyMCE Spell Checker Pro</h2>
    <p>
        Take advantage of spell checking as-you-type, with inline spell checking and a dialog mode that
        steps you through each error, offering a list of suggested corrections.  And by deploying Spell Checker Pro
        from our cloud service, you’ll never need to worry about server-side set-up or maintenance.
    </p>
    <p>
        <strong><a href="https://www.ephox.com/products/spell-checker-pro/" target="_blank">Learn More</a></strong>
         |
        <strong><a href="https://www.tinymce.com/docs/plugins/tinymcespellchecker/" target="_blank">Documentation</a></strong>
    </p>
    <!-- Fix for compat3x in TinyMCE 4.5.3 on 1-Feb-2017 -->
    <?php if(isAtLeastVersion('4.7.0')) : ?>
        <table class="form-table">
            <tbody>
            <tr>
                <th style="width:40px;" scope="row">Enable:</th>
                <td colspan="3">
                    <?php insert_checkbox('enable_spellcheck', array_key_exists('enable_spellcheck', $tinymce_enterprise_options) ? $tinymce_enterprise_options['enable_spellcheck'] : 'off'); ?>
                </td>
            </tr>
            </tbody>
        </table>
    <?php else : ?>
        <p><em>Feature Unavailable: This feature requires <a href="https://wordpress.org/download/" target="_blank">WordPress 4.7.4 or greater</a></em></p>
    <?php endif; ?>
</div>