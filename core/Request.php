<?php

namespace Framework;

class Request
{
    public function __construct(public string $uri = '')
    {
        $this->uri = trim(urldecode($this->uri), '/');
    }

    public function getPath(): string
    {
        return $this->uri;
    }

    public function getMethod(): string
    {
        return strtoupper($_SERVER['REQUEST_METHOD']);
    }
}