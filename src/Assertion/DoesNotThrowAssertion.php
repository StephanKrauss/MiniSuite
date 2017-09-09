<?php

namespace MiniSuite\Assertion;

/**
 * doesNotThrow assertion
 */
class DoesNotThrowAssertion
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
            if ($type === null) {
                new FailedAssertion('Should not have thrown an exception', [
                    'exception' => $e,
                ]);
            } elseif ($e instanceof $type) {
                new FailedAssertion("Should not have thrown a '$type' exception", [
                    'exception' => $e,
                ]);
            }
        }
    }
}
