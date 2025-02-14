<?php

namespace Traits;

/**
 * Colors
 * @method static string black(string $text)
 * @method static string blue(string $text)
 * @method static string cyan(string $text)
 * @method static string darkGray(string $text)
 * @method static string gray(string $text)
 * @method static string green(string $text)
 * @method static string lightBlue(string $text)
 * @method static string lightCyan(string $text)
 * @method static string lightGray(string $text)
 * @method static string lightGreen(string $text)
 * @method static string lightMagenta(string $text)
 * @method static string lightRed(string $text)
 * @method static string lightYellow(string $text)
 * @method static string magenta(string $text)
 * @method static string red(string $text)
 * @method static string white(string $text)
 * @method static string yellow(string $text)
 *
 * Background
 * @method static string blackBg(string $text)
 * @method static string blueBg(string $text)
 * @method static string cyanBg(string $text)
 * @method static string darkGrayBg(string $text)
 * @method static string grayBg(string $text)
 * @method static string greenBg(string $text)
 * @method static string lightBlueBg(string $text)
 * @method static string lightCyanBg(string $text)
 * @method static string lightGrayBg(string $text)
 * @method static string lightGreenBg(string $text)
 * @method static string lightMagentaBg(string $text)
 * @method static string lightRedBg(string $text)
 * @method static string lightYellowBg(string $text)
 * @method static string magentaBg(string $text)
 * @method static string redBg(string $text)
 * @method static string whiteBg(string $text)
 * @method static string yellowBg(string $text)
 *
 * Text Formatting
 * @method static string bold(string $text)
 * @method static string reset(string $text)
 * @method static string underline(string $text)
 */

trait ANSI
{
    /** @var array<string, string> */
    private static array $options = [
        # Colors
        'black' => '30',
        'blue' => '34',
        'cyan' => '36',
        'dark_gray' => '90',
        'gray' => '37',
        'green' => '32',
        'light_blue' => '94',
        'light_cyan' => '96',
        'light_gray' => '37',
        'light_green' => '92',
        'light_magenta' => '95',
        'light_red' => '91',
        'light_yellow' => '93',
        'magenta' => '35',
        'red' => '31',
        'white' => '97',
        'yellow' => '33',

        # Background
        'black_bg' => '40',
        'blue_bg' => '44',
        'cyan_bg' => '46',
        'dark_gray_bg' => '100',
        'gray_bg' => '47',
        'green_bg' => '42',
        'light_blue_bg' => '104',
        'light_cyan_bg' => '106',
        'light_gray_bg' => '47',
        'light_green_bg' => '102',
        'light_magenta_bg' => '105',
        'light_red_bg' => '101',
        'light_yellow_bg' => '103',
        'magenta_bg' => '45',
        'red_bg' => '41',
        'white_bg' => '107',
        'yellow_bg' => '43',

        # Text Formatting
        'bold' => '1',
        'reset' => '0',
        'underline' => '4',
    ];

    private static function colorize(string $text, string $colorCode): string
    {
        return "\033[" . $colorCode . "m" . $text . "\033[0m";
    }

    public static function __callStatic(string $name, array $arguments): string
    {
        if (!isset(self::$options[$name])) {
            throw new \BadMethodCallException("Method $name does not exist in " . __CLASS__);
        }

        $text = $arguments[0] ?? '';
        return self::colorize($text, self::$options[$name]);
    }

    public static function colors(): array
    {
        $list = [];
        foreach (self::$options as $color => $code) {
            $list[$color] = self::$color($color);
        }
        return $list;
    }
}