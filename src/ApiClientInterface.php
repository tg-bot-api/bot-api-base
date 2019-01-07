<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase;

interface ApiClientInterface
{
    public function setBotKey(string $botKey);

    public function setEndpoint(string $endPoint);

    public function send(string $method, array $data, array $files = []);
}
