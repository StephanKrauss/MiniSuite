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
    private $message;

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
    public function __construct(string $message){
        $this->message = $message;
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
