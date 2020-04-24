<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase;

use Psr\Http\Message\ResponseInterface;
use TgBotApi\BotApiBase\Method\Interfaces\MethodInterface;

interface BotPsrResponseFactoryInterface
{
    public function createResponse(MethodInterface $method): ResponseInterface;
}
