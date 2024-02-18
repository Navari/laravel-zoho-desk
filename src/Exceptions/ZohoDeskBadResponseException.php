<?php

namespace Navari\ZohoDesk\Exceptions;

class ZohoDeskBadResponseException extends \Exception
{
    public function __construct($message = 'ZohoDesk returned a bad response', $code = 0, \Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
