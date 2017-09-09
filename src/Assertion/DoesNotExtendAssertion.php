<?php

namespace MiniSuite\Assertion;

/**
 * doesNotExtend assertion
 */
class DoesNotExtendAssertion
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
        if (is_subclass_of($value, $class)) {
            new FailedAssertion("Should not extend '$class'", [
                'value' => $this->value,
            ]);
        }
    }
}
