<?php

//Inject the TinyMCE Cloud script one time
add_action( 'wp_tiny_mce_init', function () {
    $tinymce_enterprise_settings = get_option('tinymce_enterprise_options');
    $urlForCloud = "//cloud.tinymce.com/4/plugins.min.js?apiKey=" . $tinymce_enterprise_settings['api_key'] . "\"";
    ?>
        <script src="<?php echo $urlForCloud ?>"></script>
    <?php
} );

?>