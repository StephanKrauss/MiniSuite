<?php

namespace MiniSuite\Output;

/**
 * Success message
 */
final class SuccessMessage implements MessageInterface
{
    /**
     * The output
     *
     * @var CliOutput
     */
    private $output;

    /**
     * Constructor
     */
    public function __construct(){
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
