<?php

namespace MiniSuite\Assertion;

/**
 * isNotString assertion
 */
class IsNotStringAssertion
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
        if (is_string($value)) {
            new FailedAssertion('Should not be a string', [
                'value' => $this->value,
            ]);
        }
    }
}
