<?php

namespace MiniSuite\Message;

use Symfony\Component\Console\Output\OutputInterface;

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
