<?php

namespace MiniSuite\That;

use MiniSuite\AbstractExpectation;

/*
    Verify if the value is between two other values (excluded)
*/
class IsBetweenExpectation extends AbstractExpectation {
    
    /*
        Check if the condition is matched

        Parameters
            mixed $value
    */
    public function check($value) {
        if(func_num_args() < 3) {
            throw new \Exception('expects two values for checking');
        }
        $min = func_get_arg(1);
        $max = func_get_arg(2);
        if($value <= $min || $value >= $max) {
            $value = $this->format($value);
            throw new \Exception("should be between '$min' and '$max' but instead saw '$value'");
        }
    }

}
