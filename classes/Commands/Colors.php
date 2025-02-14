<?php

namespace Commands;

class Colors extends Command
{
    public static string $command = '--colors';

    public function execute(): void
    {
        echo self::usage(true);
    }

    public static function usage(bool $displayOptions = false): string
    {
        $usage = "--colors \n";
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
}