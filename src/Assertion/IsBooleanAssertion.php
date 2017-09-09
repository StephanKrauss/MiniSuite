<?php

namespace MiniSuite\Assertion;

/**
 * isBoolean assertion
 */
class IsBooleanAssertion
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
     * @return void
     */
    public function assert() : void
    {
        if (!is_bool($this->value)) {
            new FailedAssertion('Should be a boolean', [
                'value' => $this->value,
            ]);
        }
    }
}
