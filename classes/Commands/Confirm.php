<?php

namespace Commands;

class Confirm extends Command
{
    public static string $command = 'confirm';

    public static function usage(): string
    {
        $command = self::$command;

        $usage = self::green("> $command\n");
        $usage .= "      Asks the user for confirmation before proceeding.\n";
        return $usage;
    }

    public function execute(): void
    {
        echo "Are you sure you want to proceed? [Y/n]: ";

        $handle = fopen("php://stdin", "r");
        $input = trim(fgets($handle));
        fclose($handle);

        if (strtolower($input) === 'y' || $input === '') {
            echo "Proceeding...\n";
        } else {
            echo "Operation cancelled.\n";
        }
    }
}