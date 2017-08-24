<?php

namespace MiniSuite\Dump;

/**
 * Dump interface
 */
final class DumpedVariable implements DumpedVariableInterface
{
    /**
     * Variable to dump
     *
     * @var mixed
     */
    private $variable;

    /**
     * Constructor
     *
     * @param mixed $variable
     */
    public function __construct($variable)
    {
        $this->variable = $variable;
    }

    /**
     * Get the entity as a string
     *
     * @return string
     */
    public function __toString() : string
    {
        if (is_object($this->variable)) {
            return get_class($this->variable);
        } elseif (is_resource($this->variable)) {
            return ucfirst(strtolower(get_resource_type($this->variable) . ' resource'));
        } else {
            return var_export($this->variable, true);
        }
    }
}
