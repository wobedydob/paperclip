<?php

function env(string $key, $default = null)
{
    $env = __DIR__;
    $dotenv = Dotenv\Dotenv::createImmutable($env);
    $dotenv->load();

    return $_ENV[$key] ?? $default;
}

function credentials(): string
{
    return __DIR__ . '/' . env('GOOGLE_APPLICATION_CREDENTIALS');
}