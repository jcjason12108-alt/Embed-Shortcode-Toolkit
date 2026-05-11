<?php
/*
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * Dashboard. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * this starts the plugin.
 *
 * @link:       https://www.iamdivpress.org
 * @since             1.0.1
 * @package           Embed_Shortcode_Toolkit
 *
 * @wordpress-plugin
 * Plugin Name:       Embed Shortcode Toolkit
 * Plugin URI:        https://github.com/jcjason12108-alt/Embed-Shortcode-Toolkit
 * Description:        Library of shortcode embeds to help populate your website.
 * Version:           2.1.4
 * Requires at least: 6.0
 * Tested up to:      6.9.4
 * Requires PHP:      7.4
 * Author:            Jason Cox
 * Author URI:        https://github.com/jcjason12108-alt
 * License:           GPLv2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       embed-shortcode-toolkit
 * Domain Path:       /lang
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

require_once __DIR__ . '/plugin-update-checker/plugin-update-checker.php';

$embed_shortcode_toolkit_update_checker = \YahnisElsts\PluginUpdateChecker\v5\PucFactory::buildUpdateChecker(
	'https://github.com/jcjason12108-alt/Embed-Shortcode-Toolkit/',
	__FILE__,
	'embed-shortcode-toolkit'
);
$embed_shortcode_toolkit_update_checker->setBranch( 'main' );

add_filter(
	$embed_shortcode_toolkit_update_checker->getUniqueName( 'vcs_update_detection_strategies' ),
	static function ( array $strategies ): array {
		return isset( $strategies['branch'] ) ? array( 'branch' => $strategies['branch'] ) : $strategies;
	}
);

$embed_shortcode_toolkit_github_token = defined( 'EMBED_SHORTCODE_TOOLKIT_GITHUB_TOKEN' )
	? EMBED_SHORTCODE_TOOLKIT_GITHUB_TOKEN
	: ( defined( 'IAM_SHORTCODES_GITHUB_TOKEN' ) ? IAM_SHORTCODES_GITHUB_TOKEN : getenv( 'EMBED_SHORTCODE_TOOLKIT_GITHUB_TOKEN' ) );

if ( empty( $embed_shortcode_toolkit_github_token ) ) {
	$embed_shortcode_toolkit_github_token = defined( 'PLUGIN_UPDATE_GITHUB_TOKEN' )
		? PLUGIN_UPDATE_GITHUB_TOKEN
		: getenv( 'PLUGIN_UPDATE_GITHUB_TOKEN' );
}

if ( ! empty( $embed_shortcode_toolkit_github_token ) ) {
	$embed_shortcode_toolkit_update_checker->setAuthentication( $embed_shortcode_toolkit_github_token );
}

function iamuapolicy_iframe( $atts, $content ) {
	$atts = shortcode_atts(
		array(
			'width'  => '100%',
			'height' => '840px',
		),
		(array) $atts,
		'IAMTERMS'
	);

	return sprintf(
		'<html><iframe src="https://iamdivpress.org/developer/documents/iam-privacy-user.html" style="border:0px #ffffff none;" name="policy" scrolling="auto" frameborder="0" marginheight="0px" marginwidth="0px" height="%1$s" width="%2$s" allowfullscreen></iframe></html>',
		esc_attr( $atts['height'] ),
		esc_attr( $atts['width'] )
	);
}
add_shortcode('IAMTERMS', 'iamuapolicy_iframe');

function iamyotuube_iframe() {
 return '<html><iframe src="https://www.youtube.com/embed/videoseries?list=PLJ6SJCpDBWOoNBD9OmIEGqWC-IKlyKmJX" style="border:0px #ffffff none;" name="youtube" scrolling="no" frameborder="1" marginheight="0px" marginwidth="0px" height="480px" width="100%" allowfullscreen></iframe></html>';
}
add_shortcode('IAMYOUTUBE', 'iamyotuube_iframe');

function iamtimeline_iframe() {
 return '<html><iframe src="https://cdn.knightlab.com/libs/timeline3/latest/embed/index.html?source=1OaD8UoynArcs1EUIrGPHEo0OCQ11rsDb2KJHqmXhMAQ&amp;font=Default&amp;lang=en&amp;hash_bookmark=true&amp;initial_zoom=2&amp;height=650" width="100%" height="650" frameborder="0"></iframe></html>';
}
add_shortcode('IAMTIMELINE', 'iamtimeline_iframe');

function imailpage_iframe() {
 return '<html><!-- start feedwind code --> <script type="text/javascript" src="https://feed.mikle.com/js/fw-loader.js" data-fw-param="104692/"></script> <!-- end feedwind code --></html>';
}
add_shortcode('IMAILPAGE', 'imailpage_iframe');

function imailwidget_iframe() {
 return '<html><!-- start feedwind code --> <script type="text/javascript" src="https://feed.mikle.com/js/fw-loader.js" data-fw-param="105005/"></script> <!-- end feedwind code --></html>';
}
add_shortcode('IMAILWIDGET', 'imailwidget_iframe');

function legislativenews_iframe() {
 return '<html><!-- start feedwind code --> <script type="text/javascript" src="https://feed.mikle.com/js/fw-loader.js" data-fw-param="104694/"></script> <!-- end feedwind code --></html>';
}
add_shortcode('LEGISLATIVENEWS', 'legislativenews_iframe');

function organizingform_iframe() {
 return '<html><iframe src="https://www.goiam.org/gfembed/?f=2" width="100%" height="500" frameBorder="0" class="gfiframe"></iframe>
<script src="https://www.goiam.org/wp-content/plugins/gravity-forms-iframe-develop/assets/scripts/gfembed.min.js" type="text/javascript"></script></html>';
}
add_shortcode('ORGANIZINGFORM', 'organizingform_iframe');

function journalbookcase_iframe() {
 return '<html><iframe src="https://fliphtml5.com/bookcase/lkxz" style="border:0px #ffffff none;" name="journal-bookcase" scrolling="no" frameborder="0" marginheight="0px" marginwidth="0px" height="600px" width="100%" allowfullscreen></iframe></html>';
}
add_shortcode('JOURNALBOOKCASE', 'journalbookcase_iframe');

function legislativeactioncenter_iframe() {
return '<html><iframe src="https://www.goiam.org/forms/action-center-for-communications-plugin/#/" style="border:0px #ffffff none;" name="actioncenter" scrolling="auto" frameborder="0" marginheight="0px" marginwidth="0px" height="960px" width="100%" allowfullscreen></iframe></html>';
}
add_shortcode('ACTIONCENTER', 'legislativeactioncenter_iframe');

function iamcalendar_iframe() {
return '<html><!-- start feedwind code --> <script type="text/javascript" src="https://feed.mikle.com/js/fw-loader.js" data-fw-param="104736/"></script> <!-- end feedwind code --></html>';
}
add_shortcode('IAMCALENDAR', 'iamcalendar_iframe');

function activatelive_podcast_iframe() {
return '<html><!-- start feedwind code --> <script type="text/javascript" src="https://feed.mikle.com/js/fw-loader.js" data-fw-param="105698/"></script> <!-- end feedwind code --></html>';
}
add_shortcode('ACTIVATELIVEPODCAST', 'activatelive_podcast_iframe');

function iam_socalwall_iframe() {
return '<html><script src="https://assets.juicer.io/embed.js" type="text/javascript"></script>
<link href="https://assets.juicer.io/embed.css" media="all" rel="stylesheet" type="text/css" />
<ul class="juicer-feed" data-feed-id="iamaw"></ul></html>';
}
add_shortcode('IAMSOCIALWALL', 'iam_socalwall_iframe');


/* Load text domain
--------------------------------------------- */
add_action('plugins_loaded', 'shortcode_lister_load_textdomain');
function shortcode_lister_load_textdomain() {
	load_plugin_textdomain( 'embed-shortcode-toolkit', false, dirname( plugin_basename(__FILE__) ) . '/lang/' );
}

