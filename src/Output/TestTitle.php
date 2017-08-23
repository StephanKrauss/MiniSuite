<?php

namespace MiniSuite\Output;

/**
 * Test title
 */
final class TestTitle implements MessageInterface
{
    /**
     * The title
     *
     * @var string
     */
    private $title;

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
    public function __construct(string $title){
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
