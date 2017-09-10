<?php

namespace MiniSuite\Message;

use Symfony\Component\Console\Output\OutputInterface;

/**
 * Success message
 */
final class SuccessMessage implements MessageInterface
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
     * @param string $message
     */
    public function __construct(string $message)
    {
        $this->message = $message;
    }

    /**
     * Print the message
     *
     * @param OutputInterface $output
     * @return void
     */
    public function print(OutputInterface $output) : void
    {
        $output->write('<fg=white;bg=green>' . $this->title . '</>');
    }
}