/*
 * Shortcode lister admin UI.
 */
if ( is_admin() ) {
	add_filter( 'media_buttons', 'shortcode_lister_menu', 15 );
	add_action( 'admin_menu', 'shortcode_lister_admin_settings_setup' );
	add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'shortcode_lister_add_action_links' );
	add_action( 'shortcode_lister_settings_tab', 'shortcode_lister_welcome_tab', 1 );
	add_action( 'shortcode_lister_settings_content', 'shortcode_lister_welcome_render_options_page' );
	add_action( 'admin_init', 'shortcode_lister_register_settings' );
	add_action( 'admin_enqueue_scripts', 'shortcode_lister_scripts' );
}

function shortcode_lister_scripts() {
	wp_enqueue_script( 'jquery' );
	add_action( 'admin_print_footer_scripts', 'shortcode_lister_print_inline_script', 99 );
}

function shortcode_lister_print_inline_script() {
	?>
	<script type="text/javascript">
	jQuery(document).ready(function($) {
		$("#sl_select").change(function() {
			send_to_editor($("#sl_select :selected").val());
			return false;
		});
	});
	</script>
	<?php
}

function shortcode_lister_menu( $location ) {
	global $shortcode_tags;
	global $shortcode_lister_settings;

	$includes                  = array();
	$shortcode_lister_settings = get_option( 'shortcode_lister_settings' );

	switch ( $location ) {
		case 'settings':
			foreach ( $shortcode_tags as $code => $function ) {
				?>
				<tr valign="top">
					<td>
						<input id="shortcode_lister_settings[<?php echo esc_attr( $code ); ?>]" name="shortcode_lister_settings[<?php echo esc_attr( $code ); ?>]" type="checkbox" value="1" <?php if ( is_array( $shortcode_lister_settings ) && array_key_exists( $code, $shortcode_lister_settings ) ) { checked( 1, $shortcode_lister_settings[ $code ] ); } ?> />
						<label class="description" for="shortcode_lister_settings[<?php echo esc_attr( $code ); ?>]">[<?php echo esc_html( $code ); ?>]</label>
					</td>
				</tr>
				<?php
			}
			break;

		default:
			$shortcodes_list = '';

			foreach ( $shortcode_tags as $code => $function ) {
				if ( is_array( $shortcode_lister_settings ) && array_key_exists( $code, $shortcode_lister_settings ) && 1 == $shortcode_lister_settings[ $code ] ) {
					continue;
				}

				$includes[] = '[' . $code . ']';
			}

			echo '&nbsp;<select id="sl_select"><option class="noclick">Shortcodes</option>';

			foreach ( $includes as $include ) {
				$shortcodes_list .= '<option value="' . esc_attr( $include ) . '">' . esc_html( $include ) . '</option>';
			}

			echo $shortcodes_list;
			echo '</select>';
			break;
	}
}

