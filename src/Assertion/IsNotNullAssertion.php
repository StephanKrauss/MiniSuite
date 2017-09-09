<?php

namespace MiniSuite\Assertion;

/**
 * isNotNull assertion
 */
class IsNotNullAssertion
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
        if ($this->value === null) {
            new FailedAssertion('Should not be null', [
                'value' => $this->value,
            ]);
        }
    }
}
