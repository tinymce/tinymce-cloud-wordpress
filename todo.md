## Settings Page
 * ~~Only show options for the plugins that exist in the plugins folder~~
   * ~~Hide plugin settings/options if the plugin's folder is not present~~
 * ~~Only invoke plugins if the folder exists regardless of the setting
 in the WP database.~~
 * ~~Create helper functions for~~
    * ~~Checkbox creation~~
    * ~~Select list creation~`
 * `esc_url()` for spelling remote URL
 * Change activate to use `add_option()` so you don't overwrite existing values when activating the plugin for a second time
    * What to do on update?  How do you add new settings and (if needed) update existing settings?

## General
 * ~~Determine which plugins can be loaded based on WP version?~~
 * ~~`plugin_dir_path()` in place of hard coded paths (to plugin JS files)~~
 * Use Media Manager APIs to store images when PowerPaste uploads them.
   * Make them visible in Media Manager
 * `save_post()` hook to check for @mention data and send an email?
   * How to know what mentions are added in this update?  (Custom attribute?)
 * Create a helper to see if a settings option is "enabled"
   * Is it SET? and is it "on"
   * Only true if both are true

 ## Errors / Issues
  * ~~@Mentions breaks the Insert Media button ... what is causing that?~~
