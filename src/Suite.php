<?php

namespace MiniSuite;

use Closure;
use AssertionError;
use MiniSuite\Assertion\AssertionGateway;
use MiniSuite\Message\SuiteTitle;
use MiniSuite\Message\TestTitle;
use MiniSuite\Message\SuccessMessage;
use MiniSuite\Message\FailMessage;
use Symfony\Component\Console\Output\ConsoleOutput;

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
        $this->output = new ConsoleOutput();
    }

    /**
     * Add a test
     *
     * @param string $name
     * @param Closure $test
     * @return void
     */
    public function add($name, Closure $test) : void
    {
        $this->tests[$name] = $test;
    }

    /**
     * Run the tests
     *
     * @return void
     */
    public function run() : void
    {
        $this->_printSuiteTitle($this->name);
        foreach ($this->tests as $name => $test) {
            $this->_printTestTitle($name);
            $this->_runTest($test);
        }
    }

    /**
     * Run a test
     *
     * @param Closure $test
     * @return void
     */
    protected function _runTest(Closure $test) : void
    {
        try {
            $this->_callTest($test);
            $this->_printSuccessMessage('Passed');
        } catch (AssertionError $e) {
            $this->_printFailMessage($e->getMessage());
        }
    }

    /**
     * Call the test callback
     *
     * @param Closure $test
     * @return void
     */
    protected function _callTest(Closure $test) : void
    {
        $test(function ($value) {
            return new AssertionGateway($value);
        });
    }

    /**
     * Print the suite title
     *
     * @param string $title
     * @return void
     */
    protected function _printSuiteTitle(string $title) : void
    {
        (new SuiteTitle($title))->print($this->output);
    }

    /**
     * Print a test title
     *
     * @param string $title
     * @return void
     */
    protected function _printTestTitle(string $title) : void
    {
        (new TestTitle($title))->print($this->output);
    }

    /**
     * Print a success message
     *
     * @param string $message
     * @return void
     */
    protected function _printSuccessMessage(string $message) : void
    {
        (new SuccessMessage($message))->print($this->output);
    }

    /**
     * Print a fail message
     *
     * @param string $message
     * @return void
     */
    protected function _printFailMessage(string $message) : void
    {
        (new FailMessage($message))->print($this->output);
    }
}
