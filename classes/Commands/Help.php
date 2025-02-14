<?php

namespace Commands;

class Help extends Command
{
    public static string $command = '--help';

    public function execute(): void
    {
        echo self::usages();
    }

    public static function usage(): string
    {
        $usage = "--help \n";
        $usage .= "      Displays this help message with a list of available commands and their usage.\n\n";
        return $usage;
    }
}