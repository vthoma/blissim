<?php

namespace App\Support\Exceptions;

use Exception;

class NotFoundException extends Exception
{
    public function error404()
    {
        http_response_code(404);
        require VIEWS . '404.php';
    }
}