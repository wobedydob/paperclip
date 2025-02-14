<?php

/**
 * Arguments class.
 *
 * This class is used to parse the arguments from the command line.
 */
class Arguments
{
    private array $argv;
    private array $arguments;

    public function __construct(array $argv, array $arguments)
    {
        $this->argv = $argv;
        $this->arguments = $arguments;
    }

    public function get(string $key, mixed $default): mixed
    {
        return $this->arguments[$key] ?? $default;
    }

    public function argv(): array
    {
        return $this->argv;
    }
}