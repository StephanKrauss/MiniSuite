<?php

namespace MiniSuite\Assertion;

/**
 * isFloat assertion
 */
class IsFloatAssertion
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
        if (!is_float($this->value)) {
            new FailedAssertion('Should be a float number', [
                'value' => $this->value,
            ]);
        }
    }
}
