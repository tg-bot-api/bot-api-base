<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Normalizer;

use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Serializer;
use TgBotApi\BotApiBase\Type\ForceReplyType;
use TgBotApi\BotApiBase\Type\InlineKeyboardMarkupType;
use TgBotApi\BotApiBase\Type\MaskPositionType;
use TgBotApi\BotApiBase\Type\ReplyKeyboardMarkupType;
use TgBotApi\BotApiBase\Type\ReplyKeyboardRemoveType;

/**
 * Class JsonSerializableNormalizer.
 */
class JsonSerializableNormalizer implements NormalizerInterface
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
     * @param mixed $topic
     * @param null  $format
     *
     * @throws ExceptionInterface
     *
     * @return string
     */
    public function normalize($topic, $format = null, array $context = [])
    {
        $serializer = new Serializer([$this->objectNormalizer]);

        return \json_encode($serializer->normalize($topic, null, ['skip_null_values' => true]));
    }

    /**
     * @param mixed $data
     * @param null  $format
     */
    public function supportsNormalization($data, $format = null): bool
    {
        return $data instanceof InlineKeyboardMarkupType ||
            $data instanceof ReplyKeyboardMarkupType ||
            $data instanceof ReplyKeyboardRemoveType ||
            $data instanceof MaskPositionType ||
            $data instanceof ForceReplyType;
    }
}
