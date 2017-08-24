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
     * @param string $text
     */
    public function __construct(string $text);

    /**
     * Print the message
     *
     * @return void
     */
    public function print() : void;
}
