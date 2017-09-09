<?php

namespace MiniSuite\Assertion;

/**
 * isNotInteger assertion
 */
class IsNotIntegerAssertion
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
        if (is_int($this->value)) {
            new FailedAssertion('Should not be an integer', [
                'value' => $this->value,
            ]);
        }
    }
}