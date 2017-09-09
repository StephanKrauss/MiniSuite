<?php

namespace MiniSuite\Assertion;

/**
 * isInstanceOf assertion
 */
class IsInstanceOfAssertion
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
     * @param string $class
     * @return void
     */
    public function assert(string $class) : void
    {
        $this->isObject();
        if (!($this->value instanceof $class)) {
            new FailedAssertion("Should be an instance of '$class'", [
                'value' => $this->value,
            ]);
        }
    }
}
