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
		$this->assertObjectHasAttribute('contact_address_state', $this->object);
	}

	public function testNullValues() {
		$this->assertNull($this->object->contact_email);
	}

	public function testConflict() {
		try {
			$obj = new ArrayToPathNamedObject(file_get_contents('conflict.json'));
			$this->assertTrue(false, 'Exception Was Not Thrown - Conflict Not Found');
		} catch(Exception $e) {
			$this->assertTrue(true);
		}
	}

}