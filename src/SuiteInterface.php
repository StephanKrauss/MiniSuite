<?php

namespace MiniSuite;

/**
 * MiniSuite interface
 */
interface SuiteInterface
{
    /**
     * Constructor
     *
     * @param string $name
     */
    public function __construct(string $name);

    /**
     * Add a test
     *
     * @param string $name
     * @param callable $test
     * @return void
     */
    public function add($name, callable $test) : void;

    /**
     * Run the tests
     *
     * @return array
     */
    public function run() : void;
}
