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
        return $this->removeQueryString();
    }

    public function getMethod(): string
    {
        return strtoupper($_SERVER['REQUEST_METHOD']);
    }

    public function removeQueryString(): string
    {
        if ($this->uri) {
            $params = explode('&', $this->uri);
            if (str_contains($params[0], '=') === false) {
                return trim($params[0]);
            }
        }
        return "";
    }

    public function get(string $name, string $default = null): ?string
    {
        return $_GET[$name] ?? $default;
    }
}
