<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Normalizer;

use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Serializer;
use TgBotApi\BotApiBase\Type\PhotoSizeType;
use TgBotApi\BotApiBase\Type\UserProfilePhotosType;

/**
 * Class UserProfilePhotosNormalizer.
 */
class UserProfilePhotosNormalizer implements DenormalizerInterface
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
     * UserProfilePhotosNormalizer constructor.
     */
    public function __construct(NormalizerInterface $objectNormalizer, ArrayDenormalizer $arrayDenormalizer)
    {
        $this->objectNormalizer = $objectNormalizer;
        $this->arrayDenormalizer = $arrayDenormalizer;
    }

    /**
     * @param mixed  $data
     * @param string $class
     * @param null   $format
     *
     * @throws ExceptionInterface
     */
    public function denormalize($data, $class, $format = null, array $context = []): UserProfilePhotosType
    {
        $serializer = new Serializer([$this->objectNormalizer, $this->arrayDenormalizer]);
        $data->photos = $serializer->denormalize($data->photos, PhotoSizeType::class . '[][]');

        return $serializer->denormalize($data, UserProfilePhotosType::class);
    }

    /**
     * @param mixed  $data
     * @param string $type
     * @param null   $format
     */
    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return UserProfilePhotosType::class === $type;
    }
}
