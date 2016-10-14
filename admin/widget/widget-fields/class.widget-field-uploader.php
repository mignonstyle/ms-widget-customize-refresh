<?php
/**
 * Name        : MS_Widget_Field_Uploader
 * Author      : Mignon Style
 * License     : GPLv2 or later
 * License URI : http://www.gnu.org/licenses/gpl-2.0.html
 * Version     : 0.1
 */

if ( ! defined( 'ABSPATH' ) )
	exit();

class MS_Widget_Field_Uploader {

	/**
	 * Form the fields in widget
	 */
	public static function form_field_widget_uploader( $key_value, $key_id, $key_name, $value ) {

		$output = '';
		$input_label = $value['label'];
		$remove_button_class = ! empty( $key_value ) ? 'contents-show' : 'contents-hide';

		$output .= '<div id="widget-' . esc_attr( $key_id ) . '" class="uploader-contents widget-media-upload">' . "\n";

		if ( ! empty( $input_label ) ) {
			$output .= '<label>' . wp_kses( $input_label, MS_Widget_Template_Tags::widget_wp_kses_allowed_html() ) . ': </label><br/>' . "\n";
		}

		// Field that stores the URL of the image
		$output .= '<input id="' . esc_attr( $key_id ) . '" name="' . esc_attr( $key_name ) . '" value="' . esc_url( $key_value ) . '" type="hidden" class="widefat widget-image-url" />' . "\n";

		// Display of the preview image
		$output .= '<div class="widget-upload-preview widget">' . "\n";
		if ( ! empty( $key_value ) ) {
			$image_src = esc_url( $key_value );

			if ( preg_match( '/(^.*\.jpg|jpeg|png|gif|ico*)/i', $image_src ) ) {
				// image alt
				$attachiment_id = MS_Admin_Template_Tags::get_attachment_id( $image_src );
				$img_alt = ! empty( $attachiment_id ) ? MS_Admin_Template_Tags::get_attachment_alt( $attachiment_id ) : '';

				$output .= '<img src="' . esc_url( $image_src ) . '" class="widget-preview-image" alt="' . esc_attr( $img_alt ) . '" />' . "\n";
			}
		}

		$output .= '</div>' . "\n";
		$output .= '<div class="clearfix buttons">' . "\n";

		// upload button
		$output .= '<input id="widget-upload-' . esc_attr( $key_id ) . '" class="button widget-button widget-upload-button" value="' . __( 'Select Image', MS_WCR_TEXT_DOMAIN ) . '" type="button" />' . "\n";
		// remove button
		$output .= '<input id="widget-remove-' . esc_attr( $key_id ) . '" class="button widget-button widget-remove-button ' . esc_attr( $remove_button_class ) . '" value="' . __( 'Delete Image', MS_WCR_TEXT_DOMAIN ) . '" type="button" />' . "\n";

		$output .= '</div>' . "\n";

		if ( ! empty( $value['desc'] ) ) {
			$output .= wp_kses( $value['desc'], MS_Widget_Template_Tags::widget_wp_kses_allowed_html() );
		}

		$output .= '</div>' . "\n";

		return $output;
	}

	/**
	 * Update the fields in widget
	 */
	public static function update_field_widget_uploader( $key, $instance, $new_instance, $value ) {

		$instance[$key] = esc_url( $new_instance[$key] );

		return $instance[$key];
	}
}
