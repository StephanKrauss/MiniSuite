<?php

namespace MiniSuite\Assertion;

/**
 * Gateway interface for assertions call
 */
interface AssertionGatewayInterface
{
    /**
     * Call an assertion
     *
     * @param string $name
     * @param array $arguments
     * @return MiniSuite\Assertion\AssertionGatewayInterface
     */
    public function __call(string $name, array $arguments);
}
