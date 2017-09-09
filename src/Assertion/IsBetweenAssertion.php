<?php

namespace MiniSuite\Assertion;

/**
 * isBetween assertion
 */
class IsBetween
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
            (!$included && ($this->value < $min || $this->value > $max)) ||
            ($included && ($this->value <= $min || $this->value >= $max))
         ) {
            new FailedAssertion('Should be between', [
                'value' => $this->value,
                'min' => $min,
                'max' => $max,
                'included' => $included,
            ]);
        }
    }
}
