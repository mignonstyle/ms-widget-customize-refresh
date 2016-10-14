<?php
/**
 * Name        : MS_Widget_Field_Textarea
 * Author      : Mignon Style
 * License     : GPLv2 or later
 * License URI : http://www.gnu.org/licenses/gpl-2.0.html
 * Version     : 0.1
 */

if ( ! defined( 'ABSPATH' ) )
	exit();

class MS_Widget_Field_Textarea {

	/**
	 * Form the fields in widget
	 */
	public static function form_field_widget_textarea( $key_value, $key_id, $key_name, $value ) {

		$output = '';
		$input_label = $value['label'];

		$output .= '<p class="textarea-contents ' . esc_attr( $key_name ) . '">' . "\n";

		if ( ! empty( $input_label ) ) {
			$output .= '<label for="' . esc_attr( $key_id ) . '">' . wp_kses( $input_label, MS_Widget_Template_Tags::widget_wp_kses_allowed_html() ) . ': </label><br />' . "\n";
		}

		$output .= '<textarea id="' . esc_attr( $key_id ) . '" name="' . esc_attr( $key_name ) . '" cols="20" rows="3" class="widefat">';
		$output .= $key_value;
		$output .= '</textarea>' . "\n";

		// desc after
		$output .= '<br class="input-space" />' . "\n";
		$output .= '<span class="text-note small">' . __( 'You can use the HTML tags of the post page.', MS_WCR_TEXT_DOMAIN ) . '</span>';

		if ( ! empty( $value['desc'] ) ) {
			$output .= '<br />' . "\n";
			$output .= wp_kses( $value['desc'], MS_Widget_Template_Tags::widget_wp_kses_allowed_html() );
		}

		$output .= '</p>' . "\n";

		return $output;
	}

	/**
	 * Update the fields in widget
	 */
	public static function update_field_widget_textarea( $key, $instance, $new_instance, $value ) {

		if ( current_user_can( 'unfiltered_html' ) ) {
			$instance[$key] =  $new_instance[$key];
		} else {
			$instance[$key] = wp_kses_post( stripslashes( $new_instance[$key] ) );
		}

		return $instance[$key];
	}
}