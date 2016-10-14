<?php
/**
 * Name        : MS_Widget_Admin_Enqueue_Scripts
 * Author      : Mignon Style
 * License     : GPLv2 or later
 * License URI : http://www.gnu.org/licenses/gpl-2.0.html
 * Version     : 0.1
 */

if ( ! defined( 'ABSPATH' ) )
	exit();

class MS_Widget_Admin_Enqueue_Scripts {

	/**
	 * __construct
	 */
	public function __construct() {
		// add admin enqueue scripts
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_widgets_enqueue_scripts' ), 9999 );
		add_action( 'admin_footer-widgets.php', array( $this, 'admin_footer_widgets_scripts' ), 9999 );
	}

	/**
	 * add admin_enqueue_scripts
	 */
	public function admin_widgets_enqueue_scripts( $hook ) {
		if ( 'widgets.php' !== $hook )
			return;

		// widget prefix name
		$widget_prefix = MS_WCR_WIDGET_PREFIX;
		$widget_prefix_lower_case = mb_strtolower( $widget_prefix );
		$widget_prefix_name = str_replace(  '_', '-', $widget_prefix_lower_case );

		// add thickbox
		add_thickbox();

		// color picker
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'wp-color-picker' );

		// font-awesome
		$awesome_ver = '4.6.3';
		$awesome_path = 'https://maxcdn.bootstrapcdn.com/font-awesome/' . $awesome_ver . '/css/font-awesome.min.css';
		wp_enqueue_style( $widget_prefix_name . '-font-awesome', $awesome_path, array(), $awesome_ver );

		// plugin admin widget page style
		wp_enqueue_style( $widget_prefix_name . '-admin-widget', MS_WCR_URL . 'admin/widget/widget-css/admin-widget.min.css', array(), MS_WCR_VERSION );

		// media uploader
		if ( function_exists( 'wp_enqueue_media' ) ) {
			$widget_uploader_name = $widget_prefix_name . '-widget-media-uploader';

			wp_enqueue_media();
			wp_register_script( $widget_uploader_name, MS_WCR_URL . 'admin/widget/widget-js/widget-media-uploader.min.js', array( 'jquery' ), MS_WCR_VERSION, true );
			$translation_array = array(
				'title'  => __( 'Select Image', MS_WCR_TEXT_DOMAIN ),
				'button' => __( 'Set up Image', MS_WCR_TEXT_DOMAIN ),
			);

			wp_localize_script( $widget_uploader_name, 'widget_media_text', $translation_array );
			wp_enqueue_script( $widget_uploader_name );
		}
	}

	/**
	 * add admin_footer_widgets_scripts
	 * 
	 * The source is here
	 * https://core.trac.wordpress.org/attachment/ticket/25809/color-picker-widget.php
	 */
	public function admin_footer_widgets_scripts() {
		// add color-picker js
		MS_Admin_Color_Picker_Script::admin_color_picker_scripts();

		// add icon thickbox js
		MS_Admin_Icon_Thickbox_Script::admin_icon_thickbox_scripts();
?>
<script>
function MS_widget_refresh(){
	jQuery( '.icon-contents-box' ).each( function() {
		if( !jQuery(this).find( '.icons-inner' ).size() ) {
			var c=jQuery( '#font_awesome-list .icons-inner' ).clone();
			jQuery( this ).find( '.icon-lists' ).append( c );
		}
	} );
}
window.addEventListener( 'load', function( eve ) {
	MS_widget_refresh();
}, false );
</script>
<?php
	}
}
new MS_Widget_Admin_Enqueue_Scripts();