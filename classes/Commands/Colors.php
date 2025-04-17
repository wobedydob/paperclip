<?php

namespace Paperclip\Commands;

use Paperclip\Config;
use Paperclip\Utilities\Log;

class Colors extends Command
{
    protected static string $command = 'colors';

    public static function usage(bool $displayOptions = false): string
    {
        $config = Config::instance();
        $highlight = $config->get('colors.info.highlight', 'green');
        $description = $config->get('colors.info.description', 'light_gray');

        $command = self::$command;

        $usage = self::$highlight("> $command\n");
        $usage .= self::$description("      Displays a list of available colors.\n");

        if ($displayOptions) {
            $usage .= "      Available colors are:\n";
            foreach (self::colors() as $color) {
                $usage .= "            - " . $color . "\n";
            }
        }

        return $usage;
    }

    public function execute(): void
    {
        Log::header("HELP");
        Log::newLine();
        Log::message(self::usage(true));
        Log::newLine();
        Log::footer("HELP");
    }
}