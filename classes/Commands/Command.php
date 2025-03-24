<?php

namespace Paperclip\Commands;

use Paperclip\Exceptions\InvalidConfigFileException;
use Paperclip\Exceptions\MissingPropertyException;
use Paperclip\Traits\ANSI;
use Paperclip\Utilities\Arguments;
use Paperclip\Utilities\FileManager;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

abstract class Command
{
    use ANSI;

    private const array EXCLUDED_COMMANDS = [self::class, ConfirmCommand::class];

    public static string $command;
    public static array $arguments = [];
    protected array $argv;

    public function __construct(array $argv)
    {
        $this->argv = $argv;

        if ($this->arguments()->hasHelpFlag()) {
            echo $this->usage();
            exit;
        }
    }

    public abstract static function usage(): string;

    public abstract function execute(): void;

    protected function arguments(): Arguments
    {
        // strip 0 index and 1 index from arguments array
        $arguments = array_slice($this->argv, 2);
        if (!isset(static::$arguments)) {
            throw new MissingPropertyException(static::class, '$arguments', 981398617283);
        }
        if (!$arguments) {
            return new Arguments($this->argv, []);
        }
        $result = [];
        foreach (static::$arguments as $index => $argument) {
            if (!isset($arguments[$index])) {
                break;
            }
            $result[$argument] = $arguments[$index];
        }
        return new Arguments($this->argv, $result);
    }

    public static function command(): string
    {
        if (!isset(static::$command)) {
            throw new MissingPropertyException(static::class, '$command', 981398617283);
        }
        return static::$command;
    }

    public static function commands(): array
    {
        $commands = [];

        $namespace = 'Paperclip\\Commands';
        $directory = __DIR__;

        // first locate all default commands
        if (is_dir($directory)) {
            $files = new RecursiveIteratorIterator(
                new RecursiveDirectoryIterator($directory)
            );
            foreach ($files as $file) {
                if ($file->isFile() && $file->getExtension() === 'php') {
                    $relativePath = str_replace($directory . DIRECTORY_SEPARATOR, '', $file->getPathname());
                    $class = $namespace . '\\' . str_replace(['/', '.php'], ['\\', ''], $relativePath);
                    // exclude the Command class itself
                    if (self::beExcluded($class)) {
                        continue;
                    }
                    $commands[] = $class;
                }
            }
        }

        // then locate all custom commands
        $config = FileManager::projectRoot('paperclip.commands.json');
        if (file_exists($config)) {
            $json = file_get_contents($config);
            $externalCommands = json_decode($json, true);

            if (!is_array($externalCommands)) {
                throw new InvalidConfigFileException($config);
            }

            foreach ($externalCommands as $externalCommand) {
                if (!class_exists($externalCommand)) {
                    continue;
                }

                if (!self::beExcluded($externalCommand)) {
                    $commands[] = $externalCommand;
                }
            }
        }

        return $commands;
    }

    private static function beExcluded(string $class): bool
    {
        return in_array($class, self::EXCLUDED_COMMANDS);
    }

    public static function usages(): string
    {
        # USAGES
        $string = self::yellow("Usage: ") . self::light_gray("./execute.php") . " [command] [arguments]\n\n";
        $string .= self::yellow("Commands:\n");
        foreach (self::commands() as $command) {
            /** @var Command $command */
            if ($usage = $command::usage()) {
                $string .= "    " . $usage . "\n";
            }
        }
        # NOTES
        $string .= "\n" . self::magenta("Notes:\n");
        $string .= self::magenta("- ") . "All commands are case-sensitive.\n";
        $string .= self::magenta("- ") . "Ensure PHP is installed and the script has execute permissions (use chmod +x if necessary).\n";
        return $string;
    }
}