<?php

namespace MiniSuite\Assertion;

/**
 * isCallable assertion
 */
class IsCallableAssertion
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
        if (!is_callable($this->value)) {
            new FailedAssertion('Should be a callable', [
                'value' => $this->value,
            ]);
        }
    }
}
