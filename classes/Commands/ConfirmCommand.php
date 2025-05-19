<?php

namespace Paperclip\Commands;

abstract class ConfirmCommand extends Command
{
    protected static string $command;

    protected array $options = [];

    public function __construct(array $argv, array $options = [])
    {
        parent::__construct($argv);
        $this->options = $options;
    }

    public function executeWithOption(array $options, callable $scenario): void
    {
        $option = $this->argv[2] ?? null;
        if ($option !== null && isset($options[$option])) {
            $scenario($option);
        } else {
            $this->giveOption("Choose an option:\n" . $this->formatOptions($options), $scenario);
        }
    }

    private function formatOptions(array $options): string
    {
        $output = "";
        foreach ($options as $key => $desc) {
            $output .= "[$key] $desc\n";
        }
        return $output;
    }

    public function giveOption(string $message, callable $scenario, callable $default = null): void
    {
        echo $message;
        $handle = fopen("php://stdin", "r");
        $input = trim(fgets($handle));
        fclose($handle);

        if (!empty($input)) {
            $scenario($input);
        } else {
            if ($default) {
                $default();
            } else {
                echo "Invalid option.\n";
                exit;
            }
        }
    }
}