<?php

namespace MiniSuite\Assertion;

/**
 * throws assertion
 */
class ThrowsAssertion
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
     * @param string|null $type
     * @return void
     */
    public function assert(?string $type = null) : void
    {
        $this->isCallable();
        try {
            call_user_func($this->value);
        } catch (Exception $e) {
            if ($type !== null && $e instanceof $type === false) {
                new FailedAssertion("Should have thrown a '$type' exception", [
                    'exception' => $e,
                ]);
            }
        }
        new FailedAssertion('Should have thrown an exception');
    }
}
