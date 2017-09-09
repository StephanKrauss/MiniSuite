<?php

namespace MiniSuite\Assertion;

/**
 * isString assertion
 */
class IsStringAssertion
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
        if (!is_string($value)) {
            new FailedAssertion('Should be a string', [
                'value' => $this->value,
            ]);
        }
    }
}
