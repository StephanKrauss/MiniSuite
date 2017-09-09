<?php

namespace MiniSuite\Assertion;

/**
 * isNotObject assertion
 */
class IsNotObjectAssertion
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
        if (is_object($this->value)) {
            new FailedAssertion('Should not be an object', [
                'value' => $this->value,
            ]);
        }
    }
}
