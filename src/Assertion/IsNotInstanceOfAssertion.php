<?php

namespace MiniSuite\Assertion;

/**
 * isNotInstanceOf assertion
 */
class IsNotInstanceOfAssertion
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
        if ($this->value instanceof $class) {
            new FailedAssertion("Should not be an instance of '$class'", [
                'value' => $this->value,
            ]);
        }
    }
}
