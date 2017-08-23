<?php

namespace MiniSuite\Dump;

/**
 * Dump interface
 */
interface DumpInterface
{
    /**
     * Get the entity as a string
     *
     * @return string
     */
    public function __toString() : string;
}
