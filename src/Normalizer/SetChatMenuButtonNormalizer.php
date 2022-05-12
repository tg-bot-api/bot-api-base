<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Normalizer;

use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Serializer;
use TgBotApi\BotApiBase\Method\SetChatMenuButtonMethod;

/**
 * Class SetChatMenuButtonNormalizer.
 */
class SetChatMenuButtonNormalizer implements NormalizerInterface
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
     * @param SetChatMenuButtonMethod $topic
     * @param null                $format
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

        $topic->menuButton = \json_encode($serializer->normalize($topic->menuButton, null, ['skip_null_values' => true]));

        return $serializer->normalize($topic, null, ['skip_null_values' => true]);
    }

    /**
     * @param mixed $data
     * @param null  $format
     */
    public function supportsNormalization($data, $format = null): bool
    {
        return $data instanceof SetChatMenuButtonMethod;
    }
}
