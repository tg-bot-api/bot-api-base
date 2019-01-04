<?php

declare(strict_types=1);

namespace Greenplugin\TelegramBot\Normalizer;

use Greenplugin\TelegramBot\Type\ForceReplyType;
use Greenplugin\TelegramBot\Type\InlineKeyboardMarkupType;
use Greenplugin\TelegramBot\Type\MaskPositionType;
use Greenplugin\TelegramBot\Type\ReplyKeyboardMarkupType;
use Greenplugin\TelegramBot\Type\ReplyKeyboardRemoveType;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Serializer;

class JsonSerializableNormalizer implements NormalizerInterface
{
    private $objectNormalizer;

    public function __construct(NormalizerInterface $objectNormalizer)
    {
        $this->objectNormalizer = $objectNormalizer;
    }

    public function normalize($topic, $format = null, array $context = [])
    {
        $serializer = new Serializer([$this->objectNormalizer]);

        return \json_encode($serializer->normalize($topic, null, ['skip_null_values' => true]));
    }

    public function supportsNormalization($data, $format = null)
    {
        return $data instanceof InlineKeyboardMarkupType ||
            $data instanceof ReplyKeyboardMarkupType ||
            $data instanceof ReplyKeyboardRemoveType ||
            $data instanceof MaskPositionType ||
            $data instanceof ForceReplyType;
    }
}
