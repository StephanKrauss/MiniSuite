<?php

namespace MiniSuite\That;

use MiniSuite\AbstractExpectation;

/*
	Verify if the value is a string
*/
class IsStringExpectation extends AbstractExpectation{
	
	/*
		Check if the condition is matched

		Parameters
			mixed $value
	*/
	static public function check($value){
		if(!is_string($value)){
			$value=self::format($value);
			throw new \Exception("should be a string but instead saw '$value'");
		}
	}

}