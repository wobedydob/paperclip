<?php

namespace Paperclip\Commands;

use Paperclip\Paperclip;
use Paperclip\Utilities\Log;

class Help extends Command
{
    public static string $command = 'help';

    public static function usage(): string
    {
        $paperclip = Paperclip::instance();
        $highlight = $paperclip->config('colors.info.highlight', 'green');
        $description = $paperclip->config('colors.info.description', 'light_gray');

        $command = self::$command;

        $usage = self::$highlight("> $command\n");
        $usage .= self::$description("      Displays this help message with a list of available commands and their usage.") . "\n";
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
