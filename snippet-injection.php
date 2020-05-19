<?php
/**
 * Plugin Name:     Snippet Injection
 * Plugin URI:      https://github.com/team-hamworks/snippet-injection
 * Description:     Inject code Snippet to wp_head, wp_footer and wp_body_open.
 * Author:          HAMWORKS
 * Author URI:      https://ham.works
 * License:         GPLv2 or later
 * License URI:     https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:     snippet-injection
 * Domain Path:     /languages
 * Version: 0.1.3
 *
 * @package         HAMWORKS\Snippet_Injection
 */

namespace HAMWORKS\Snippet_Injection;


const PLUGIN_FILE = __FILE__;

/**
 * Get plugin information.
 *
 * @return array {
 *     Array of plugin information for the strings.
 *
 * @type string $Name Plugin mame.
 * @type string $PluginURI Plugin URL.
 * @type string $Version Version.
 * @type string $Description Description.
 * @type string $Author Author name.
 * @type string $AuthorURI Author URL.
 * @type string $TextDomain textdomain.
 * @type string $DomainPath mo file dir.
 * @type string $Network Multisite.
 * }
 */
function get_plugin_data() {
	static $data = null;
	if ( empty( $data ) ) {
		$data = \get_file_data(
			__FILE__,
			array(
				'Name'        => 'Plugin Name',
				'PluginURI'   => 'Plugin URI',
				'Version'     => 'Version',
				'Description' => 'Description',
				'Author'      => 'Author',
				'AuthorURI'   => 'Author URI',
				'TextDomain'  => 'Text Domain',
				'DomainPath'  => 'Domain Path',
				'Network'     => 'Network',
			)
		);
	}

	return $data;
}


/**
 * Block Initializer.
 */
require_once dirname( __FILE__ ) . '/includes/init.php';
