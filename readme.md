# TinyMCE Enterprise WordPress Plugin

#### NOTE: For installation details please read installation-steps.md

This plugin allows you to run the TinyMCE Enterprise plugins within
WordPress (4.4+).  The supported plugins are:

* Accessibility Checking
* @Mentions
* PowerPaste
* Spellchecking

The plugin has logic to determine what plugins are allowed in each version of WordPress.
This is tied to what version of TinyMCE is included in each version of WordPress as each
plugin has a minimum TinyMCE version requirement.

**WordPress 4.4.2 / TinyMCE 4.2.8**
 * PowerPaste
 * Spellchecking

**WordPress 4.5.x / TinyMCE 4.3.x**
 * PowerPaste
 * Spellchecking
 * @Mentions
 * Accessibility Checker

**Note:** *There is a Gulp task designed to create the ZIP that someone would
need to deploy this plugin to a WP server - see `Create ZIP for Distribution`.
There are other tasks used to push code to local WP instances during testing
that would have no real use to people wanting to deploy this solution.*



