<?php

namespace MiniSuite\Output;

/**
 * Message interface
 */
interface MessageInterface
{
    /**
     * Print the message
     *
     * @param OutputInterface $output
     * @return void
     */
    public function print(OutputInterface $output) : void;
}
