<?php
/**
 * Name        : MS_Widget_Field_Select
 * Author      : Mignon Style
 * License     : GPLv2 or later
 * License URI : http://www.gnu.org/licenses/gpl-2.0.html
 * Version     : 0.1
 */

if ( ! defined( 'ABSPATH' ) )
	exit();

class MS_Widget_Field_Select {

	/**
	 * Form the fields in widget
	 */
	public static function form_field_widget_select( $key_value, $key_id, $key_name, $value ) {

		$output = '';
		$input_label = $value['label'];
		$select_array = $value['array'];

		$output .= '<p class="select-contents ' . esc_attr( $key_name ) . '">' . "\n";

		if ( ! empty( $input_label ) ) {
			$output .= '<label for="' . esc_attr( $key_id ) . '">' . wp_kses( $input_label, MS_Widget_Template_Tags::widget_wp_kses_allowed_html() ) . ': </label><br />' . "\n";
		}

		$output .= '<select id="' . esc_attr( $key_id ) . '" name="' . esc_attr( $key_name ) . '" class="widefat">' . "\n";

		foreach( $select_array as $array ) {
			$output .= '<option value="' . esc_attr( $array['slug'] ) . '"' . selected( $key_value, $array['slug'], false ) . '>' . esc_attr( $array['label'] ) . '</option>' . "\n";
		}

		$output .= '</select>' . "\n";

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
	public static function update_field_widget_select( $key, $instance, $new_instance, $value ) {

		// Convert the value slug into an array
		$array_slug = array();

		if ( isset( $value['array'] ) ) {
			foreach( $value['array'] as $array ) {
				$array_slug[] = $array['slug'];
			}
		}

		// set the instance
		if ( isset( $value['array'] ) ) {
			if ( in_array( $new_instance[$key], $array_slug ) ) {
				// Selected value
				$instance[$key] = $new_instance[$key];
			} else {
				// default
				$instance[$key] = $value['value'];
			}
		}

		return $instance[$key];
	}
}