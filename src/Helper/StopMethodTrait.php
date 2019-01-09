<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Helper;

use TgBotApi\BotApiBase\Exception\NormalizationException;
use TgBotApi\BotApiBase\Exception\ResponseException;
use TgBotApi\BotApiBase\Method\StopMessageLiveLocationMethod;

/**
 * Trait StopMethodTrait.
 */
trait StopMethodTrait
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
     * @param StopMessageLiveLocationMethod $method
     *
     * @throws NormalizationException
     * @throws ResponseException
     *
     * @return bool
     */
    public function stopMessageLiveLocation(StopMessageLiveLocationMethod $method): bool
    {
        return $this->call($method);
    }
}
