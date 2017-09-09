<?php

namespace MiniSuite\Assertion;

/**
 * doesNotEqual assertion
 */
class DoesNotEqualAssertion
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
        if ($this->value === $expected) {
            new FailedAssertion('Should not be equal', [
                'value' => $this->value,
                'expected' => $expected,
            ]);
        }
    }
}
