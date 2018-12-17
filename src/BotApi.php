<?php

namespace Greenplugin\TelegramBot;

use Greenplugin\TelegramBot\Request\GetMeRequest;
use Greenplugin\TelegramBot\Response\UserResponse;
use Nyholm\Psr7\Request;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class BotApi implements BotApiInterface
{
    private $httpClient;

    /**
     * Create a new Skeleton Instance
     * @param string $key
     */
    public function __construct(HttpClient $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function getMe(GetMeRequest $request)
    {
        return $this->send($request, UserResponse::class);
    }

    public function send($request, $response)
    {
        return $this->denormalize($this->httpClient->get('getMe'), $response);
    }

    private function denormalize($data, $response)
    {
        $normalizer = new ObjectNormalizer(null);

        return $normalizer->denormalize($data->result, $response);
    }
}
