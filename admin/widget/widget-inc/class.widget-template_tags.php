<?php
/**
 * Name        : MS_Widget_Template_Tags
 * Author      : Mignon Style
 * License     : GPLv2 or later
 * License URI : http://www.gnu.org/licenses/gpl-2.0.html
 * Version     : 0.1
 */

if ( ! defined( 'ABSPATH' ) )
	exit();

class MS_Widget_Template_Tags {

	/**
	 * __construct
	 */
	public function __construct() {
	}

	/**
	 * Allow tag to wp_kses
	 */
	public static function widget_wp_kses_allowed_html() {
		$allowed_html = array(
			'a'    => array(
				'href'   => array (),
				'target' => array(),
			),
			'br'   => array(),
			'span' => array(
				'id'    => array(),
				'class' => array(),
				'style' => array(),
			),
		);

		return $allowed_html;
	}
}