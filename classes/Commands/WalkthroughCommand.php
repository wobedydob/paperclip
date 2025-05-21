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
        foreach ($this->steps as $key => $step) {
            $prompt = $step['prompt'] ?? false;
            $action = $step['action'] ?? false;
            $required = $step['required'] ?? true;

            if (!$prompt) {
                Log::error("Missing description for step with index [$key]");
                continue;
            }

            // first check if input is given
            if (is_string($key)) {

                $value = $this->ask($prompt);
                if ($value === '') {
                    $value = null;
                }

                if (!$value && $required) {
                    Log::error("No value provided for step with index [$key]");
                    exit;
                }

                $this->responses[$key] = $value;
            } else {
                Log::error("Invalid key [$key] for step. Expected a string.");
                continue;
            }

            // then execute the action
            if ($action) {
                if (is_callable($action)) {
                    $action($this->responses[$key] ?? null);
                } else {
                    Log::error("Action for step with index [$key] is not callable");
                }
            }
        }
    }

    protected function ask(string $prompt): string
    {
        Log::info($prompt);
        return trim(fgets(STDIN));
    }

    protected function value(string $key): ?string
    {
        return $this->responses[$key] ?? null;
    }
}
