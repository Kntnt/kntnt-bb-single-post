<?php

/**
 * Plugin main file.
 *
 * @wordpress-plugin
 * Plugin Name:       Kntnt's Single Post Module for Beaver Builder
 * Plugin URI:        https://github.com/TBarregren/kntnt-bb-single-post
 * Description:       Provides a Beaver Builder module featuring a single post's thumbnail, heading, exerpt and metadata.
 * Version:           1.0.0
 * Author:            Thomas Barregren
 * Author URI:        https://www.kntnt.se/
 * License:           GPLv3
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain:       kntnt-bb-single-post
 * Domain Path:       /languages
 */

namespace Kntnt\BB_Single_Post;

defined( 'WPINC' ) || die;

define( 'PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'PLUGIN_URL', plugins_url( '/', __FILE__ ) );

new Plugin();

final class Plugin {

	public function __construct() {
	  add_action( 'init', [ $this, 'run' ] );
	}
	
	public function run() {

    // Nothing to do if Beaver Builder is not installed and activated.
    if ( ! class_exists( 'FLBuilder' ) ) return;

		// Setup localization.
		load_plugin_textdomain( 'kntnt-bb-single-post', false, 'languages' );

    // Load the module
    require_once 'module/single-post.php';

	}

}
