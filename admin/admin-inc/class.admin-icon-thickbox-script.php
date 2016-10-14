<?php
/**
 * Name        : MS_Admin_Icon_Thickbox_Script
 * Author      : Mignon Style
 * License     : GPLv2 or later
 * License URI : http://www.gnu.org/licenses/gpl-2.0.html
 * Version     : 0.1
 */

if ( ! defined( 'ABSPATH' ) )
	exit();

class MS_Admin_Icon_Thickbox_Script {

	/**
	 * add admin icon's thickbox scripts
	 */
	public static function admin_icon_thickbox_scripts() {
	?>
<script>
<!--
jQuery( function( $ ) {
	var icon_button_select = '.icon-button-select';
	var icon_selected = '';
	var select_icon = '';
	var parent = '';

	var remove_icon_select = 'remove-icon-select';
	var upload_icon_select = 'upload-icon-select';

	$( icon_button_select ).prop( 'disabled', true );

	/**
	 * get select icon
	 */
	get_select_icon();
	function get_select_icon() {
		$( document ).on( 'click', '.icon-list', function( e ) {
			var select_icon = $( this );
			select_icon.toggleClass( 'on' );
			$( icon_button_select ).prop( 'disabled', false );

			if ( select_icon.hasClass( 'on' ) ) {
				icon_selected = select_icon.attr( 'ID' );
				icon_selected = 'fa ' + icon_selected;
				select_icon_closest( select_icon );
			} else {
				icon_selected = '';
				$( icon_button_select ).prop( 'disabled', true );
			}

			// Get the ID of the parent element
			if ( select_icon.closest( '.icon-lists' ) ) {
				var parent = select_icon.closest( '.icon-lists' );
				parent = $( '#' + parent.attr( 'ID' ) );
			}

			set_select_icon_value( parent, icon_selected );
		} );
	}

	/**
	 * select icon closest
	 */
	function select_icon_closest( select_icon ) {
		$( document ).on( 'click', '.icon-list', function( e ) {
			if ( !$( e.target ).closest( select_icon ).length ) {
				select_icon.removeClass( 'on' );
			}
		} );
	}

	/**
	 * set icon value
	 */
	function set_select_icon_value( parent, icon_selected ) {
		$( 'input.widget-icon-name', parent ).val( icon_selected );
		$( '.icon-preview i', parent ).removeClass().addClass( icon_selected );
	}

	/**
	 * thickbox close
	 */
	thickbox_close();
	function thickbox_close() {
		$( document ).on( 'click', icon_button_select, function( e ) {
			thickbox_tb_remove();

			$( '.icon-contents' ).removeClass( remove_icon_select );
		} );
	}

	/**
	 * icon delete
	 */
	icon_delete();
	function icon_delete() {
		$( document ).on( 'click', '.icon-contents .widget-remove-button', function( e ) {
			var delete_icon = $( this );

			// Get the ID of the parent element
			if ( delete_icon.closest( '.icon-contents' ) ) {
				var delete_parent = delete_icon.closest( '.icon-contents' );
				delete_parent = $( '#' + delete_parent.attr( 'ID' ) );

				delete_parent.removeClass( upload_icon_select ).addClass( remove_icon_select );
			}

			$( 'input.widget-icon-name', delete_parent ).val( '' );
			$( '.icon-preview i', delete_parent ).removeClass();
		} );
	}

	/**
	 * thickbox tb remove
	 */
	function thickbox_tb_remove() {
		$( '#TB_imageOff' ).unbind( 'click' );
		$( '#TB_closeWindowButton' ).unbind( 'click' );

		$( '#TB_window' ).fadeOut( 'fast', function() {
			$( '#TB_window, #TB_overlay, #TB_HideSelect' ).trigger( 'tb_unload' ).unbind().remove();
		} );

		$( 'body' ).removeClass( 'modal-open' );
		$( '#TB_load' ).remove();

		if ( typeof document.body.style.maxHeight == 'undefined' ) { //if IE 6
			$( 'body', 'html' ).css( {height: 'auto', width: 'auto'} );
			$( 'html' ).css( 'overflow', '' );
		}

		$( document ).unbind( '.thickbox' );
		return false;
	}
	} );
-->
</script>
	<?php
	}
}
