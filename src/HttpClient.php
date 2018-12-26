<?php

declare(strict_types=1);

namespace Greenplugin\TelegramBot;

use Nyholm\Psr7\Request;
use Psr\Http\Client\ClientInterface;

class HttpClient implements HttpClientInterface
{
    private $client;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    public function get(string $path)
    {
        $request = new Request('GET', $path);

        $response = $this->client->sendRequest($request);

        return \json_decode($response->getBody()->getContents());
    }

    public function post(string $path, array $data)
    {
        $request = new Request('POST', $path, ['Content-Type' => 'application/json'], \json_encode($data));

        $response = $this->client->sendRequest($request);

        return \json_decode($response->getBody()->getContents());
    }
}
