<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Normalizer;

use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\SerializerAwareInterface;
use Symfony\Component\Serializer\SerializerInterface;

class LegacyObjectNormalizerWrapper implements NormalizerInterface, SerializerAwareInterface
{
    /**
     * @var NormalizerInterface
     */
    private $normalizer;

    public function __construct(AbstractNormalizer $normalizer)
    {
        $this->normalizer = $normalizer;
    }

    /**
     * {@inheritdoc}
     */
    public function normalize($object, $format = null, array $context = [])
    {
        $data = $this->normalizer->normalize($object, $format, $context);

        return \array_filter($data, static function ($value) {
            return null !== $value;
        });
    }

    /**
     * {@inheritdoc}
     */
    public function supportsNormalization($data, $format = null)
    {
        return $this->normalizer->supportsNormalization($data, $format);
    }

    /**
     * {@inheritdoc}
     */
    public function setSerializer(SerializerInterface $serializer)
    {
        $this->normalizer->setSerializer($serializer);
    }
}
