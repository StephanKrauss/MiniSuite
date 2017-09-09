<?php

namespace MiniSuite\Assertion;

/**
 * isArray assertion
 */
class IsArrayAssertion
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
        if (!is_array($this->value)) {
            new FailedAssertion('Should be an array', [
                'value' => $this->value,
            ]);
        }
    }
}
