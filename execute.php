#!/usr/bin/env php
<?php

# Composer autoload
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
                    'row' => 'green',
                    'braces' => 'green',
                    'slashes' => 'green',
                    'title' => 'white',
                ],
                'info' => [
                    'title' => 'yellow',
                    'text' => 'light_gray',
                    'description' => 'white',
                    'highlight' => 'green',
                    'parameter' => 'white',
                ],
                'notes' => [
                    'title' => 'magenta',
                    'text' => 'white',
                    'highlight' => 'light_yellow',
                    'bullet' => 'magenta',
                ]
            ]
        ]
    )
    ->execute();