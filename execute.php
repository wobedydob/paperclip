#!/usr/bin/env php
<?php
use Paperclip\Paperclip;

# Composer autoload
$autoload = __DIR__ . '/vendor/autoload.php';
if (file_exists($autoload)) {
    require $autoload;
}

# Paperclip setup
Paperclip::instance()
    ->setup($argv)
    ->execute();