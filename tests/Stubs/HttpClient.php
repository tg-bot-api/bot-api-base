<?php


namespace Greenplugin\TelegramBot\Stubs;

use Psr\Http\Client\ClientInterface;

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