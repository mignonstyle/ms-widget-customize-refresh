<?php
/**
 * Plugin Name: MS Widget Customize Refresh
 * Plugin URI: https://github.com/mignonstyle/ms-widget-customize-refresh
 * Description: The JavaScript test code for the live preview,  do not use the auto-reload of the original widget of WordPress.
 * Author: Mignon Style
 * Author URI: http://mignonstyle.com
 * Text Domain: ms-widget-customize-refresh
 * Domain Path: /languages/
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 * Version: 0.1
 */

if ( ! defined( 'ABSPATH' ) )
	exit();

// plugin version
$data = get_file_data( __FILE__, array( 'version' => 'Version' ) );
define( 'MS_WCR_VERSION', $data['version'] );

// plugin file base url
define( 'MS_WCR_URL', plugin_dir_url( __FILE__ ) );

// plugin file base path
define( 'MS_WCR_PATH', plugin_dir_path( __FILE__ ) );

// domain
define( 'MS_WCR_TEXT_DOMAIN', 'ms-widget-customize-refresh' );

// plugin file base name
//define( 'MS_WCR_BASE_FILE', plugin_basename( __FILE__ ) );

// plugin file dirname
//define( 'MS_WCR_DIRNAME', dirname( __FILE__ ) );

// prefix
//define( 'MS_WCR_PREFIX', 'ms_wcr' );

// widget classname prefix
//define( 'MS_WCR_CLASSNAME', 'ms-wcr' );

class MS_Widget_Customize_Refresh {

	/**
	 * __construct
	 */
	public function __construct() {

		// include widget file
		include_once( MS_WCR_PATH . 'admin/widget/ms-widget.php' );

		// hooks
		add_action( 'plugins_loaded', array( $this, 'plugins_loaded' ) );
		add_action( 'init', array( $this, 'init' ) );

		// uninstall hook
		register_uninstall_hook( __FILE__, array( __CLASS__, 'uninstall' ) );
	}

	/**
	 * init
	 */
	public function init() {
		// add init function
	}

	/**
	 * uninstall
	 */
	public static function uninstall() {
		//dalete_option( MS_WCR_KEY );
	}

	/**
	 * plugins_loaded
	 */
	public function plugins_loaded() {
		load_plugin_textdomain( MS_WCR_TEXT_DOMAIN, false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
	}
}
new MS_Widget_Customize_Refresh();
