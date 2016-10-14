<?php
/**
 * Name        : MS_Widget_Base_Form
 * Author      : Mignon Style
 * License     : GPLv2 or later
 * License URI : http://www.gnu.org/licenses/gpl-2.0.html
 * Version     : 0.1
 */

if ( ! defined( 'ABSPATH' ) )
	exit();

trait MS_Widget_Base_Form {

	/**
	 * Display for admin widget options
	 *
	 * @param array $instance
	 */
	public function form( $instance ) {

		$this->wrp_id = str_replace(  '_', '-', $this->id );
		$field_type = MS_Widget::widget_field_type();

		// The default setting for the form of the widget
		$defaults = $this->form_defaults();

		// widget form class name
		$widget_prefix_lower_case = mb_strtolower( MS_WCR_WIDGET_PREFIX );
		$widget_prefix_name = str_replace(  '_', '-', $widget_prefix_lower_case );

		// Displays if the default value of the widget is not empty in the array
		if ( is_array( $defaults ) && !empty( $defaults ) ) {
			$output = '<div id="' . $this->wrp_id . '" class="' . $widget_prefix_name . '-common ' . $this->wrp_id . '">' . "\n";

			foreach( $defaults as $key => $value ) {
				${ $key . "_value" } = ( isset( $instance[$key] ) ) ? $instance[$key] : $value['value'];
				${ $key . "_id" }    = $this->get_field_id( $key );
				${ $key . "_name" }  = $this->get_field_name( $key );

				foreach ( $field_type as $field_name ) {
					if ( $value['type'] == $field_name ) {
						$class_name  = MS_WCR_WIDGET_PREFIX . '_Field_' . $field_name;
						$method_name = 'form_field_widget_' . $field_name;

						// display the fields in widget
						if ( class_exists( $class_name ) && method_exists ( $class_name , $method_name ) ) {
							$output .= $class_name::$method_name( ${ $key . "_value" }, ${ $key . "_id" }, ${ $key . "_name" }, $value );
						}
					}
				}
			}

			$output .= '</div>';
		}

		// add widgets js
		$output .= MS_Widget_Admin_Script::widgets_admin_form_scripts( $this->wrp_id );
		$output .= '<script>(typeof MS_widget_refresh == "function") && MS_widget_refresh();</script>';

		echo $output;
	}

	/**
	 * Save widget options
	 *
	 * @param array $new_instance
	 * @param array $old_instance
	 */
	public function update( $new_instance, $old_instance ) {

		$field_type = MS_Widget::widget_field_type();
		$defaults   = $this->form_defaults();
		$instance   = $old_instance;

		if ( is_array( $defaults ) && !empty( $defaults ) ) {
			foreach( $defaults as $key => $value ) {
				foreach ( $field_type as $field_name ) {
					if ( $value['type'] == $field_name ) {
						$class_name  = MS_WCR_WIDGET_PREFIX . '_Field_' . $field_name;
						$method_name = 'update_field_widget_' . $field_name;

						if ( class_exists( $class_name ) && method_exists ( $class_name , $method_name ) ) {
							$instance[$key] = $class_name::$method_name( $key, $instance, $new_instance, $value );
						}
					}
				}
			}
		}

		return $instance;
	}
}
