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
        $config = $this->config;
        foreach ($keys as $key) {
            if (!isset($config[$key])) {
                return $default;
            }
            $config = $config[$key];
        }
        return $config;
    }

    public function set(string $key, mixed $value): self
    {
        $keys = explode('.', $key);
        $config = &$this->config;
        foreach ($keys as $key) {
            if (!isset($config[$key])) {
                $config[$key] = [];
            }
            $config = &$config[$key];
        }
        $config = $value;
        return $this;
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