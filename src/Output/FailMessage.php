<?php

namespace MiniSuite\Output;

/**
 * Fail message
 */
final class FailMessage implements MessageInterface
{
    /**
     * The message
     *
     * @var string
     */
    private $error;

    /**
     * The output
     *
     * @var CliOutput
     */
    private $output;

    /**
     * Constructor
     *
     * @param string $message
     */
    public function __construct(string $error){
        $this->error = $error;
        $this->output = new CliOutput();
    }

    /**
     * Print the message
     *
     * @return void
     */
    public function print() : void
    {

    }
}
