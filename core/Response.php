<?php

namespace Framework;

class Response
{
    public function setResponseCode(int $code): void
    {
        if (!headers_sent()) {
            http_response_code($code);
        }
    }
}