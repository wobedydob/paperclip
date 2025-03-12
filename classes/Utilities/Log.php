<?php

namespace Paperclip\Utilities;

use Paperclip\Traits\ANSI;

class Log
{
    use ANSI;

    public const string PROJECT_TITLE = PROJECT_NAME;

    public static function message(string $message): void
    {
        echo "$message";
    }

    public static function info(string $message): void
    {
        echo self::bg_blue("[i]") . " $message \n";
    }

    public static function success(string $message): void
    {
        echo self::bg_green("[+]") . " $message \n";
    }

    public static function warning(string $message): void
    {
        echo self::bg_light_yellow("[!]") . " $message \n";
    }

    public static function error(string $message): void
    {
        echo self::bg_red("[!]") . " $message \n";
    }

    public static function array(array $array): void
    {
        print_r($array);
    }

    public static function newLine(): void
    {
        echo "\n";
    }

    public static function banner(string $open = '/', string $close = "\\", string $title = self::PROJECT_TITLE): void
    {
        echo self::dark_gray("==========================================")
            . self::bold(self::light_red(" [ $open ")) . self::bold(self::white($title)) . self::bold(self::light_red(" $close ] "))
            . self::dark_gray("==========================================\n");
    }

    public static function header(string $subject = null, string $name = self::PROJECT_TITLE): void
    {
        $title = $name;
        if ($subject) {
            $title = $title . ' - ' . $subject;
        }
        self::banner('/' ,'\\', $title);
    }

    public static function footer(string $subject = null, string $name = self::PROJECT_TITLE): void
    {
        $title = $name;
        if ($subject) {
            $title = $title . ' - ' . $subject;
        }
        self::banner('\\', '/', $title);
    }
}