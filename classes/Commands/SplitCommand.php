<?php

namespace Paperclip\Commands;

use Paperclip\Utilities\Log;
use SPLDW\Commands\GoogleAnalytics\CustomUserCommand;

class SplitCommand extends Command
{
    public static string $command = '???';
    public static array $arguments = [
        0 => 'function',
    ];

    protected array $options;

    public function __construct(array $argv, array $options)
    {
        parent::__construct($argv);
        $this->options = $options;
    }

    public static function usage(): string
    {
        $command = self::$command;

        $usage = self::green("> $command\n");
        $usage .= "      Use this command to fetch Google Analytics data.\n";

        return $usage;
    }

    public function execute(): void
    {
        //todo: implement execute() method
    }

    public function run(): void
    {
        $args = $this->arguments();

        $function = $args->get('function', null);
        if (!$function) {
            Log::error('Error: No function specified.');
        }

        // input from command line
        $function = explode(':', $function);
        $command = $function[0] ?? null;
        $method = $function[1] ?? null;

        // translate input
        $command = $this->options[$command];
        $instance = $command['instance'] ?? null;
        $methods = $command['methods'] ?? null;
        $callable = $methods[$method]['method'] ?? null;

        // check if command exists
        if (!isset($command)) {
            Log::error('Error: Command not found.');

            return;
        }

        // check if method exist in command within options array
        if (!isset($methods[$method])) {
            Log::error('Error: Method not found.');

            return;
        }

        // check if method is callable
        if (!is_callable([$instance, $callable])) {
            Log::error('Error: Method is not callable.');

            return;
        }

        // call the method
        $instance->$callable();
    }
}