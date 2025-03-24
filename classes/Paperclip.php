<?php

namespace Paperclip;

use Paperclip\Commands\Command;

class Paperclip
{
    private string $execute;
    private array $argv;

    public function __construct(array $argv)
    {
        $execute = $argv[1] ?? null;
        if (!$execute) {
            echo "Usage: php execute.php [command]\n";
            exit;
        }

        $this->execute = $execute;
        $this->argv = $argv;
    }

    public function execute()
    {
        foreach (Command::commands() as $command) {
            /** @var Command $command */
            if ($command::command() === $this->execute) {
                $command = new $command($this->argv);
                $command->execute();
                exit;
            }
        }

        echo "Command [$this->execute] not found.\n";
        exit();
    }
}