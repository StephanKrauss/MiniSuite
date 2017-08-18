<?php

namespace MiniSuite;

/**
 * MiniSuite
 */
class Suite implements SuiteInterface
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
    protected $tests = [];

    /**
     * Constructor
     *
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
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
        // Prepare
        $helper = new Helper();
        // Change directives
        $assertException = ini_get('assert.exception');
        ini_set('assert.exception', '1');
        // Run tests
        foreach ($this->tests as $name => $test) {
            try {
                call_user_func($test, $helper);
            }
            catch() {}
        }
        // Restore directives
        ini_set('assert.exception', $assertException);
    }
}