function shortcode_lister_admin_settings_setup() {
	add_options_page( __( 'Shortcode Lister', 'embed-shortcode-toolkit' ), __( 'Shortcode Lister', 'embed-shortcode-toolkit' ), 'manage_options', 'shortcode-lister-settings', 'shortcode_lister_admin_settings_page' );
}

function shortcode_lister_add_action_links( $links ) {
	$mylinks = array(
		'<a href="' . esc_url( admin_url( 'options-general.php?page=shortcode-lister-settings' ) ) . '">' . esc_html__( 'Settings', 'embed-shortcode-toolkit' ) . '</a>',
	);

	return array_merge( $links, $mylinks );
}

function shortcode_lister_admin_settings_page() {
	global $shortcode_lister_active_tab;

	if ( ! current_user_can( 'manage_options' ) ) {
		wp_die( esc_html__( 'You do not have permission to access this page.', 'embed-shortcode-toolkit' ) );
	}

	$shortcode_lister_active_tab = isset( $_GET['tab'] ) ? sanitize_key( wp_unslash( $_GET['tab'] ) ) : 'welcome';
	?>
	<h2 class="nav-tab-wrapper">
		<?php do_action( 'shortcode_lister_settings_tab' ); ?>
	</h2>
	<?php
	do_action( 'shortcode_lister_settings_content' );
}

function shortcode_lister_welcome_tab() {
	global $shortcode_lister_active_tab;
	?>
	<a class="nav-tab <?php echo ( 'welcome' === $shortcode_lister_active_tab ) ? 'nav-tab-active' : ''; ?>" href="<?php echo esc_url( admin_url( 'options-general.php?page=shortcode-lister-settings&tab=welcome' ) ); ?>"><?php esc_html_e( 'Shortcode Lister', 'embed-shortcode-toolkit' ); ?></a>
	<?php
}

function shortcode_lister_welcome_render_options_page() {
	global $shortcode_lister_active_tab;

	if ( 'welcome' !== $shortcode_lister_active_tab ) {
		return;
	}
	?>
	<h3><?php esc_html_e( 'Shortcode Lister Settings', 'embed-shortcode-toolkit' ); ?></h3>
	<p><?php esc_html_e( 'Exclude shortcodes from the shortcode listing menu by checking the box next to each shortcode below. This is useful if there are shortcodes you only use once so your list of shortcodes does not become overloaded with unnecessary shortcodes.', 'embed-shortcode-toolkit' ); ?></p>
	<form method="post" action="options.php">
		<?php settings_fields( 'shortcode_lister_settings_group' ); ?>
		<table class="form-table">
			<tbody>
				<tr valign="top">
					<th scope="row" valign="top">
						<?php esc_html_e( 'Shortcode', 'embed-shortcode-toolkit' ); ?>
					</th>
				</tr>
				<?php shortcode_lister_menu( 'settings' ); ?>
			</tbody>
		</table>
		<p class="submit">
			<input type="submit" class="button-primary" value="<?php echo esc_attr__( 'Save Options', 'embed-shortcode-toolkit' ); ?>" />
		</p>
	</form>
	<?php
}

function shortcode_lister_register_settings() {
	register_setting(
		'shortcode_lister_settings_group',
		'shortcode_lister_settings',
		'shortcode_lister_sanitize_settings'
	);
}

function shortcode_lister_sanitize_settings( $input ) {
	global $shortcode_tags;

	if ( ! is_array( $input ) ) {
		return array();
	}

	$sanitized = array();

	foreach ( $input as $code => $value ) {
		if ( isset( $shortcode_tags[ $code ] ) && '1' === (string) $value ) {
			$sanitized[ $code ] = 1;
		}
	}

	return $sanitized;
}
