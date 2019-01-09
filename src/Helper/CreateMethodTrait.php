<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Helper;

use TgBotApi\BotApiBase\Exception\NormalizationException;
use TgBotApi\BotApiBase\Exception\ResponseException;
use TgBotApi\BotApiBase\Method\CreateNewStickerSetMethod;

/**
 * Trait CreateMethodTrait.
 */
trait CreateMethodTrait
{
    /**
     * @param $method
     * @param $type
     *
     * @throws ResponseException
     * @throws NormalizationException
     *
     * @return mixed
     */
    abstract public function call($method, $type = null);

    /**
     * @param CreateNewStickerSetMethod $method
     *
     * @throws NormalizationException
     * @throws ResponseException
     *
     * @return bool
     */
    public function createNewStickerSet(CreateNewStickerSetMethod $method): bool
    {
        return $this->call($method);
    }
}
