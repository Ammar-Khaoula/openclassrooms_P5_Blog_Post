<?php
namespace Src\Exceptions;

use Exception;
use Throwable;

class NotFoundException extends Exception{

    public function __construct(string $message= "", int $code= 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
    public function error404(): void
    {
        // Send http response 404
        http_response_code(404);
        require VIEWS . 'errors/404.php';
    }
}
