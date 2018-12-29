<?php

declare(strict_types=1);

namespace Greenplugin\TelegramBot\Normalizer;

use Greenplugin\TelegramBot\Type\PhotoSizeType;
use Greenplugin\TelegramBot\Type\UserProfilePhotosType;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Serializer;

class UserProfilePhotosNormalizer implements DenormalizerInterface
{
    private $objectNormalizer;
    private $arrayDenormalizer;

    public function __construct(NormalizerInterface $objectNormalizer, ArrayDenormalizer $arrayDenormalizer)
    {
        $this->objectNormalizer = $objectNormalizer;
        $this->arrayDenormalizer = $arrayDenormalizer;
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        $serializer = new Serializer([$this->objectNormalizer, $this->arrayDenormalizer]);
        $data['photos'] = $serializer->denormalize($data['photos'], PhotoSizeType::class.'[][]');

        return $serializer->denormalize($data, UserProfilePhotosType::class);
    }

    public function supportsDenormalization($data, $type, $format = null)
    {
        return UserProfilePhotosType::class === $type;
    }
}
