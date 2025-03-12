<?php

if (file_exists('vendor/autoload.php')) {
    require 'vendor/autoload.php';
}

//spl_autoload_register(function ($class) {
//
//    $class = str_replace('Paperclip\\', '', $class);
//    $file = __DIR__ . '/classes/' . str_replace('\\', '/', $class) . '.php';
//
//    if (file_exists($file)) {
//        require $file;
//    }
//});

spl_autoload_register(function ($class) {
    static $loaded = [];

    $class = str_replace('Paperclip\\', '', $class);
    $file = __DIR__ . '/classes/' . str_replace('\\', '/', $class) . '.php';

    if (isset($loaded[$file])) {
        die("🔥 ERROR: Trying to load $file twice!\n");
    }

    if (file_exists($file)) {
        $loaded[$file] = true;
        require $file;
    }
});