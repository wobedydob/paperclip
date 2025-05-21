<?php

namespace Paperclip;

use Paperclip\Commands\Command;
use Paperclip\Commands\Help;
use Paperclip\Utilities\Log;

class Paperclip
{
    public const string DEFAULT_NAME = 'Paperclip';

    private static self $instance;

    private string $execute;
    private array $argv;
    private Config $config;

    public static function instance(): self
    {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function config(string $key, mixed $default = null): mixed
    {
        return $this->config->get($key, $default);
    }

    public function setup(array $argv, array $config = []): self
    {
        $this->argv = $argv;
        $this->config = Config::instance()->setup($config);

        $execute = $argv[1] ?? null;
        if (!$execute) {
            Log::error("No command specified");
            (new Help([]))->execute();
            exit;
        }
        $this->execute = $execute;

        return $this;
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