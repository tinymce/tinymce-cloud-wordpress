<?php require_once "settings-page-helpers.php"; ?>
<div style="margin-bottom: 20px; border: 2px solid #ccc; padding: 0 15px; width: 95%;">
<!--    <h2 class="title">TinyMCE Cloud API Key</h2>-->
    <p>
        <strong>Enter your TinyMCE Cloud API Key:&nbsp;&nbsp;&nbsp;</strong>
        <?php insert_text_field('api_key', true, $tinymce_enterprise_options['api_key']); ?>
    </p>
</div>