<?php

namespace Paperclip;

use Paperclip\Commands\Command;
use Paperclip\Utilities\Log;

class Paperclip
{
    public const string DEFAULT_NAME = 'Paperclip';

    private static self $instance;

    private string $execute;
    private array $argv;
    private array $config;

//    public function __construct(array $argv, array $config = [])
//    {
//        $execute = $argv[1] ?? null;
//        if (!$execute) {
//            Log::error("No command specified");
//            exit;
//        }
//
//        $this->execute = $execute;
//        $this->argv = $argv;
//        $this->config = $config;
//    }

    public static function instance(): self
    {
        if (!isset(self::$instance)) {
            self::$instance = new self([], []);
        }
        return self::$instance;
    }

    public function config(string $key, mixed $default = null): mixed
    {
        $keys = explode('.', $key);
        $config = $this->config;
        foreach ($keys as $key) {
            if (!isset($config[$key])) {
                return $default;
            }
            $config = $config[$key];
        }
        return $config;
    }

    public function setup(array $argv, array $config = []): self
    {
        $this->argv = $argv;
        $this->config = $config;

        $execute = $argv[1] ?? null;
        if (!$execute) {
            Log::error("No command specified");
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