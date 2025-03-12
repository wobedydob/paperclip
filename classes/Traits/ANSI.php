<?php

namespace Paperclip\Traits;

/**
 * Colors
 * @method static string black(string $text)
 * @method static string blue(string $text)
 * @method static string cyan(string $text)
 * @method static string dark_gray(string $text)
 * @method static string gray(string $text)
 * @method static string green(string $text)
 * @method static string light_blue(string $text)
 * @method static string light_cyan(string $text)
 * @method static string light_gray(string $text)
 * @method static string light_green(string $text)
 * @method static string light_magenta(string $text)
 * @method static string light_red(string $text)
 * @method static string light_yellow(string $text)
 * @method static string magenta(string $text)
 * @method static string red(string $text)
 * @method static string white(string $text)
 * @method static string yellow(string $text)
 *
 * Background
 * @method static string bg_black(string $text)
 * @method static string bg_blue(string $text)
 * @method static string bg_cyan(string $text)
 * @method static string bg_dark_gray(string $text)
 * @method static string bf_gray(string $text)
 * @method static string bg_green(string $text)
 * @method static string bg_light_blue(string $text)
 * @method static string bg_light_cyan(string $text)
 * @method static string bg_light_gray(string $text)
 * @method static string bg_light_green(string $text)
 * @method static string bg_light_magenta(string $text)
 * @method static string bg_light_red(string $text)
 * @method static string bg_light_yellow(string $text)
 * @method static string bg_magenta(string $text)
 * @method static string bg_red(string $text)
 * @method static string bg_white(string $text)
 * @method static string bg_yellow(string $text)
 *
 * Text Formatting
 * @method static string bold(string $text)
 * @method static string dim(string $text)
 * @method static string italic(string $text)
 * @method static string underline(string $text)
 * @method static string blink(string $text)
 * @method static string inverse(string $text)
 * @method static string hidden(string $text)
 * @method static string strikethrough(string $text)
 *
 * Reset Options
 * @method static string reset(string $text)
 * @method static string reset_bold(string $text)
 * @method static string reset_dim(string $text)
 * @method static string reset_italic(string $text)
 * @method static string reset_underline(string $text)
 * @method static string reset_blink(string $text)
 * @method static string reset_inverse(string $text)
 * @method static string reset_hidden(string $text)
 * @method static string reset_strikethrough(string $text)
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
        'bg_black' => '40',
        'bg_blue' => '44',
        'bg_cyan' => '46',
        'bg_dark_gray' => '100',
        'bg_gray' => '47',
        'bg_green' => '42',
        'bg_light_blue' => '104',
        'bg_light_cyan' => '106',
        'bg_light_gray' => '47',
        'bg_light_green' => '102',
        'bg_light_magenta' => '105',
        'bg_light_red' => '101',
        'bg_light_yellow' => '103',
        'bg_magenta' => '45',
        'bg_red' => '41',
        'bg_white' => '107',
        'bg_yellow' => '43',

        # Text Formatting
        'bold' => '1',
        'dim' => '2',
        'italic' => '3',
        'underline' => '4',
        'blink' => '5',
        'inverse' => '7',
        'hidden' => '8',
        'strikethrough' => '9',

        # Reset Options
        'reset' => '0',
        'reset_bold' => '21',
        'reset_dim' => '22',
        'reset_italic' => '23',
        'reset_underline' => '24',
        'reset_blink' => '25',
        'reset_inverse' => '27',
        'reset_hidden' => '28',
        'reset_strikethrough' => '29',
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
