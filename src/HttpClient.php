<?php


namespace Greenplugin\TelegramBot;


use Nyholm\Psr7\Request;
use Psr\Http\Client\ClientInterface;

class HttpClient
{
    private $key;
    private $endpoint;
    private $client;
    public function __construct($key, ClientInterface $client, $endpoint = 'https://api.telegram.org/bot')
    {
        $this->key = $key;
        $this->endpoint = $endpoint;
        $this->client = $client;
    }

    public function get($method, $query = [])
    {
        $request = new Request('GET', $this->endpoint.$this->key.'/'.$method);

        $response = $this->client->sendRequest($request);

        $json = json_decode($response->getBody()->getContents());
        if($json->ok !== true) {
            throw new \Exception('whoops');
        }

        return $json;
    }
}