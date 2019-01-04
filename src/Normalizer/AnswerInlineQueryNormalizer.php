<?php

declare(strict_types=1);

namespace Greenplugin\TelegramBot\Normalizer;

use Greenplugin\TelegramBot\Method\AnswerInlineQueryMethod;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Serializer;

class AnswerInlineQueryNormalizer implements NormalizerInterface
{
    private $objectNormalizer;

    public function __construct(NormalizerInterface $objectNormalizer)
    {
        $this->objectNormalizer = $objectNormalizer;
    }

    public function normalize($topic, $format = null, array $context = [])
    {
        $serializer = new Serializer([new DateTimeNormalizer(), $this->objectNormalizer]);

        $topic->results = \json_encode($serializer->normalize(
            $topic->results,
            null,
            ['skip_null_values' => true, DateTimeNormalizer::FORMAT_KEY => 'U']
        ));

        return $serializer->normalize(
            $topic,
            null,
            ['skip_null_values' => true, DateTimeNormalizer::FORMAT_KEY => 'U']
        );
    }

    public function supportsNormalization($data, $format = null)
    {
        return $data instanceof AnswerInlineQueryMethod;
    }
}
