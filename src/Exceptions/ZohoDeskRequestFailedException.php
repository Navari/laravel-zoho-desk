<?php

namespace Navari\ZohoDesk\Exceptions;

use Exception;
use GuzzleHttp\Exception\GuzzleException;

class ZohoDeskRequestFailedException extends Exception
{
    public function __construct($message = 'ZohoDesk request failed', $code = 0, ?GuzzleException $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
