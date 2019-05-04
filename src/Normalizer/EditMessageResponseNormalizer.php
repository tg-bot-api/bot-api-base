<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Normalizer;

use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Serializer;
use TgBotApi\BotApiBase\Type\MessageType;

/**
 * Class UserProfilePhotosNormalizer.
 */
class EditMessageResponseNormalizer implements DenormalizerInterface
{
    /**
     * @var NormalizerInterface
     */
    private $objectNormalizer;
    /**
     * @var ArrayDenormalizer
     */
    private $arrayDenormalizer;

    /**
     * @var DateTimeNormalizer
     */
    private $dateNormalizer;

    /**
     * UserProfilePhotosNormalizer constructor.
     *
     * @param NormalizerInterface $objectNormalizer
     * @param ArrayDenormalizer   $arrayDenormalizer
     * @param DateTimeNormalizer  $dateNormalizer
     */
    public function __construct(
        NormalizerInterface $objectNormalizer,
        ArrayDenormalizer $arrayDenormalizer,
        DateTimeNormalizer $dateNormalizer
    ) {
        $this->objectNormalizer = $objectNormalizer;
        $this->arrayDenormalizer = $arrayDenormalizer;
        $this->dateNormalizer = $dateNormalizer;
    }

    /**
     * @param mixed  $data
     * @param string $class
     * @param null   $format
     * @param array  $context
     *
     * @throws ExceptionInterface
     *
     * @return MessageType | bool
     */
    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (\is_bool($data)) {
            return $data;
        }
        $serializer = new Serializer([$this->dateNormalizer, $this->objectNormalizer, $this->arrayDenormalizer]);

        return $serializer->denormalize($data, MessageType::class, $format, $context);
    }

    /**
     * @param mixed  $data
     * @param string $type
     * @param null   $format
     *
     * @return bool
     */
    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return MessageType::class . '|bool' === $type;
    }
}
