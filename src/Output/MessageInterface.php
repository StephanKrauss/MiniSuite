<?php

namespace MiniSuite\Output;

/**
 * Message interface
 */
interface MessageInterface
{
    /**
     * Constructor
     *
     * @param string $message
     */
    public function __construct(string $message);

    /**
     * Print the message
     *
     * @return void
     */
    public function print() : void;
}
