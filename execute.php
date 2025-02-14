#!/usr/bin/env php
<?php require 'autoloader.php';

use Commands\Command;

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