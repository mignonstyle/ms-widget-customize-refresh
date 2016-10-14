<?php
/**
 * Name        : MS_Widget
 * Author      : Mignon Style
 * License     : GPLv2 or later
 * License URI : http://www.gnu.org/licenses/gpl-2.0.html
 * Version     : 0.1
 */

if ( ! defined( 'ABSPATH' ) )
	exit();

// widget prefix
define( 'MS_WCR_WIDGET_PREFIX', 'MS_Widget' );

class MS_Widget {

	static $widget_key = 'MS_Widget';

	/**
	 * __construct
	 */
	public function __construct() {

		// include trait
		include_once( MS_WCR_PATH . 'admin/widget/traits/widget-base-form.php' );

		// include admin widget settings and widgets init
		foreach ( glob( MS_WCR_PATH . 'admin/widget/widget-settings/*.php' ) as $widget_item ) {
			include_once $widget_item;

			$basename = basename( $widget_item, '.php' );
			$widget_name = preg_replace( '/^class\.widget\-(.+)$/', '$1', $basename );
			$class_name = MS_WCR_WIDGET_PREFIX . '_' . $widget_name;

			add_action( 'widgets_init', array( $class_name, 'init' ) );
		}

		// include widget functions
		foreach ( glob( MS_WCR_PATH . 'admin/widget/widget-inc/*.php' ) as $func_item ) {
			include_once $func_item;
		}

		// include widget fields
		foreach ( glob( MS_WCR_PATH . 'admin/widget/widget-fields/*.php' ) as $form_item ) {
			include_once $form_item;
		}

		// include common functions
		foreach ( glob( MS_WCR_PATH . 'admin/admin-inc/*.php' ) as $common_item ) {
			include_once $common_item;
		}
	}

	/**
	 * return widget fields type
	 */
	public static function widget_field_type() {
		$field_type = array();

		foreach ( glob( MS_WCR_PATH . 'admin/widget/widget-fields/*.php' ) as $widget_form_item ) {
			$basename = basename( $widget_form_item, '.php' );
			$field_type[] = preg_replace( '/^class\.widget-field\-(.+)$/', '$1', $basename );
		}

		return $field_type;
	}
}
new MS_Widget();