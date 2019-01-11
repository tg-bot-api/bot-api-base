<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Traits;

use TgBotApi\BotApiBase\Exception\ResponseException;
use TgBotApi\BotApiBase\Method\CreateNewStickerSetMethod;
use TgBotApi\BotApiBase\Method\Interfaces\CreateMethodAliasInterface;

/**
 * Trait CreateMethodTrait.
 */
trait CreateMethodTrait
{
    /**
     * @param CreateMethodAliasInterface $method
     *
     * @throws ResponseException
     *
     * @return bool
     */
    abstract public function create(CreateMethodAliasInterface $method): bool;

    /**
     * @param CreateNewStickerSetMethod $method
     *
     * @throws ResponseException
     *
     * @return bool
     */
    public function createNewStickerSet(CreateNewStickerSetMethod $method): bool
    {
        return $this->create($method);
    }
}
