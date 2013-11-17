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

			if (! is_array($value)) {
				$this->{$buffer . $key} = $value;
			} else {
				$this->convert($value, $buffer . $key);
			}

		}
	}

}