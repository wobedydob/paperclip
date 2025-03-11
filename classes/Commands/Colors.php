<?php

namespace Commands;

class Colors extends Command
{
    public static string $command = 'colors';

    public static function usage(bool $displayOptions = false): string
    {
        $command = self::$command;

        $usage = self::green("> $command\n");
        $usage .= "      Displays a list of available colors.\n";

        if ($displayOptions) {
            $usage .= "      Available colors are:\n";
            foreach (self::colors() as $color)
            {
                $usage .= "            - " . $color . "\n";
            }
        }

        return $usage;
    }

    public function execute(): void
    {
        echo self::usage(true);
    }
}