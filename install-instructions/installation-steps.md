# Installing TinyMCE Cloud

The TinyMCE Cloud plugin is provided as a ZIP file named `tmcewordpresscloud_latest.zip`.
You install this plugin as you would install any other WordPress plugin.  Guidance for installing 
WordPress plugins may be found on https://wordpress.org/.

## Enabling the TinyMCE Cloud plugin
Before you can use this plugin you will need to access the setting page for the plugin to enter your
TinyMCE Cloud API Key and enable those plugins that you have purchased.

By default no plugins are enabled when you install and activate the TinyMCE Cloud plugin - you can modify the settings of the plugin by visiting the TinyMCE 
Cloud plugin settings page in the WordPress Admin console.  The settings page for this plugin should be accessible at 
`http://<your_wordpress_instance>/wp-admin/options-general.php?page=tmce_cloud`.


## Obtaining Support
If you have issues with the installation or use of this plugin please visit our support site at: http://support.ephox.com

Please note that this site requires you to register prior to opening tickets so if you are a new Ephox customer start by signing up here:  https://support.ephox.com/registration

## Troubleshooting Your Installation

### A Note on File Permissions
In some operating systems you may find that the file permissions on the TinyMCE Cloud plugin folder (and/or files) won't allow WordPress to read the files.  
This will manifest itself as the plugin not showing in the admin console.  If you see this issue make sure that "Everyone" can read the`tmce-wordpress-cloud` 
folder and all of its child files/folders.

### Confirm permissions on `wp-content/uploads` folder

***The user (on your server) that runs all of the PHP scripts in this plugin needs write access to the `wp-content` folder for this plugin to function properly.***

If you use PowerPaste to paste images into TinyMCE (enabled by default) you need to make sure that this plugin can write files to the `wp-content/uploads` folder 
(and all of its child folders).  This is necessary to allow PowerPaste to upload and store images that are pasted into TinyMCE from MS Word and MS Excel.  
The same permissions are used by the WordPress Media Library code to allow it to upload and store images.

When pasting MS Word content if the content contains an image, that image should result in an `<img>` tag with a URL pointing to a file within the `wp-content/uploads` 
folder.  For example:

```
<img src="http://localhost/~mfromin/wordpress452/wp-content/uploads/2016/06/blobid0-1465660986-8468.png" width="212" height="53" />
```

If you instead see a `Base64` or `Blob` encoded image in the HTML source look in your PHP error log.  If the PHP error log
states something like this:

```
PHP Warning:  move_uploaded_file(): Unable to move '/private/var/tmp/phpf6d4n9'
to '<path_to_wordpress_install>/wordpress/wp-content/uploads/2016/06/blobid0-1465592547-775.png'
in <path_to_wordpress_install>/wordpress/wp-content/plugins/tinymce-enterprise/imageHandler.php
```

...then you have a permissions issue.  This error implies that this plugin's image upload script (`imageHandler.php`) cannot write to the `uploads` folder or one 
of its child folders.

You can resolve this error by doing one or both of the following:

* Ensure that the owner or the `imageHandler.php` script is the same as the core WordPress PHP files.  If your WordPress install is working then the PHP files of the core WordPress system are properly setup.  Mirroring those settings with `chmod`/`chown` or similar should address the permissions of the  PHP script. 
* Modify the settings for the `wp-content` folder (and its child folders) so that the user that runs the `imageHandler.php` script has write access to this folder. 

***If you need assistance with fixing file permissions please open a support case at: http://support.ephox.com***
