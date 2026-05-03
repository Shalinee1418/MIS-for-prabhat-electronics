<?php

namespace Sarma\MisForPrabhatElectronics\App\Core;

class Request
{
    private array $data;

    public function __construct()
    {
        $this->data = $_POST;
    }

    public function input(string $key, $default = null)
    {
        return $this->data[$key] ?? $default;
    }

    public function __get(string $key)
    {
        return $_POST[$key] ?? null;
    }
}