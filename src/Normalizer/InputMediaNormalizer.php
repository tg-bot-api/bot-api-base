<?php

declare(strict_types=1);

namespace Greenplugin\TelegramBot\Normalizer;

use Greenplugin\TelegramBot\Type\InputMediaPhotoType;
use Greenplugin\TelegramBot\Type\InputMediaVideoType;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Serializer;

class InputMediaNormalizer implements NormalizerInterface
{
    private $files;
    private $objectNormalizer;

    public function __construct(NormalizerInterface $objectNormalizer, &$files)
    {
        $this->objectNormalizer = $objectNormalizer;
        $this->files = &$files;
    }

    public function normalize($topic, $format = null, array $context = [])
    {
        if ($topic->media instanceof \SplFileInfo) {
            $uniqid = \uniqid();
            $this->files[$uniqid] = $topic->media;
            $topic->media = 'attach://' . $uniqid;
        }

        $serializer = new Serializer([$this->objectNormalizer]);

        return $serializer->normalize($topic, null, ['skip_null_values' => true]);
    }

    public function supportsNormalization($data, $format = null)
    {
        return $data instanceof InputMediaPhotoType ||
            $data instanceof InputMediaVideoType;
    }
}
