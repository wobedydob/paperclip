#!/usr/bin/env php
<?php

# Composer autoload
$autoload = __DIR__ . '/vendor/autoload.php';
if (file_exists($autoload)) {
    require $autoload;
}

# Paperclip setup
const PROJECT_NAME = 'PAPERCLIP';
$paperclip = new Paperclip\Paperclip($argv);
$paperclip->execute();