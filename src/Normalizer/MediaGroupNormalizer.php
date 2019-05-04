<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Normalizer;

use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Serializer;
use TgBotApi\BotApiBase\Method\SendMediaGroupMethod;

/**
 * Class MediaGroupNormalizer.
 */
class MediaGroupNormalizer implements NormalizerInterface
{
    /**
     * @var InputMediaNormalizer
     */
    private $inputMediaNormalizer;
    /**
     * @var NormalizerInterface
     */
    private $objectNormalizer;

    /**
     * MediaGroupNormalizer constructor.
     *
     * @param InputMediaNormalizer $inputMediaNormalizer
     * @param NormalizerInterface  $objectNormalizer
     */
    public function __construct(InputMediaNormalizer $inputMediaNormalizer, NormalizerInterface $objectNormalizer)
    {
        $this->inputMediaNormalizer = $inputMediaNormalizer;
        $this->objectNormalizer = $objectNormalizer;
    }

    /**
     * @param mixed $topic
     * @param null  $format
     * @param array $context
     *
     * @throws ExceptionInterface
     *
     * @return array|bool|float|int|mixed|string
     */
    public function normalize($topic, $format = null, array $context = [])
    {
        $serializer = new Serializer([$this->inputMediaNormalizer, $this->objectNormalizer]);
        $topic->media = \json_encode($serializer->normalize($topic->media, null, ['skip_null_values' => true]));

        return $serializer->normalize($topic, null, ['skip_null_values' => true]);
    }

    /**
     * @param mixed $data
     * @param null  $format
     *
     * @return bool
     */
    public function supportsNormalization($data, $format = null): bool
    {
        return $data instanceof SendMediaGroupMethod;
    }
}
