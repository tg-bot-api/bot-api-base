<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Normalizer;

use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Serializer;
use TgBotApi\BotApiBase\Method\AnswerInlineQueryMethod;

/**
 * Class AnswerInlineQueryNormalizer.
 */
class AnswerInlineQueryNormalizer implements NormalizerInterface
{
    /**
     * @var NormalizerInterface
     */
    private $objectNormalizer;

    /**
     * AnswerInlineQueryNormalizer constructor.
     *
     * @param NormalizerInterface $objectNormalizer
     */
    public function __construct(NormalizerInterface $objectNormalizer)
    {
        $this->objectNormalizer = $objectNormalizer;
    }

    /**
     * @param mixed $topic
     * @param null  $format
     * @param array $context
     *
     * @return array|bool|float|int|mixed|string
     */
    public function normalize($topic, $format = null, array $context = [])
    {
        $serializer = new Serializer([new DateTimeNormalizer(), $this->objectNormalizer]);

        $topic->results = \json_encode($serializer->normalize(
            $topic->results,
            null,
            ['skip_null_values' => true, DateTimeNormalizer::FORMAT_KEY => 'U']
        ));

        return $serializer->normalize(
            $topic,
            null,
            ['skip_null_values' => true, DateTimeNormalizer::FORMAT_KEY => 'U']
        );
    }

    /**
     * @param mixed $data
     * @param null  $format
     *
     * @return bool
     */
    public function supportsNormalization($data, $format = null): bool
    {
        return $data instanceof AnswerInlineQueryMethod;
    }
}
