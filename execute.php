#!/usr/bin/env php
<?php

use Paperclip\Commands\Command;

$autoload = __DIR__ . '/vendor/autoload.php';
if (file_exists($autoload)) {
    require $autoload;
}

require 'functions.php';

const PROJECT_NAME = 'PAPERCLIP';

$execute = $argv[1] ?? null;
if (!$execute) {
    echo "Usage: php execute.php [command]\n";
    exit;
}

foreach (Command::commands() as $command) {
    /** @var Command $command */
    if ($command::command() === $execute) {
        $command = new $command($argv);
        $command->execute();
        exit;
    }
}

echo "Command [$execute] not found.\n";
exit();