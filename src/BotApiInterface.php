<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase;

use TgBotApi\BotApiBase\Exception\NormalizationException;
use TgBotApi\BotApiBase\Exception\ResponseException;

interface BotApiInterface
{
    /**
     * @param $method
     * @param string|null $type
     *
     * @throws ResponseException
     * @throws NormalizationException
     *
     * @return mixed
     */
    public function call($method, string $type = null);

    /**
     * @return string
     */
    public function getBotKey(): string;

    /**
     * @return string
     */
    public function getEndPoint(): string;
}
