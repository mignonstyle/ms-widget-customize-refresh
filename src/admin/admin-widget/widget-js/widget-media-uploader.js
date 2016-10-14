/**
 * Name        : widget-media-uploader
 * Author      : Mignon Style
 * License     : GPLv2 or later
 * License URI : http://www.gnu.org/licenses/gpl-2.0.html
 * Version     : 0.1
 */

jQuery( function( $ ) {
	var custom_uploader;

	ms_widget_media_uploader();

	/**
	 * widget-media-uploader
	 */
	function ms_widget_media_uploader() {

		// Click on the select image button
		$( document ).on( 'click', '.widget-upload-button', function( e ) {
			if( $( '.widget-media-upload' ).size() ) {
				$( '.widget-media-upload' ).removeClass( 'upload-select' );
			}

			// Get the class name of the parent element
			if ( $( e.target ).closest( '.widget-media-upload' ) ) {
				var parent = $( e.target ).closest( '.widget-media-upload' );
				parent = parent.addClass( 'upload-select' );
				ms_widget_add_file( e, parent );
			}
		} );

		// Click the Delete image button
		$( document ).on( 'click', '.widget-remove-button', function( e ) {
			e.preventDefault();
			e.stopPropagation();

			if( $( e.target ).closest( '.widget-media-upload' ) ) {
				var parent = $( e.target ).closest( '.widget-media-upload' );
				ms_widget_remove_file( parent );
			}
		} );
	}

	/**
	 * Get the Image
	 */
	function ms_widget_add_file( e, parent ) {
		e.preventDefault();

		// If the custom_uploader already exists, reopen it.
		if ( custom_uploader ) {
			custom_uploader.open();
			return;
		}

		// Create the custom_uploader
		custom_uploader = wp.media( {
			title: widget_media_text.title,
			library: {
				type: 'image'
			},
			button: {
				text: widget_media_text.button,
				close: false,
			},
			multiple: false,
		} );

		// When an image is selected, run a callback.
		custom_uploader.on( 'select', function() {
			var image = custom_uploader.state().get( 'selection' ).first();
			custom_uploader.close();

			// Get the ID of the parent element.
			var parent_ID = $( '.upload-select' ).attr( 'ID' );
			parent = $( '#' + parent_ID );

			if ( image.attributes.type == 'image' ) {
				ms_widget_remove_val( parent );

				$( 'input.widget-image-url', parent ).val( image.attributes.url );
				$( '.widget-upload-preview', parent ).append( '<img src="'+image.attributes.url+'" class="widget-preview-image" alt="'+image.attributes.title+'" />' );
				$( '.widget-remove-button', parent ).removeClass( 'contents-hide' ).addClass( 'contents-show' );

				if ( $( parent ).next( '.contents-thumb-settings' ).length ) {
					$( parent ).next( '.contents-thumb-settings' ).removeClass( 'form-close' ).addClass( 'form-open' );
				}

				//ms_widget_trigger_click( parent );
			}
		} );

		// Finally, open the modal.
		custom_uploader.open();
	}

	/**
	 * Delete the image
	 */
	function ms_widget_remove_file( parent ) {
		var parent = $( '#' + parent.attr( 'ID' ) );
		ms_widget_remove_val( parent );

		$( '.widget-remove-button', parent ).removeClass( 'contents-show' ).addClass( 'contents-hide' );

		if ( $( parent ).next( '.contents-thumb-settings' ).length ) {
			$( parent ).next( '.contents-thumb-settings' ).removeClass( 'form-open' ).addClass( 'form-close' );
		}

		//ms_widget_trigger_click( parent );
	}

	/**
	 * Delete Value
	 */
	function ms_widget_remove_val( parent, alt_parent ) {
		$( 'input.widget-image-url', parent ).val( '' );
		$( '.widget-upload-preview', parent ).empty();
	}

	/**
	 * trigger
	 */
	function ms_widget_trigger_click( parent ) {
		var parent_form = parent.closest( 'form' );
		$( 'input[type="submit"]', parent_form ).trigger( 'click' );
	}
} );