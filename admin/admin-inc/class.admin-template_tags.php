<?php
/**
 * Name        : MS_Admin_Template_Tags
 * Author      : Mignon Style
 * License     : GPLv2 or later
 * License URI : http://www.gnu.org/licenses/gpl-2.0.html
 * Version     : 0.1
 */

if ( ! defined( 'ABSPATH' ) )
	exit();

class MS_Admin_Template_Tags {

	/**
	 * __construct
	 */
	public function __construct() {
	}

	/**
	 * Check whether the URL
	 */
	public static function is_url( $url ) {
		if ( '' == $url )
			return $url;

		$url = str_replace( ' ', '%20', $url );
		$url = preg_replace( '|[^a-z0-9-~+_.?#=!&;,/:%@$\|*\'()\[\]\\x80-\\xff]|i', '', $url );

		$pattern = '/^(https?|ftp|ftps|mailto|news|irc|gopher|nntp|feed|telnet|mms|rtsp|svn|tel|fax|xmpp|webcal)(:\/\/[-_.!~*\'()a-zA-Z0-9;\/?:\@&=+\$,%#]+)$/';

		if ( preg_match( $pattern, $url ) ) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * retrieves the attachment ID from the file URL
	 */
	public static function get_attachment_id( $image_url ) {
		global $wpdb;

		$attachment = $wpdb->get_col( $wpdb->prepare( "SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url ) );
		$attachment_id = ! empty( $attachment ) ? $attachment[0] : '';

		return $attachment_id;
	}

	/**
	 * get the attachment caption
	 */
	public static function get_attachment_caption( $attachiment_id ) {
		$thumb_post = get_post( $attachiment_id );
		$img_caption = ! empty( $thumb_post ) ? $thumb_post->post_excerpt : '';

		return $img_caption;
	}

	/**
	 * get the attachment description
	 * attachment post content
	 */
	public static function get_attachment_desc( $attachiment_id ) {
		$thumb_post = get_post( $attachiment_id );
		$img_content = ! empty( $thumb_post ) ? $thumb_post->post_content : '';

		return $img_content;
	}

	/**
	 * get the attachment alt
	 */
	public static function get_attachment_alt( $attachiment_id ) {
		$img_alt = get_post_meta( $attachiment_id, '_wp_attachment_image_alt', true );
		$img_alt = ! empty( $img_alt ) ? $img_alt : '';

		return $img_alt;
	}
}
