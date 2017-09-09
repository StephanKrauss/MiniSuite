<?php

namespace MiniSuite;

/**
 * MiniSuite interface
 */
interface SuiteInterface
{
    /**
     * Run the tests
     *
     * @return void
     */
    public function run() : void;
}
