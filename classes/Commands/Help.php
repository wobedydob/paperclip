<?php

namespace Paperclip\Commands;

use Paperclip\Utilities\Log;

class Help extends Command
{
    public static string $command = 'help';

    public static function usage(): string
    {
        $command = self::$command;

        $usage = self::green("> $command\n");
        $usage .= "      Displays this help message with a list of available commands and their usage.\n";
        return $usage;
    }

    public function execute(): void
    {
        Log::header("HELP");
        Log::newLine();
        Log::message(self::usages());
        Log::newLine();
        Log::footer("HELP");
    }
}
