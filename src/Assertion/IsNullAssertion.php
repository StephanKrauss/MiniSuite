<?php

namespace MiniSuite\Assertion;

/**
 * isNull assertion
 */
class IsNullAssertion
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
        if ($this->value !== null) {
            new FailedAssertion('Should be null', [
                'value' => $this->value,
            ]);
        }
    }
}
