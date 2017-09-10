<?php

namespace MiniSuite;

use AssertionError;
use MiniSuite\Assertion\AssertionGateway;
use MiniSuite\Message\MessageInterface;
use MiniSuite\Message\SuccessMessage;
use MiniSuite\Message\FailMessage;

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
     * @return void
     */
    public function run() : void
    {
        $this->_showSuiteTitle($this->name);
        foreach ($this->tests as $name => $test) {
            $this->_showTestTitle($name);
            $this->_runTest();
        }
    }

    /**
     * Run a test
     *
     * @param callable $test
     * @return void
     */
    protected function _runTest(callable $test) : void
    {
        try {
            $this->_callTest($test);
            $this->_showSuccessMessage('Passed');
        } catch (AssertionError $e) {
            $this->_showFailMessage($e->getMessage());
        }
    }

    /**
     * Call the test callback
     *
     * @param callable $test
     * @return void
     */
    protected function _callTest(callable $test) : void
    {
        call_user_func($test, function ($value) {
            return new AssertionGateway($value);
        });
    }

    /**
     * Show the suite title
     *
     * @param string $title
     * @return void
     */
    protected function _showSuiteTitle(string $title) : void
    {
        $suiteTitle = new SuiteTitle($title);
        $suiteTitle->show();
    }

    /**
     * Show a test title
     *
     * @param string $title
     * @return void
     */
    protected function _showTestTitle(string $title) : void
    {
        $testTitle = new TestTitle($title);
        $testTitle->show();
    }

    /**
     * Show a success message
     *
     * @param string $message
     * @return void
     */
    protected function _showSuccessMessage(string $message) : void
    {
        $successMessage = new SuccessMessage($message);
        $successMessage->show();
    }

    /**
     * Show a fail message
     *
     * @param string $message
     * @return void
     */
    protected function _showFailMessage(string $message) : void
    {
        $failMessage = new FailMessage($message);
        $failMessage->show();
    }
}
