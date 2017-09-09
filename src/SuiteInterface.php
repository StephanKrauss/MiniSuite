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
     * @return array
     */
    public function run() : void;
}
