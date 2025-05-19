<?php

namespace Paperclip;

class Config
{
    private static self $instance;

    private array $config = [];

    public static function instance(): self
    {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function setup(array $config): self
    {
        $this->config = $config;
        return $this;
    }

    public function get(string $key, mixed $default = null): mixed
    {
        $keys = explode('.', $key);

        // check if the config is an array and has a first element
        $config = is_array($this->config) && isset($this->config[0])
            ? $this->config[0]
            : $this->config;

        foreach ($keys as $segment) {
            if (is_array($config) && array_key_exists($segment, $config)) {
                $config = $config[$segment];
            } else {
                return $default;
            }
        }

        return $config;
    }

    public function set(string $key, mixed $value): void
    {
        $keys = explode('.', $key);

        // check if the config is an array and has a first element
        if (is_array($this->config) && isset($this->config[0])) {
            $config = &$this->config[0];
        } else {
            $config = &$this->config;
        }

        foreach ($keys as $i => $segment) {
            if ($i === count($keys) - 1) {
                // set the value on the last segment
                $config[$segment] = $value;
            } else {
                // automatically create intermediate arrays
                if (!isset($config[$segment]) || !is_array($config[$segment])) {
                    $config[$segment] = [];
                }
                $config = &$config[$segment];
            }
        }
    }


    public function all(): array
    {
        return $this->config;
    }

    public function color(string $key, mixed $default): mixed
    {
        $key = 'colors.' . $key;
        return $this->get($key, $default);
    }
}