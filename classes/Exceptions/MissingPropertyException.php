<?php

namespace Paperclip\Exceptions;

use Throwable;

class MissingPropertyException extends \Exception
{
    public function __construct(
        string    $class,
        string    $property,
        int       $code = 0,
        string    $message = 'Class "%s" has missing property "%s"',
        Throwable $previous = null
    )
    {
        parent::__construct(sprintf($message, $class, $property), $code, $previous);
    }
}