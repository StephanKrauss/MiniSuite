<?php

namespace MiniSuite;

class Helper implements HelperInterface
{
    /**
     * Assert that an exception has been thrown
     *
     * @param callable $test
     * @return void
     */
    public function throws(?string $name, callable $test) : void
    {
        try {
            call_user_func($test);
            throw new \AssertionError('Test should have thrown an exception');
        } catch (\Exception $e) {
            if ($name !== null && $e instanceof $name === false) {
                throw new \AssertionError("Test has not thrown an expected '$name' exception");
            }
        }
    }

    /**
     * Assert that no exception has been thrown
     *
     * @param callable $test
     * @return void
     */
    public function doesNotThrow(?string $name, callable $test) : void
    {
        try {
            call_user_func($test);
        } catch (\Exception $e) {
            if ($name === null) {
                throw new \AssertionError("Test shouldn't have thrown an exception");
            } elseif ($e instanceof $name) {
                throw new \AssertionError("Test shouldn't have thrown a '$name' exception");
            }
        }
    }
}
