<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase;

use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;
use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Serializer;
use TgBotApi\BotApiBase\Normalizer\AnswerInlineQueryNormalizer;
use TgBotApi\BotApiBase\Normalizer\InputFileNormalizer;
use TgBotApi\BotApiBase\Normalizer\InputMediaNormalizer;
use TgBotApi\BotApiBase\Normalizer\JsonSerializableNormalizer;
use TgBotApi\BotApiBase\Normalizer\LegacyObjectNormalizer;
use TgBotApi\BotApiBase\Normalizer\MediaGroupNormalizer;

/**
 * This normalizer need to correctly normalize objects for symfony 3.4
 * Class BotApiNormalizer.
 */
class BotApiLegacyNormalizer extends BotApiNormalizer
{
    /**
     * @param $method
     *
     * @throws ExceptionInterface
     */
    public function normalize($method): BotApiRequestInterface
    {
        if (\defined(AbstractObjectNormalizer::class . '::SKIP_NULL_VALUES')) {
            $message = 'Please use BotApiNormalizer class as normalizer. BotApiLegacyNormalizer is legacy.';
            throw new \RuntimeException($message);
        }

        $files = [];

        $objectNormalizer = new LegacyObjectNormalizer(null, new CamelCaseToSnakeCaseNameConverter());
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
            [DateTimeNormalizer::FORMAT_KEY => 'U']
        );

        return new BotApiRequest($data, $files);
    }
}
