<?php

include '../src/ArrayToPathNamedObject.php';

class ArrayToPathNamedObjectTest extends PHPUnit_Framework_TestCase {

	public $json;

	public $object;

	public function __construct() {
		$this->json = file_get_contents('input.json');
		$this->object = new ArrayToPathNamedObject($this->json);
	}

	public function testLongPathNames() {
		$this->assertObjectHasAttribute('location_address_second_another_testing', $this->object);
	}

	public function testNullValues() {
		$this->assertNull($this->object->location_address_second_another_testing);
	}

}