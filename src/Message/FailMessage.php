<?php

namespace MiniSuite\Message;

use Symfony\Component\Console\Output\OutputInterface;

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
     * @var Symfony\Component\Console\Output\ConsoleOutput
     */
    private $output;

    /**
     * Constructor
     *
     * @param string $text
     */
    public function __construct(string $message)
    {
        $this->text = $message;
    }

    /**
     * Print the message
     *
     * @param OutputInterface $output
     * @return void
     */
    public function print(OutputInterface $output) : void
    {
        $output->write('<fg=white;bg=red>' . $this->title . '</>');
    }
}
