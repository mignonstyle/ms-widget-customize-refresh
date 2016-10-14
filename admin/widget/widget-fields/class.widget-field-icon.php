<?php
/**
 * Name        : MS_Widget_Field_Icon
 * Author      : Mignon Style
 * License     : GPLv2 or later
 * License URI : http://www.gnu.org/licenses/gpl-2.0.html
 * Version     : 0.1
 */

if ( ! defined( 'ABSPATH' ) )
	exit();

class MS_Widget_Field_Icon {

	/**
	 * Form the fields in widget
	 */
	public static function form_field_widget_icon( $key_value, $key_id, $key_name, $value ) {

		$output = '';
		$input_label = $value['label'];
		$remove_button_class = ! empty( $key_value ) ? 'contents-show' : 'contents-hide';

		$output .= '<div id="icon-' . esc_attr( $key_id ) . '" class="icon-contents widget-icon-select">' . "\n";

		$output .= '<p>';
		if ( ! empty( $input_label ) ) {
			$output .= '<label>' . wp_kses( $input_label, MS_Widget_Template_Tags::widget_wp_kses_allowed_html() ) . ': </label><br/>' . "\n";
		}
		$output .= '</p>';

		// icon iframe
		$output .= self::icon_contents_select_box( $key_value, $key_id, $key_name );

		$output .= '<div class="clearfix buttons">' . "\n";

		// upload button
		$output .= '<a class="thickbox button widget-button widget-upload-button" href="/#TB_inline?inlineId=icon-' . esc_attr( $key_id ) . '-box" title="' . __( 'Font Awesome Icon', MS_WCR_TEXT_DOMAIN ) . '"><i class="fa fa-font-awesome buttons_icon" aria-hidden="true"></i>' . __( 'Select Icon', MS_WCR_TEXT_DOMAIN ) . '</a>' . "\n";

		// remove button
		$output .= '<input id="widget-remove-' . esc_attr( $key_id ) . '" class="button widget-button widget-remove-button ' . esc_attr( $remove_button_class ) . '" value="' . __( 'Delete Icon', MS_WCR_TEXT_DOMAIN ) . '" type="button" />' . "\n";

		$output .= '</div>' . "\n";

		if ( ! empty( $value['desc'] ) ) {
			$output .= '<br class="input-space" />' . "\n";
			$output .= wp_kses( $value['desc'], MS_Widget_Template_Tags::widget_wp_kses_allowed_html() );
		}

		$output .= '</div><!-- /.icon-contents -->' . "\n";

		return $output;
	}

	/**
	 * icon_contents_select_box
	 */
	public static function icon_contents_select_box( $key_value, $key_id, $key_name ) {

		$output = '';

		$output .= '<div id="icon-' . esc_attr( $key_id ) . '-box" class="icon-contents-box"><p>' . "\n";
		$output .= '<div id="icon-' . esc_attr( $key_id ) . '-box-innder" class="icon-lists">' . "\n";

		$output .= '<input id="icon-' . esc_attr( $key_id ) . '" name="' . esc_attr( $key_name ) . '" value="' . esc_attr( $key_value ) . '" type="hidden" class="widefat widget-icon-name" />' . "\n";

		// add Icon font output

		// Display of the preview icon
		$output .= '<div class="widget-icon-preview">' . "\n";
		if ( ! empty( $key_value ) ) {
			$output .= '<p class="icon-preview" style="color: #fff"><i class="' . esc_attr( $key_value ) . '"></i></p>' . "\n";
		}
		$output .= '</div>' . "\n";

		$output .= '</div>' . "\n";

		$output .= '<div class="buttons-inner"><p>' . "\n";
		$output .= '<button class="button icon-button button-primary button-large icon-button-select" type="button">' . __( 'Icon select', MS_WCR_TEXT_DOMAIN ) . '</button>' . "\n";
		$output .= '</p></div>' . "\n";

		$output .= '</p></div>' . "\n";

		return $output;
	}

	/**
	 * Update the fields in widget
	 */
	public static function update_field_widget_icon( $key, $instance, $new_instance, $value ) {

		$instance[$key] = esc_attr( $new_instance[$key] );

		return $instance[$key];
	}
}

function MS_output_Icon_list() {
	global $hook_suffix;

	if( ! preg_match( "/^(customize|widgets)\.php/", $hook_suffix ) )
		return;

	// Icon font output
	$output = '<div id="font_awesome-list">';
	$output .= '<ul class="icons-inner clearfix">' . "\n";

	$font_awesome = new MS_Font_Awesome_Variables();
	$fonts = $font_awesome::font_awesome_variables();

	foreach( $fonts as $icon_font ) {
		$output .= '<li id="fa fa-' . esc_attr( $icon_font ) . '" class="icon-list"><i class="fa fa-' . esc_attr( $icon_font ) . ' icon-name"></i><p class="icon-label">' . esc_attr( $icon_font ) . '</p></li>' . "\n";
	}

	$output .= '</ul></div>' . "\n";

	echo $output;
}
add_action( 'admin_footer', 'MS_output_Icon_list' );
add_action( 'customize_controls_print_footer_scripts', 'MS_output_Icon_list' );