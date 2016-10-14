<?php
/**
 * Name        : MS_Widget_Field_Hidden
 * Author      : Mignon Style
 * License     : GPLv2 or later
 * License URI : http://www.gnu.org/licenses/gpl-2.0.html
 * Version     : 0.1
 */

if ( ! defined( 'ABSPATH' ) )
	exit();

class MS_Widget_Field_Hidden {

	/**
	 * Form the fields in widget
	 */
	public static function form_field_widget_hidden( $key_value, $key_id, $key_name, $value ) {

		$output = '';

		$output .= '<p class="hidden-contents ' . esc_attr( $key_name ) . '">' . "\n";
		$output .= '<input id="' . esc_attr( $key_id ) . '" name="' . esc_attr( $key_name ) . '" value="' . esc_attr( $key_value ) . '" type="hidden" class="widefat" />' . "\n";
		$output .= '</p>' . "\n";

		return $output;
	}

	/**
	 * Update the fields in widget
	 */
	public static function update_field_widget_hidden( $key, $instance, $new_instance, $value ) {

		$instance[$key] = sanitize_text_field( $new_instance[$key] );

		return $instance[$key];
	}
}