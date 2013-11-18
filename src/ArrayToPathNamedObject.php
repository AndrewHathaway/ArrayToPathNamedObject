<?php

class ArrayToPathNamedObject {

	/**
	 * Construct starts the conversion
	 * @param array $input The array to be converted
	 */
	public function __construct($input)	{
		if (! is_array($input)) {
			$input = json_decode($input, true);
		}

		$this->convert($input);
	}

	/**
	 * The converter
	 * @param  array  $input  Array to be converted
	 * @param  string $buffer The path-key buffer
	 */
	private function convert(array $input, $buffer = '') {
		$buffer = ($buffer != '' ? $buffer .= '_' : '');

		foreach ($input as $key => $value) {

			$key = $buffer . $key;

			if (! is_array($value)) {

				if (property_exists($this, $key)) {
					throw new Exception('Conflict - Object already has property "' . $key . '"');
				} else {
					$this->{$key} = $value;
				}

			} else {
				$this->convert($value, $key);
			}

		}
	}

}