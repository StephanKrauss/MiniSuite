<?php

namespace MiniSuite;

use AssertionError;

/**
 * MiniSuite
 */
final class Suite implements SuiteInterface
{
    /**
     * Suite name
     *
     * @var string
     */
    protected $name;

    /**
     * Test list
     *
     * @var array
     */
    protected $tests;

    /**
     * Constructor
     *
     * @param string $name
     * @param array $options
     */
    public function __construct(string $name)
    {
        $this->name = $name;
        $this->tests = [];
    }

    /**
     * Add a test
     *
     * @param string $name
     * @param callable $test
     * @return void
     */
    public function add($name, callable $test) : void
    {
        $this->tests[$name] = $test;
    }

    /**
     * Run the tests
     *
     * @return array
     */
    public function run() : void
    {
        // Define assert function
        $assert = function($value) {
            return new Value($value);
        };
        // Run each test
        foreach ($this->tests as $name => $test) {
            try {
                call_user_func($test, $assert);
            }
            catch(AssertionError $e) {

            }
        }
    }
}
