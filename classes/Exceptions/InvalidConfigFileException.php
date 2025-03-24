<?php

namespace Paperclip\Exceptions;

use Throwable;

class InvalidConfigFileException extends \Exception
{
    public function __construct(
        string    $class,
        int       $code = 0,
        string    $message = 'Invalid config file: "%s"',
        Throwable $previous = null
    )
    {
        parent::__construct(sprintf($message, $class), $code, $previous);
    }
}