<?php

namespace MiniSuite\Assertion;

/**
 * isLessThan assertion
 */
class IsLessThanAssertion
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
        if ($this->value >= $expected) {
            new FailedAssertion('Should be less', [
                'value' => $this->value,
                'expected' => $expected,
            ]);
        }
    }
}
