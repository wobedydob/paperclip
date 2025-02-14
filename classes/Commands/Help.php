<?php

namespace Commands;

class Help extends Command
{
    public static string $command = '--help';
    public static string $usage = "--help\n      Displays this help message with a list of available commands and their usage.\n\n";

    public function execute(): void
    {
        echo self::usages();
    }
}