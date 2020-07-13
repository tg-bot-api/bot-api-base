<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase;

use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;
use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use TgBotApi\BotApiBase\Normalizer\AnswerInlineQueryNormalizer;
use TgBotApi\BotApiBase\Normalizer\EditMessageMediaNormalizer;
use TgBotApi\BotApiBase\Normalizer\EditMessageResponseNormalizer;
use TgBotApi\BotApiBase\Normalizer\InputFileNormalizer;
use TgBotApi\BotApiBase\Normalizer\InputMediaNormalizer;
use TgBotApi\BotApiBase\Normalizer\InvoiceNormalizer;
use TgBotApi\BotApiBase\Normalizer\JsonSerializableNormalizer;
use TgBotApi\BotApiBase\Normalizer\LegacyObjectNormalizerWrapper;
use TgBotApi\BotApiBase\Normalizer\MediaGroupNormalizer;
use TgBotApi\BotApiBase\Normalizer\PollNormalizer;
use TgBotApi\BotApiBase\Normalizer\SetMyCommandsNormalizer;
use TgBotApi\BotApiBase\Normalizer\UserProfilePhotosNormalizer;

/**
 * Class BotApiNormalizer.
 */
class BotApiNormalizer implements NormalizerInterface
{
    /**
     * @param $data
     * @param $type
     *
     * @throws ExceptionInterface
     *
     * @return object|array|bool
     */
    public function denormalize($data, $type)
    {
        $normalizer = new ObjectNormalizer(
            null,
            new CamelCaseToSnakeCaseNameConverter(),
            null,
            new PhpDocExtractor()
        );
        $arrayNormalizer = new ArrayDenormalizer();
        $dateNormalizer = new DateTimeNormalizer();
        $serializer = new Serializer([
            new UserProfilePhotosNormalizer($normalizer, $arrayNormalizer),
            new EditMessageResponseNormalizer($normalizer, $arrayNormalizer, $dateNormalizer),
            new DateTimeNormalizer(),
            $dateNormalizer,
            $normalizer,
            $arrayNormalizer,
        ]);

        return $serializer->denormalize($data, $type, null, [DateTimeNormalizer::FORMAT_KEY => 'U']);
    }

    /**
     * @param $method
     *
     * @throws ExceptionInterface
     */
    public function normalize($method): BotApiRequestInterface
    {
        $isLegacy = !\defined(AbstractObjectNormalizer::class . '::SKIP_NULL_VALUES');

        $files = [];

        $objectNormalizer = new ObjectNormalizer(null, new CamelCaseToSnakeCaseNameConverter());
        if ($isLegacy) {
            $objectNormalizer = new LegacyObjectNormalizerWrapper($objectNormalizer);
        }

        $serializer = new Serializer([
            new PollNormalizer($objectNormalizer),
            new InvoiceNormalizer($objectNormalizer),
            new SetMyCommandsNormalizer($objectNormalizer),
            new InputFileNormalizer($files),
            new MediaGroupNormalizer(new InputMediaNormalizer($objectNormalizer, $files), $objectNormalizer),
            new EditMessageMediaNormalizer(new InputMediaNormalizer($objectNormalizer, $files), $objectNormalizer),
            new JsonSerializableNormalizer($objectNormalizer),
            new AnswerInlineQueryNormalizer($objectNormalizer),
            new DateTimeNormalizer(),
            $objectNormalizer,
        ]);

        $data = $serializer->normalize(
            $method,
            null,
            [
                'skip_null_values' => true,
                DateTimeNormalizer::FORMAT_KEY => 'U',
            ]
        );

        return new BotApiRequest($data, $files);
    }
}
