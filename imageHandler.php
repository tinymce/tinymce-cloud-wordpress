<?php

require_once '../../../wp-admin/includes/image.php';
require_once '../../../wp-blog-header.php';
require_once '../../../wp-includes/capabilities.php';

if (current_user_can('edit_post', $_GET['postid'])) {
    $uploads = wp_upload_dir();
    $postedImageFolder = $uploads['path'] . '/';
    $basePathForFile = $uploads['url'] . '/';

//    $postedImageFolder = $_GET['path'] . '/';
//    $basePathForFile = $_GET['url'] . '/';

    $post_id = isset($_GET['postid']) ? (int)$_GET['postid'] : 0;
    $theImage = current($_FILES);

    if (is_uploaded_file($theImage['tmp_name'])) {
        //Check file extension to be PNG, JPG, or GIF
        $fileNameParts = explode('.', $theImage['name']);
        $valid_extensions = Array('png', 'jpg','jpeg', 'gif');

        if (in_array(strtolower($fileNameParts[1]), $valid_extensions)){
            //Keep going ... the ext is valid
            $timeInMilliseconds = str_replace('.', '-', microtime(true));
//            $finalFileName = $fileNameParts[0] . '-' . $timeInMilliseconds . '.' . $fileNameParts[1];
            $finalFileName = 'pp-' . $timeInMilliseconds . '.' . strtolower($fileNameParts[1]);
            $srcPathForEditor = $basePathForFile . $finalFileName;
            $fileToWrite = $postedImageFolder . $finalFileName;

            if (move_uploaded_file($theImage['tmp_name'], $fileToWrite)) {
                $parent_post_id = $post_id;

                // Check the type of file. We'll use this as the 'post_mime_type'.
                $filetype = wp_check_filetype(basename($fileToWrite), null);

                // Get the path to the upload directory.
                $wp_upload_dir = wp_upload_dir();

                // Prepare an array of post data for the attachment.
                $attachment = array(
                    'guid' => $wp_upload_dir['url'] . '/' . basename($fileToWrite),
                    'post_mime_type' => $filetype['type'],
                    //                'post_mime_type' => 'image/png',
                    'post_title' => preg_replace('/\.[^.]+$/', '', basename($fileToWrite)),
                    'post_content' => '',
                    'post_status' => 'inherit'
                );

                // Insert the attachment.
                $attach_id = wp_insert_attachment($attachment, $fileToWrite, $parent_post_id);

                // Generate the metadata for the attachment, and update the database record.
                $attach_data = wp_generate_attachment_metadata($attach_id, $fileToWrite);
                wp_update_attachment_metadata($attach_id, $attach_data);

                set_post_thumbnail($parent_post_id, $attach_id);
                $jsonToReturn = array('location' => $srcPathForEditor);
                echo json_encode($jsonToReturn);
            } else {
                // Notify editor that the upload failed
                header("HTTP/1.0 500 Server Error");
                echo 'FAILURE MOVING FILE TO postedImages DIRECTORY ON SERVER';
            }
        } else {
            //Invalid extension ... punt with an error!
            header("HTTP/1.0 500 Server Error");
            echo 'INVALID FILE EXTENSION';
        }
    } else {
        // Notify editor that the upload failed
        header("HTTP/1.0 500 Server Error");
        echo 'FAILURE ACCESSING UPLOADED FILE ON SERVER';
    }
} else {
    // Person does not have rights to upload a file to the server
    header("HTTP/1.0 500 Server Error");
    echo 'YOU DO NOT HAVE RIGHTS TO UPLOAD FILES TO THE SERVER';
}
?>