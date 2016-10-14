<?php
/**
 * Name        : MS_Admin_Color_Picker_Script
 * Author      : Mignon Style
 * License     : GPLv2 or later
 * License URI : http://www.gnu.org/licenses/gpl-2.0.html
 * Version     : 0.1
 */

if ( ! defined( 'ABSPATH' ) )
	exit();

class MS_Admin_Color_Picker_Script {

	/**
	 * add admin color-picker scripts
	 */
	public static function admin_color_picker_scripts() {
	?>
<script>
<!--
jQuery( function( $ ) {
	function initColorPicker( widget ) {
		widget.find( '.color-picker' ).wpColorPicker( {
			change: _.throttle( function() { // For Customizer
				$(this).trigger( 'change' );
			}, 3000 )
		} );
	}

	function onFormUpdate( event, widget ) {
		initColorPicker( widget );
	}

	$( document ).on( 'widget-added widget-updated', onFormUpdate );

	$( document ).ready( function() {
		$( '#widgets-right .widget:has(.color-picker)' ).each( function () {
			initColorPicker( $( this ) );
		} );
	} );
} );
-->
</script>
	<?php
	}
}