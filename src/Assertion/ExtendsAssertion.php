<?php

namespace MiniSuite\Assertion;

/**
 * extends assertion
 */
class ExtendsAssertion
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
        if (!is_subclass_of($value, $class)) {
            new FailedAssertion("Should extend '$class'", [
                'value' => $this->value,
            ]);
        }
    }
}
