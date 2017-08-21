<?php

namespace MiniSuite\Assertion;

use AssertionError;
use MiniSuite\Message\FailMessage;
use MiniSuite\Variable\DumpedVariable;

/**
 * Decorator to throw an assertion error
 */
final class FailedAssertion implements FailedAssertionInterface
{
    /**
     * Throw an assertion error
     *
     * @param string $message
     * @param array $dump
     * @return void
     */
    public function __construct(string $message, array $dump = [])
    {
        throw new AssertionError(
            (string) new FailMessage(
                $message,
                array_map(function ($value) {
                    return new DumpedVariable($value);
                }, $dump)
            )
        );
    }
}
