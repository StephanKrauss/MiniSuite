<?php

namespace MiniSuite;

/**
 * MiniSuite helper interface
 */
interface HelperInterface
{
    /**
     * Assert that an exception has been thrown
     *
     * @param callable $test
     * @return void
     */
    public function throws(?string $name, callable $test) : void;

    /**
     * Assert that no exception has been thrown
     *
     * @param callable $test
     * @return void
     */
    public function doesNotThrow(?string $name, callable $test) : void;
}
