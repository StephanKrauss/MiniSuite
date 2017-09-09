<?php

namespace MiniSuite\Assertion;

use Exception;

/**
 * Gateway interface for assertions call
 */
class AssertionGateway implements AssertionGatewayInterface
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
     * Call an assertion
     *
     * @param string $name
     * @param array $arguments
     * @return MiniSuite\Assertion\AssertionGatewayInterface
     */
    public function __call(string $name, array $arguments)
    {
        $this->_callAssertion(
            $this->_verifyClass(
                $this->_formatAssertionName($name)
            ),
            $arguments
        );
        return $this;
    }

    /**
     * Call the assertion
     *
     * @param string $class
     * @return void
     */
    protected function _callAssertion(string $class) : void
    {
        $assertion = new $class($this->value);
        call_user_func_array([$assertion, 'assert'], $arguments);
    }

    /**
     * Verify if a class exists
     *
     * @param string $class
     * @return void
     */
    protected function _verifyClass(string $class) : void
    {
        if(!class_exists($class)) {
            throw new Exception("'$class' assertion class does not exist");
        }
    }

    /**
     * Format an assertion name to a class name
     *
     * @param string $name
     * @return string
     */
    protected function _formatAssertionName(string $name) : string
    {
        return ucfirst($name) . 'Assertion';
    }
}
