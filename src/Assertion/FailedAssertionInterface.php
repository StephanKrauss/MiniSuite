<?php

namespace MiniSuite\Assertion;

/**
 * Interface for assertion error decorator
 */
interface FailedAssertion
{
    /**
     * Throw an assertion error
     *
     * @param string $message
     * @param array $dump
     * @return void
     */
    public function __construct(string $message, array $dump = []);
}
