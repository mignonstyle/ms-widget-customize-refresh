<?php

return false;

/**
 * 四則演算を行うクラス テスト用
 */

class Arithmetic {
	/**
	* 足し算
	*/
	public function add( $x, $y ) {
		$ret =  $x + $y;
		return( $ret );
	}

	/**
	* 引き算
	*/
	public function subtract( $x, $y ) {
		$ret =  $x - $y;
		return( $ret );
	}

	/**
	* 掛け算
	*/
	public function multiply( $x, $y ) {
		$ret =  $x * $y;
		return( $ret );
	}

	/**
	* 割り算
	*/
	public function divide( $x, $y ) {
		$ret =  $x / $y;
		return( $ret );
	}
}
