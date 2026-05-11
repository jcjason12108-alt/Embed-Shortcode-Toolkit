=== Embed Shortcode Toolkit ===
Contributors: jasoncox
Tags: shortcodes, embeds, communications
Requires at least: 6.0
Tested up to: 6.9.4
Requires PHP: 7.4
Stable tag: 2.1.5
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Shortcodes for WordPress sites that need quick access to common embeds and feeds.

== Description ==

Embed Shortcode Toolkit provides a small library of shortcode-based embeds for communication and media content.

Included shortcodes:

* `[IAMTERMS]`
* `[IAMYOUTUBE]`
* `[IAMTIMELINE]`
* `[IMAILPAGE]`
* `[IMAILWIDGET]`
* `[LEGISLATIVENEWS]`
* `[ORGANIZINGFORM]`
* `[JOURNALBOOKCASE]`
* `[ACTIONCENTER]`
* `[IAMCALENDAR]`
* `[ACTIVATELIVEPODCAST]`
* `[IAMSOCIALWALL]`

The plugin also adds a shortcode selector in the classic editor and a settings page under `Settings > Shortcode Lister` so individual shortcodes can be hidden from that selector.

Important:

* Several shortcodes load content from third-party services such as YouTube, Juicer, FeedWind, and external IAM pages.
* If those external services change or are unavailable, the related shortcode output may stop working.

== Installation ==

1. Upload the plugin folder to `/wp-content/plugins/`.
2. Activate `Embed Shortcode Toolkit` in WordPress.
3. Add any supported shortcode to a post, page, or widget area.
4. Optional: go to `Settings > Shortcode Lister` to hide shortcodes from the editor dropdown.

== Frequently Asked Questions ==

= Where do I use the shortcodes? =

Use them in posts, pages, or any area where your site processes WordPress shortcodes.

= Does this plugin host the embedded content locally? =

No. Most shortcodes render remote embeds or remote scripts from external services.

= Is the plugin still lightweight? =

Yes. The plugin has been simplified into a single runtime PHP file for easier review and maintenance.

== Changelog ==

= 2.1.5 =

* Restored the update checker slug to `iam-shortcodes` so GitHub updates match existing installs in `wp-content/plugins/iam-shortcodes/`.
* Corrected the installation instructions to use the current plugin name.

= 2.1.3 =

* Added Plugin Update Checker for GitHub-based updates from the main branch.
* Added optional GitHub token support for private or rate-limited update checks.
* Updated WordPress compatibility metadata to 6.9.4.

= 2.1.2 =

* Simplified the plugin structure.
* Removed unused updater and bundled library files.
* Hardened admin-side shortcode output and settings handling.
* Restored project documentation with a fresh readme.
