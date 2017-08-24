<?php

namespace MiniSuite\Output;

/**
 * Fail message
 */
final class FailMessage implements MessageInterface
{
    /**
     * The text
     *
     * @var string
     */
    private $text;

    /**
     * The output
     *
     * @var CliOutput
     */
    private $output;

    /**
     * Constructor
     *
     * @param string $text
     */
    public function __construct(string $text)
    {
        $this->text = $text;
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
