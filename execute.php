#!/usr/bin/env php
<?php

# Composer autoload
use Paperclip\Enums\ColorOption;
use Paperclip\Paperclip;

$autoload = __DIR__ . '/vendor/autoload.php';
if (file_exists($autoload)) {
    require $autoload;
}

# Paperclip setup
Paperclip::instance()
    ->setup($argv,
        [
            'display_subject' => false,
            'colors' => [
                'banner' => [
                    'row' => ColorOption::DARK_GRAY->value,
                    'braces' => ColorOption::LIGHT_RED->value,
                    'slashes' => ColorOption::LIGHT_RED->value,
                    'title' => ColorOption::WHITE->value,
                ],
                'info' => [
                    'title' => ColorOption::YELLOW->value,
                    'text' => ColorOption::LIGHT_GRAY->value,
                    'description' => ColorOption::WHITE->value,
                    'highlight' => ColorOption::GREEN->value,
                    'parameter' => ColorOption::WHITE->value,
                ],
                'notes' => [
                    'title' => ColorOption::MAGENTA->value,
                    'text' => COLOROPTION::WHITE->value,
                    'highlight' => ColorOption::LIGHT_YELLOW->value,
                    'bullet' => COLOROPTION::MAGENTA->value,
                ]
            ]
        ]
    )
    ->execute();