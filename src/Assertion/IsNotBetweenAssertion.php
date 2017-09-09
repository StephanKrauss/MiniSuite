<?php

namespace MiniSuite\Assertion;

/**
 * isNotBetween assertion
 */
class IsNotBetweenAssertion
{
    /**
     * The value to assert
     *
     * @var mixed
     */
    private $value;

    /**
     * Constructor
     *
     * @param mixed $value
     */
    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * Assert an assertion
     *
     * @param float $min
     * @param float $max
     * @param bool $included
     * @return void
     */
    public function assert(float $min, float $max, bool $included = false) : void
    {
        if (
            (!$included && ($this->value > $min || $this->value < $max)) ||
            ($included && ($this->value >= $min || $this->value <= $max))
         ) {
            new FailedAssertion('Should not be between', [
                'value' => $this->value,
                'min' => $min,
                'max' => $max,
                'included' => $included,
            ]);
        }
    }
}
