<?php

namespace MiniSuite\Assertion;

/**
 * isGreaterThan assertion
 */
class IsGreaterThanAssertion
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
     * @param float $expected
     * @return void
     */
    public function assert(float $expected) : void
    {
        if ($this->value <= $expected) {
            new FailedAssertion('Should be greater', [
                'value' => $this->value,
                'expected' => $expected,
            ]);
        }
    }
}
