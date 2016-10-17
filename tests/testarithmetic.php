<?php

return false;

/**
 * Arithmeticクラスのユニットテスト
 */
 
require_once 'PHPUnit/Autoload.php';
require_once './arithmetic.php';

class TestArithmetic extends PHPUnit_Framework_TestCase {
	/**
	* @var Arithmetic
	*/
	protected $arithmetic;

	/**
	* テスト対象のオブジェクトの生成
	*/
	protected function setUp() {
	// TODO Unitテスト開始時動作
		$this->arithmetic = new Arithmetic();
	}

	/**
	* 足し算の検証
	*/
	public function testAddition() {
		$this->assertEquals( 15, $this->arithmetic->addition( 10, 5 ) );
	}
}
