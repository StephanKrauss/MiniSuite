<?php

namespace MiniSuite\Message;

use Symfony\Component\Console\Output\OutputInterface;

/**
 * Suite title
 */
final class SuiteTitle implements MessageInterface
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
     * @var Symfony\Component\Console\Output\ConsoleOutput
     */
    private $output;

    /**
     * Constructor
     *
     * @param string $title
     */
    public function __construct(string $title)
    {
        $this->title = $title;
    }

    /**
     * Print the message
     *
     * @param OutputInterface $output
     * @return void
     */
    public function print(OutputInterface $output) : void
    {
        $output->write('<fg=white;bg=yellow>' . $this->title . '</>');
    }
}
