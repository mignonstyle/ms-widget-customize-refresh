<?php
/**
 * Name        : MS_Widget_Field_Checkbox
 * Author      : Mignon Style
 * License     : GPLv2 or later
 * License URI : http://www.gnu.org/licenses/gpl-2.0.html
 * Version     : 0.1
 */

if ( ! defined( 'ABSPATH' ) )
	exit();

class MS_Widget_Field_Checkbox {

	/**
	 * Form the fields in widget
	 */
	public static function form_field_widget_checkbox( $key_value, $key_id, $key_name, $value ) {

		$output = '';
		$input_label = $value['label'];

		$output .= '<p id="' . esc_attr( $key_id ) . '_box" class="checkbox-contents ' . esc_attr( $key_name ) . '">' . "\n";
		$output .= '<input id="' . esc_attr( $key_id ) . '" name="' . esc_attr( $key_name ) . '" type="checkbox" value="1" class="checkbox" ' . checked( $key_value, 1, false ) . ' />' . "\n";

		if ( ! empty( $input_label ) ) {
			$output .= '<label for="' . esc_attr( $key_id ) . '">' . wp_kses( $input_label, MS_Widget_Template_Tags::widget_wp_kses_allowed_html() ) . '</label>' . "\n";
		}

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
	public static function update_field_widget_checkbox( $key, $instance, $new_instance, $value ) {

		if ( ! isset( $new_instance[$key] ) )
			$new_instance[$key] = null;

		$instance[$key] = ( $new_instance[$key] == 1 ? 1 : 0 );

		return $instance[$key];
	}
}
