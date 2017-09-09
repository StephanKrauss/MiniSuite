<?php

namespace MiniSuite\Assertion;

/**
 * isDefined assertion
 */
class IsDefinedAssertion
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
     * @param array $array
     * @param string $index
     * @return void
     */
    public function assert(array $array, string $index) : void
    {
        if (!isset($array[$index])) {
            new FailedAssertion('The array element should be defined', [
                'value' => $this->value,
                'array' => $array,
                'index' => $index,
            ]);
        }
    }
}
