<?php

namespace Paperclip\Utilities;

use Paperclip\Config;
use Paperclip\Paperclip;
use Paperclip\Traits\ANSI;

class Log
{
    use ANSI;

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

    public static function banner(string $open = '/', string $close = "\\", ?string $subject = null): void
    {
        $config = Config::instance();
        $title = $config->get('name', Paperclip::DEFAULT_NAME);

        if ($subject && $config->get('display_subject', true)) {
            $title = $title . ' - ' . $subject;
        }

        $row = $config->get('colors.banner.row', 'dark_gray');
        $rowTitle = $config->get('colors.banner.title', 'white');
        $braces = $config->get('colors.banner.braces', 'light_red');
        $slashes = $config->get('colors.banner.slashes', 'light_red');

        echo self::$row("==========================================")
            . self::bold(self::$braces(" [ ")) . self::bold(self::$slashes($open)) . ' ' . self::bold(self::$rowTitle($title)) . ' ' . self::bold(self::$slashes($close)) . self::bold(self::$braces(" ] "))
            . self::$row("==========================================\n");
    }

    public static function header(string $subject = null): void
    {
        self::banner('/' ,'\\', $subject);
    }

    public static function footer(string $subject = null): void
    {
        self::banner('\\', '/', $subject);
    }
}