<?php

/**
 * Log class.
 *
 * This class is used to log messages to the console.
 */
class Log
{
    public static function info(string $message): void
    {
        echo "$message\n";
    }

    public static function error(string $message): void
    {
        echo "Error: $message\n";
    }

    public static function array(array $array): void
    {
        print_r($array);
    }
}