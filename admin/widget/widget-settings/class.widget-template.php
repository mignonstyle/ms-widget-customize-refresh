<?php
/**
 * Name        : MS_Widget_Template
 * Author      : Mignon Style
 * License     : GPLv2 or later
 * License URI : http://www.gnu.org/licenses/gpl-2.0.html
 * Version     : 0.1
 */

if ( ! defined( 'ABSPATH' ) )
	exit();

class MS_Widget_Template extends WP_Widget {

	use MS_Widget_Base_Form;
	static $widget_key = 'MS_Widget_Template';

	/**
	 * __construct
	 * Settings as widget name
	 */
	public function __construct() {
		$widget_name = __( 'MS Widget Template', MS_WCR_TEXT_DOMAIN );

		$widget_key_lower_case = mb_strtolower( self::$widget_key );
		$plugin_class_name = str_replace(  '_', '-', $widget_key_lower_case );

		parent::__construct(
			self::$widget_key,
			$widget_name,
			array(
				'description' => __( 'It is the basic template of the widget.', MS_WCR_TEXT_DOMAIN ),
				'classname'   => $plugin_class_name,
				'customize_selective_refresh' => true,
			)
		);

		// Enqueue style if widget is active (appears in a sidebar) or if in Customizer preview.
		if ( is_active_widget( false, false, $this->id_base ) || is_customize_preview() ) {
			add_action( 'wp_enqueue_scripts', array( $this, 'widget_enqueue_scripts' ) );
		}
	}

	/**
	 * widget enqueue scripts
	 */
	public function widget_enqueue_scripts() {
		// widget style and script 
	}

	/**
	 * Display the contents of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		// add display contents
	}

	/**
	 * Defaults Settings
	 * The default setting for the form of the widget.
	 */
	public static function form_defaults() {
		$defaults = array(
			// text
			'text' => array(
				'type'  => 'text',
				'value' => __( '', MS_WCR_TEXT_DOMAIN ),
				'label' => __( 'Text Field Label', MS_WCR_TEXT_DOMAIN ),
				'desc'  => '<span class="small">' . __( 'Explanation will enter.', MS_WCR_TEXT_DOMAIN ) . '</span>',
			),
			// url
			'url' => array(
				'type'  => 'url',
				'value' => '',
				'label' => __( 'URL Label', MS_WCR_TEXT_DOMAIN ),
				'desc'  => '<span class="small">' . __( 'Explanation will enter.', MS_WCR_TEXT_DOMAIN ) . '</span>',
			),
			// email
			'email' => array(
				'type'  => 'email',
				'value' => '',
				'label' => __( 'Email Label', MS_WCR_TEXT_DOMAIN ),
				'desc'  => '<span class="small">' . __( 'Explanation will enter.', MS_WCR_TEXT_DOMAIN ) . '</span>',
			),
			// number
			'number' => array(
				'type'  => 'number',
				'value' => '',
				'label' => __( 'Number Label', MS_WCR_TEXT_DOMAIN ),
				'desc'  => '<span class="small">' . __( 'Explanation will enter.', MS_WCR_TEXT_DOMAIN ) . '</span>',
			),
			// hidden
			'hidden' => array(
				'type'  => 'hidden',
				'value' => '',
				'desc'  => '<span class="small">' . __( 'Explanation will enter.', MS_WCR_TEXT_DOMAIN ) . '</span>',
			),
			// textarea
			'textarea' => array(
				'type'  => 'textarea',
				'value' => '',
				'label' => __( 'Textarea Label', MS_WCR_TEXT_DOMAIN ),
				'desc'  => '<span class="small">' . __( 'Explanation will enter.', MS_WCR_TEXT_DOMAIN ) . '</span>',
			),
			// checkbox
			'checkbox' => array(
				'type'  => 'checkbox',
				'value' => 1,
				'label' => __( 'Checkbox Text', MS_WCR_TEXT_DOMAIN ),
				'desc'  => '<span class="small">' . __( 'Explanation will enter.', MS_WCR_TEXT_DOMAIN ) . '</span>',
			),
			// radio
			'radio' => array(
				'type'  => 'radio',
				'value' => 'radio02',
				'label' => __( 'Radio Button Text', MS_WCR_TEXT_DOMAIN ),
				'desc'  => '<span class="small">' . __( 'Explanation will enter.', MS_WCR_TEXT_DOMAIN ) . '</span>',
				'array' => array(
					array(
						'slug'  => 'radio01',
						'label' => __( 'Radio 01', MS_WCR_TEXT_DOMAIN ),
						'img'   => 'image-square.svg',
					),
					array(
						'slug'  => 'radio02',
						'label' => __( 'Radio 02', MS_WCR_TEXT_DOMAIN ),
						'img'   => 'image-circle.svg',
					),
				),
			),
			// select
			'select' => array(
				'type'  => 'select',
				'value' => 'select02',
				'label' => __( 'Select Label', MS_WCR_TEXT_DOMAIN ),
				'desc'  => '<span class="small">' . __( 'Explanation will enter.', MS_WCR_TEXT_DOMAIN ) . '</span>',
				'array' => array(
					array(
						'slug'  => 'select01',
						'label' => __( 'Select01', MS_WCR_TEXT_DOMAIN ),
					),
					array(
						'slug'  => 'select02',
						'label' => __( 'Select02', MS_WCR_TEXT_DOMAIN ),
					),
					array(
						'slug'  => 'select03',
						'label' => __( 'Select03', MS_WCR_TEXT_DOMAIN ),
					),
				),
			),
			// picker
			'picker' => array(
				'type'  => 'picker',
				'value' => '#fff',
				'label' => __( 'Select Color', MS_WCR_TEXT_DOMAIN ),
				'desc'  => '<span class="small">' . __( 'Explanation will enter.', MS_WCR_TEXT_DOMAIN ) . '</span>',
			),
			// uploader
			'uploader' => array(
				'type'  => 'uploader',
				'value' => '',
				'label' => __( 'Select Image', MS_WCR_TEXT_DOMAIN ),
				'desc'  => '<span class="small">' . __( 'Explanation will enter.', MS_WCR_TEXT_DOMAIN ) . '</span>',
			),
			// icon
			'icon' => array(
				'type'  => 'icon',
				'value' => 'fa fa-desktop',
				'label' => __( 'Icon Label', MS_WCR_TEXT_DOMAIN ),
				'desc'  => '<span class="small">' . __( 'Explanation will enter.', MS_WCR_TEXT_DOMAIN ) . '</span>',
			),
		);

		return $defaults;
	}

	/**
	 * init
	 */
	public static function init() {
		register_widget( self::$widget_key );
	}
}