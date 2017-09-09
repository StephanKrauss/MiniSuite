<?php

namespace MiniSuite\Assertion;

/**
 * Assertion interface
 */
interface AssertionInterface
{
    /**
     * Assert an assertion
     *
     * @return void
     */
    public function assert() : void;
}
