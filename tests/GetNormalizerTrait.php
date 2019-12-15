<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests;

use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;
use TgBotApi\BotApiBase\BotApiLegacyNormalizer;
use TgBotApi\BotApiBase\BotApiNormalizer;
use TgBotApi\BotApiBase\NormalizerInterface;

trait GetNormalizerTrait
{
    private function getNormalizer(): NormalizerInterface
    {
        return \defined(AbstractObjectNormalizer::class . '::SKIP_NULL_VALUES')
            ? new BotApiNormalizer()
            : new BotApiLegacyNormalizer();
    }
}
