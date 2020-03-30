<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\GetMyCommandsMethod;

class GetMyCommandsMethodTest extends MethodTestCase
{
    /**
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode()
    {
        $botApi = $this->getBot('getMyCommands', []);

        $botApi->getMyCommands(GetMyCommandsMethod::create());
    }
}
