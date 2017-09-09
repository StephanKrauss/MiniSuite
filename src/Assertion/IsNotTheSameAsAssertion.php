<?php

namespace MiniSuite\Assertion;

/**
 * isNotTheSameAs assertion
 */
class IsNotTheSameAsAssertion
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
     * @param mixed $expected
     * @return void
     */
    public function assert($expected) : void
    {
        if ($this->value === $expected) {
            new FailedAssertion('Both values should not be the same', [
                'value' => $this->value,
                'expected' => $expected,
            ]);
        }
    }
}
