<?php
namespace App\Exceptions\Auth;
use Exception;
use Throwable;

class AuthException extends Exception 
{
    public function __construct(string $messge, int $code = 0, Throwable $previous = null)
    {
        parent::__construct($messge, $code, $previous);
    }
}