<?php

namespace MiniSuite\Assertion;

/**
 * isNotResource assertion
 */
class IsNotResourceAssertion
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
            if ($type === null) {
                new FailedAssertion('Should not be a resource', [
                    'value' => $this->value,
                ]);
            }
            else if(get_resource_type($resource) !== $type) {
                new FailedAssertion("Should not be a resource of the given type", [
                    'value' => $this->value,
                    'type' => $type,
                ]);
            }
        }
    }
}
