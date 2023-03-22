=== UCF Source Taxonomy Plugin ===
Contributors: ucfwebcom
Requires at least: 4.9.7
Tested up to: 6.1
Stable tag: 1.1.1
Requires PHP: 7.0
License: GPLv3 or later
License URI: http://www.gnu.org/copyleft/gpl-3.0.html

WordPress taxonomy for describing sources.


== Description ==

Provides a custom taxonomy for describing Sources. Designed to leverage default WordPress templates and be overridden by taxonomy specific templates.


== Required plugins ==

These plugins must be activated for the plugin to function properly.

* [Advanced Custom Fields](https://www.advancedcustomfields.com/)


== Changelog ==

= 1.1.1 =
Enhancements:
* Added composer file.

= 1.1.0 =
Enhancements:
* Moved ACF fields to code and removed the acf-export.json file

= 1.0.1 =
Documentation:
* Updated contributing doc to reflect the switch from slack to teams.

= 1.0.0 =
* Initial release


== Upgrade Notice ==

n/a


== Development ==

Changes to these files should be tracked via git (so that users installing the plugin using traditional installation methods will have a working plugin out-of-the-box.)

[Enabling debug mode](https://codex.wordpress.org/Debugging_in_WordPress) in your `wp-config.php` file is recommended during development to help catch warnings and bugs.

= Requirements =
* node
* gulp-cli

= Instructions =
1. Clone the UCF-Source-Taxonomy-Plugin repo into your local development environment, within your WordPress installation's `plugins/` directory: `git clone https://github.com/UCF/UCF-Source-Taxonomy-Plugin.git`
2. `cd` into the new UCF-Source-Taxonomy-Plugin directory, and run `npm install` to install required packages for development into `node_modules/` within the repo
3. Run `gulp default` to process front-end assets.
4. If you haven't already done so, create a new WordPress site on your development environment to test this plugin.
5. Activate this plugin on your development WordPress site.
6. Run `gulp watch` to continuously watch changes to readme.txt file. If you enabled BrowserSync in `gulp-config.json`, it will also reload your browser when plugin files change.

= Other Notes =
* This plugin's README.md file is automatically generated. Please only make modifications to the README.txt file, and make sure the `gulp readme` command has been run before committing README changes.  See the [contributing guidelines](https://github.com/UCF/UCF-Source-Taxonomy-Plugin/blob/master/CONTRIBUTING.md) for more information.


== Contributing ==

Want to submit a bug report or feature request?  Check out our [contributing guidelines](https://github.com/UCF/UCF-Source-Taxonomy-Plugin/blob/master/CONTRIBUTING.md) for more information.  We'd love to hear from you!
