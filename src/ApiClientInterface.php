<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase;

/**
 * Interface ApiClientInterface.
 */
interface ApiClientInterface
{
    /**
     * @param string $botKey
     */
    public function setBotKey(string $botKey): void;

    /**
     * @param string $endPoint
     */
    public function setEndpoint(string $endPoint): void;

    /**
     * @param string                 $method
     * @param BotApiRequestInterface $request
     *
     * @return mixed
     */
    public function send(string $method, BotApiRequestInterface $request);
}
