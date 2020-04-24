<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase;

use JsonSerializable;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
use TgBotApi\BotApiBase\Method\Interfaces\MethodInterface;

interface BotSerializableResponseFactoryInterface
{
    /**
     * @throws ExceptionInterface
     *
     * @return JsonSerializable | array
     */
    public function createSerializableResponse(MethodInterface $method);
}
