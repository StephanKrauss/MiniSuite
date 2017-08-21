<?php

namespace MiniSuite;

use AssertionError;
use MiniSuite\Assertion\AssertionList;

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
    private $name;

    /**
     * Test list
     *
     * @var array
     */
    private $tests;

    /**
     * Constructor
     *
     * @param string $name
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
        $assert = function ($value) {
            return new AssertionList($value);
        };
        // Run each test
        foreach ($this->tests as $name => $test) {
            try {
                call_user_func($test, $assert);
            } catch (AssertionError $e) {
            }
        }
    }
}
