<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase;

use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use TgBotApi\BotApiBase\Exception\NormalizationException;
use TgBotApi\BotApiBase\Exception\ResponseException;
use TgBotApi\BotApiBase\Normalizer\AnswerInlineQueryNormalizer;
use TgBotApi\BotApiBase\Normalizer\InputFileNormalizer;
use TgBotApi\BotApiBase\Normalizer\InputMediaNormalizer;
use TgBotApi\BotApiBase\Normalizer\JsonSerializableNormalizer;
use TgBotApi\BotApiBase\Normalizer\MediaGroupNormalizer;
use TgBotApi\BotApiBase\Normalizer\UserProfilePhotosNormalizer;

/**
 * Class BotApi.
 */
class BotApi implements BotApiInterface
{
    /**
     * @var string
     */
    private $botKey;

    /**
     * @var ApiClientInterface
     */
    private $apiClient;

    /**
     * @var string
     */
    private $endPoint;

    /**
     * BotApi constructor.
     *
     * @param string             $botKey
     * @param ApiClientInterface $apiClient
     * @param string             $endPoint
     */
    public function __construct(
        string $botKey,
        ApiClientInterface $apiClient,
        string $endPoint = 'https://api.telegram.org'
    ) {
        $this->botKey = $botKey;
        $this->apiClient = $apiClient;
        $this->endPoint = $endPoint;

        $this->apiClient->setBotKey($botKey);
        $this->apiClient->setEndpoint($endPoint);
    }

    /**
     * @param $method
     * @param string|null $type
     *
     * @throws ResponseException
     * @throws NormalizationException
     *
     * @return mixed
     */
    public function call($method, string $type = null)
    {
        list($data, $files) = $this->encode($method);

        $json = $this->apiClient->send($this->getMethodName($method), $data, $files);

        if (true !== $json->ok) {
            throw new ResponseException($json->description);
        }

        return $type ? $this->denormalize($json, $type) : $json->result;
    }

    /**
     * @return string
     */
    public function getBotKey(): string
    {
        return $this->botKey;
    }

    /**
     * @return string
     */
    public function getEndPoint(): string
    {
        return $this->endPoint;
    }

    /**
     * @param $method
     *
     * @return string
     */
    private function getMethodName($method): string
    {
        return \lcfirst(\substr(
            \get_class($method),
            \strrpos(\get_class($method), '\\') + 1,
            -1 * \strlen('Method')
        ));
    }

    /**
     * @param $data
     * @param $type
     *
     * @return object|array
     */
    private function denormalize($data, $type)
    {
        $normalizer = new ObjectNormalizer(
            null,
            new CamelCaseToSnakeCaseNameConverter(),
            null,
            new PhpDocExtractor()
        );
        $arrayNormalizer = new ArrayDenormalizer();
        $serializer = new Serializer([
            new UserProfilePhotosNormalizer($normalizer, $arrayNormalizer),
            new DateTimeNormalizer(),
            $normalizer,
            $arrayNormalizer,
        ]);

        return $serializer->denormalize($data->result, $type, null, [DateTimeNormalizer::FORMAT_KEY => 'U']);
    }

    /**
     * @param $method
     *
     * @throws NormalizationException
     *
     * @return array []
     */
    private function encode($method): array
    {
        $files = [];

        $objectNormalizer = new ObjectNormalizer(null, new CamelCaseToSnakeCaseNameConverter());
        $serializer = new Serializer([
            new InputFileNormalizer($files),
            new MediaGroupNormalizer(new InputMediaNormalizer($objectNormalizer, $files), $objectNormalizer),
            new JsonSerializableNormalizer($objectNormalizer),
            new AnswerInlineQueryNormalizer($objectNormalizer),
            new DateTimeNormalizer(),
            $objectNormalizer,
        ]);

        $data = $serializer->normalize(
            $method,
            null,
            ['skip_null_values' => true, DateTimeNormalizer::FORMAT_KEY => 'U']
        );

        if (!\is_array($data)) {
            throw new NormalizationException('Normalized data must be array');
        }

        return [$data, $files];
    }
}
