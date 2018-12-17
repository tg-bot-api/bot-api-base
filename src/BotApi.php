<?php

namespace Greenplugin\TelegramBot;

use Greenplugin\TelegramBot\Exception\ResponseException;
use Greenplugin\TelegramBot\Method\GetMeMethod;
use Greenplugin\TelegramBot\Method\GetUpdatesMethod;
use Greenplugin\TelegramBot\Type\UpdateType;
use Greenplugin\TelegramBot\Type\UserType;
use Nyholm\Psr7\Request;
use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

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
     * @param GetMeMethod $method
     * @return UserType
     * @throws ResponseException
     */
    public function getMe(GetMeMethod $method): UserType
    {
        return $this->call($method, UserType::class);
    }

    /**
     * @param GetUpdatesMethod $method
     * @return UpdateType[]
     * @throws ResponseException
     */
    public function getUpdates(GetUpdatesMethod $method): array
    {
        return $this->call($method, UpdateType::class.'[]');
    }

    /**
     * @param $method
     * @param $type
     * @return object
     * @throws ResponseException
     */
    public function call($method, $type)
    {
        $json = $this->httpClient->get($this->endPoint . $this->key . '/' . $this->getMethodName($method));

        if ($json->ok !== true) {
            throw new ResponseException($json->description);
        }

        return $this->denormalize($json, $type);
    }

    private function getMethodName($method)
    {
        return lcfirst(substr(get_class($method),strrpos(get_class($method), '\\')+1, -1 * strlen('Method')));
    }


    private function denormalize($data, $type)
    {
        $serializer = new Serializer([new ObjectNormalizer(null, null, null, new PhpDocExtractor()), new ArrayDenormalizer]);
        return $serializer->denormalize($data->result, $type);
    }
}
