<?php

namespace MiniSuite\Assertion;

/**
 * isIterable assertion
 */
class IsIterableAssertion
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
        if (!is_iterable($this->value)) {
            new FailedAssertion('Should be iterable', [
                'value' => $this->value,
            ]);
        }
    }
}
