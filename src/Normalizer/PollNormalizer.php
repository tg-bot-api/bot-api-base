<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Normalizer;

use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Serializer;
use TgBotApi\BotApiBase\Method\SendPollMethod;

class PollNormalizer implements NormalizerInterface
{
    /**
     * @var NormalizerInterface
     */
    private $objectNormalizer;

    /**
     * JsonSerializableNormalizer constructor.
     */
    public function __construct(NormalizerInterface $objectNormalizer)
    {
        $this->objectNormalizer = $objectNormalizer;
    }

    /**
     * @param SendPollMethod $topic
     * @param null           $format
     *
     * @throws ExceptionInterface
     *
     * @return array|bool|false|float|int|string
     */
    public function normalize($topic, $format = null, array $context = [])
    {
        $serializer = new Serializer([
            new JsonSerializableNormalizer($this->objectNormalizer),
            $this->objectNormalizer,
        ]);

        $topic->options = \json_encode($topic->options);

        return $serializer->normalize($topic, null, ['skip_null_values' => true]);
    }

    /**
     * @param mixed $data
     * @param null  $format
     */
    public function supportsNormalization($data, $format = null): bool
    {
        return $data instanceof SendPollMethod;
    }
}
