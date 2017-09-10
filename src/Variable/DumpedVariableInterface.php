<?php

namespace MiniSuite\Variable;

/**
 * Dump interface
 */
interface DumpedVariableInterface
{
    /**
     * Get the entity as a string
     *
     * @return string
     */
    public function __toString() : string;
}
