<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests;

use TgBotApi\BotApiBase\BotApiNormalizer;
use TgBotApi\BotApiBase\NormalizerInterface;

trait GetNormalizerTrait
{
    private function getNormalizer(): NormalizerInterface
    {
        return new BotApiNormalizer();
    }
}
