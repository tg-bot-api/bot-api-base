<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Traits;

use TgBotApi\BotApiBase\Exception\ResponseException;
use TgBotApi\BotApiBase\Method\AddStickerToSetMethod;
use TgBotApi\BotApiBase\Method\Interfaces\AddMethodAliasInterface;

/**
 * Trait AddMethodTrait.
 */
trait AddMethodTrait
{
    /**
     * @param AddMethodAliasInterface $method
     *
     * @throws ResponseException
     *
     * @return bool
     */
    abstract public function add(AddMethodAliasInterface $method): bool;

    /**
     * @param AddStickerToSetMethod $method
     *
     * @throws ResponseException
     *
     * @return bool
     */
    public function addStickerToSet(AddStickerToSetMethod $method): bool
    {
        return $this->add($method);
    }
}
