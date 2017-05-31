<?php require_once "settings-page-helpers.php"; ?>
<div style="margin-bottom: 20px; border: 2px solid #ccc; padding: 0 15px; width: 95%;">
    <h2 class="title">TinyMCE Accessibility Checker</h2>
    <p>
        Engage with the hundreds of thousands of people worldwide using screen readers or other assistive technologies.
        Maintaining your web compliance to WAI-ARIA standards ensures you fully extend your global reach and allows everyone
        to consume your content.
    </p>
    <p>
        <strong>
            <a href="https://www.ephox.com/products/accessibility-checker/" target="_blank">Learn More</a>
             |
            <a href="https://www.tinymce.com/docs/plugins/a11ychecker/" target="_blank">Documentation</a>
        </strong>
    </p>
    <table class="form-table">
        <tbody>
        <tr>
            <th style="width:40px;" scope="row">Enable:</th>
            <td colspan="3">
                <?php insert_checkbox('enable_a11y', array_key_exists('enable_a11y', $tinymce_enterprise_options) ? $tinymce_enterprise_options['enable_a11y'] : 'off'); ?>
            </td>
        </tr>
        </tbody>
    </table>
</div>