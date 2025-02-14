<?php

namespace Commands;

use Exceptions\MissingPropertyException;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

abstract class Command
{
    public static string $command;
    public static array $arguments = [];
    public static string $usage;

    private array $argv;

    public function __construct(array $argv)
    {
        $this->argv = $argv;
    }

    /**
     * Execute the command.
     */
    public abstract function execute(): void;

    /**
     * Get the arguments for the command.
     */
    protected function arguments(): \Arguments
    {
        // strip 0 index and 1 index from arguments array
        $arguments = array_slice($this->argv, 2);

        if (!isset(static::$arguments)) {
            throw new MissingPropertyException(static::class, '$arguments', 981398617283);
        }

        if (!$arguments) {
            return new \Arguments($this->argv, []);
        }

        $result = [];
        foreach (static::$arguments as $index => $argument) {
            if (!isset($arguments[$index])) {
                break;
            }
            $result[$argument] = $arguments[$index];
        }

        return new \Arguments($this->argv, $result);
    }

    /**
     * Get the command name.
     */
    public static function command(): string
    {
        if (!isset(static::$command)) {
            throw new MissingPropertyException(static::class, '$command', 981398617283);
        }
        return static::$command;
    }

    /**
     * Get the command usage.
     */
    public static function usage(): ?string
    {
        if (!isset(static::$usage)) {
            return null;
        }
        return static::$usage;
    }

    /**
     * Get all available commands.
     */
    public static function commands(): array
    {
        $namespace = 'Commands';
        $directory = __DIR__;

        $commands = [];
        if (is_dir($directory)) {
            $files = new RecursiveIteratorIterator(
                new RecursiveDirectoryIterator($directory)
            );

            foreach ($files as $file) {
                if ($file->isFile() && $file->getExtension() === 'php') {
                    $relativePath = str_replace($directory . DIRECTORY_SEPARATOR, '', $file->getPathname());
                    $class = $namespace . '\\' . str_replace(['/', '.php'], ['\\', ''], $relativePath);

                    // exclude the Command class itself
                    if ($class === self::class) {
                        continue;
                    }

                    $commands[] = $class;
                }
            }
        }

        return $commands;
    }

    /**
     * Get the usage for all available commands.
     */
    public static function usages(): string
    {
        $string = "========================================== [ / PAPERCLIP \ ] ==========================================\n";
        $string .= "Usage: ./execute.php [command] [arguments]\n\n";
        $string .= "Commands:\n";

        foreach (self::commands() as $command) {
            /** @var Command $command */
            if ($usage = $command::usage()) {
                $string .= "    " . $usage . "\n";
            }
        }

        $string .= "Notes:\n";
        $string .= "- All commands are case-sensitive.\n";
        $string .= "- Ensure PHP is installed and the script has execute permissions (use chmod +x if necessary).\n";
        $string .= "========================================== [ \ PAPERCLIP / ] ==========================================\n";

        return $string;
    }

}