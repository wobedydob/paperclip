<?php

namespace Paperclip\Commands;

use Paperclip\Utilities\Log;

abstract class WalkthroughCommand extends Command
{
    protected array $steps = [];
    protected array $responses = [];

    public function __construct(array $argv, array $steps)
    {
        parent::__construct($argv);
        $this->steps = $steps;
    }

    protected function run(): void
    {
        foreach ($this->steps as $index => $step) {
            $prompt = $step['prompt'] ?? false;
            $input = $step['input'] ?? false;
            $action = $step['action'] ?? false;
            $required = $step['required'] ?? true;

            if (!$prompt) {
                Log::error("Missing description for step with index [$index]");
                continue;
            }

            // first check if input is given
            if ($input) {

                $value = $this->ask($prompt);
                if ($value === '') {
                    $value = null;
                }

                if (!$value && $required) {
                    Log::error("No value provided for step with index [$index]");
                    exit;
                }

                $this->responses[$index] = $value;
            }

            // then execute the action
            if ($action) {
                if (is_callable($action)) {
                    $action($this->responses[$index] ?? null);
                } else {
                    Log::error("Action for step with index [$index] is not callable");
                }
            }
        }
    }

    private function ask(string $prompt): string
    {
        Log::info($prompt);
        return trim(fgets(STDIN));
    }
}
