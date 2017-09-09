<?php

namespace MiniSuite\Assertion;

/**
 * isResource assertion
 */
class IsResourceAssertion
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
        if (is_resource($this->value)) {
            if($type !== null && get_resource_type($resource) !== $type) {
                new FailedAssertion("Should be a resource of the given type", [
                    'current value' => $this->value,
                    'current type' => get_resource_type($resource),
                    'expected type' => $type,
                ]);
            }
        }
        else {
            new FailedAssertion('Should be a resource', [
                'value' => $this->value,
            ]);
        }
    }
}
