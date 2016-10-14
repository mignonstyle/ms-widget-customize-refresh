<?php
/**
 * Name        : MS_Widget_Field_Radio
 * Author      : Mignon Style
 * License     : GPLv2 or later
 * License URI : http://www.gnu.org/licenses/gpl-2.0.html
 * Version     : 0.1
 */

if ( ! defined( 'ABSPATH' ) )
	exit();

class MS_Widget_Field_Radio {

	/**
	 * Form the fields in widget
	 */
	public static function form_field_widget_radio( $key_value, $key_id, $key_name, $value ) {
		$output = '';
		$input_label = $value['label'];
		$select_array = $value['array'];

		$image_class = '';
		$img_url = '';

		if ( array_key_exists( 'array', $value ) ) {
			$value_array = array_shift( $value['array'] );

			if ( array_key_exists( 'img', $value_array ) ) {
				$image_class = ' radio-image cf';
			}
		}

		$output .= '<div class="radio-contents ' . esc_attr( $key_name ) . esc_attr( $image_class ) . '">' . "\n";

		if ( ! empty( $input_label ) ) {
			$output .= wp_kses( $input_label, MS_Widget_Template_Tags::widget_wp_kses_allowed_html() ) . '<br />' . "\n";
		}

		$output .= !empty( $select_array ) ? '<p class="radio-labels clearfix">' . "\n" : '';

		foreach( $select_array as $array ) {
			$output .= '<label class="radio">';
			$output .= '<input id="' . esc_attr( $key_id ) . '" name="' . esc_attr( $key_name ) . '" type="radio" value="' . esc_attr( $array['slug'] ) . '" class="radio" ' . checked( $key_value, $array['slug'], false ) . ' />';

			if ( ! empty( $image_class ) ) {
				$filename = MS_WCR_PATH . 'admin/widget/widget-images/' . $array['img'];

				if ( is_file( $filename ) ) {
	 				$img_url = MS_WCR_URL . 'admin/widget/widget-images/' . $array['img'];
					$output .= '<img src="' . $img_url . '" alt="' . esc_attr( $array['label'] ) . '" />';
				}
			}

			$output .= esc_attr( $array['label'] );
			$output .= '</label>' . "\n";
		}

		$output .= !empty( $select_array ) ? '</p>' . "\n" : '';

		if ( ! empty( $value['desc'] ) ) {
			$output .= wp_kses( $value['desc'], MS_Widget_Template_Tags::widget_wp_kses_allowed_html() );
		}

		$output .= '</div>' . "\n";

		return $output;
	}

	/**
	 * Update the fields in widget
	 */
	public static function update_field_widget_radio( $key, $instance, $new_instance, $value ) {

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