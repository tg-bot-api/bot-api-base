<?php

namespace Greenplugin\TelegramBot;

use Greenplugin\TelegramBot\Exception\ResponseException;
use Greenplugin\TelegramBot\Request\GetMeRequest;
use Greenplugin\TelegramBot\Response\UserResponse;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class BotApi implements BotApiInterface
{
    /**
     * @var HttpClientInterface
     */
    private $httpClient;

    private $key;

    private $endPoint;

    /**
     * Create a new Skeleton Instance
     * @param HttpClientInterface $httpClient
     * @param string $key
     * @param string $endPoint
     */
    public function __construct(HttpClientInterface $httpClient, string $key, string $endPoint = 'https://api.telegram.org/bot')
    {
        $this->httpClient = $httpClient;
        $this->key = $key;
        $this->endPoint = $endPoint;
    }

    /**
     * @param GetMeRequest $request
     * @return UserResponse
     * @throws ResponseException
     */
    public function getMe(GetMeRequest $request): UserResponse
    {
        return $this->send($request, UserResponse::class);
    }

    /**
     * @param $request
     * @param $response
     * @return object
     * @throws ResponseException
     */
    public function send($request, $response): object
    {

        $json = $this->httpClient->get($this->endPoint . $this->key . '/' . $this->getMethodName($request));

        if ($json->ok !== true) {
            throw new ResponseException($json->description);
        }

        return $this->denormalize($json, $response);
    }

    private function getMethodName($request)
    {
        return 'getMe';
    }

    private function denormalize($data, $response)
    {
        $normalizer = new ObjectNormalizer(null);

        return $normalizer->denormalize($data->result, $response);
    }
}
