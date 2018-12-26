<?php

declare(strict_types=1);

namespace Greenplugin\TelegramBot\Tests\Stubs;

class HttpClient implements \Greenplugin\TelegramBot\HttpClientInterface
{
    public $path;
    public $data;
    public $responce;

    public function __construct($responce = null)
    {
        $this->responce = $responce;
    }

    public function get(string $path)
    {
    }

    public function post(string $path, array $data)
    {
        return $this->responce;
    }
}
