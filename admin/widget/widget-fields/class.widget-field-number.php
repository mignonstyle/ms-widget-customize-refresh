<?php
/**
 * Name        : MS_Widget_Field_Number
 * Author      : Mignon Style
 * License     : GPLv2 or later
 * License URI : http://www.gnu.org/licenses/gpl-2.0.html
 * Version     : 0.1
 */

if ( ! defined( 'ABSPATH' ) )
	exit();

class MS_Widget_Field_Number {

	/**
	 * Form the fields in widget
	 */
	public static function form_field_widget_number( $key_value, $key_id, $key_name, $value ) {

		$output = '';
		$input_label = $value['label'];

		$output .= '<p class="number-contents ' . esc_attr( $key_name ) . '">' . "\n";
		if ( ! empty( $input_label ) ) {
			$output .= '<label for="' . esc_attr( $key_id ) . '">' . wp_kses( $input_label, MS_Widget_Template_Tags::widget_wp_kses_allowed_html() ) . ': </label><br />' . "\n";
		}

		$output .= '<input id="' . esc_attr( $key_id ) . '" name="' . esc_attr( $key_name ) . '" value="' . absint( $key_value ) . '" type="number" class="tiny-text" />' . "\n";

		if ( ! empty( $value['desc'] ) ) {
			$output .= '<br class="input-space" />' . "\n";
			$output .= wp_kses( $value['desc'], MS_Widget_Template_Tags::widget_wp_kses_allowed_html() );
		}

		$output .= '</p>' . "\n";

		return $output;
	}

	/**
	 * Update the fields in widget
	 */
	public static function update_field_widget_number( $key, $instance, $new_instance, $value ) {

		$instance[$key] = absint( $new_instance[$key] );

		return $instance[$key];
	}
}