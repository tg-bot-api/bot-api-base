<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Traits;

use TgBotApi\BotApiBase\Exception\ResponseException;
use TgBotApi\BotApiBase\Method\Interfaces\StopMethodAliasInterface;
use TgBotApi\BotApiBase\Method\StopMessageLiveLocationMethod;

/**
 * Trait StopMethodTrait.
 */
trait StopMethodTrait
{
    /**
     * @param StopMethodAliasInterface $method
     *
     * @throws ResponseException
     *
     * @return bool
     */
    abstract public function stop(StopMethodAliasInterface $method): bool;

    /**
     * @param StopMessageLiveLocationMethod $method
     *
     * @throws ResponseException
     *
     * @return bool
     */
    public function stopMessageLiveLocation(StopMessageLiveLocationMethod $method): bool
    {
        return $this->stop($method);
    }
}
