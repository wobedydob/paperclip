<?php

namespace Paperclip\Utilities;

class FileManager
{

    public static function projectRoot(string $path = ""): string
    {
        $autoloadPath = dirname((new \ReflectionClass(\Composer\Autoload\ClassLoader::class))->getFileName());
        $root = dirname($autoloadPath, 2);

        if (!empty($path)) {

            // check if path starts with a slash and remove it
            if (substr($path, 0, 1) === '/') {
                $path = substr($path, 1);
            }

            // add the path to the root with a slash
            $root .= '/' . $path;
        }

        return $root;
    }

}