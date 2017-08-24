<?php

namespace MiniSuite\Dump;

/**
 * Dump interface
 */
interface DumpedVariableInterface
{
    /**
     * Constructor
     *
     * @param mixed $variable
     */
    public function __construct($variable);

    /**
     * Get the entity as a string
     *
     * @return string
     */
    public function __toString() : string;
}
