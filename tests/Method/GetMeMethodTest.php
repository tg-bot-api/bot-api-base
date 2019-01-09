<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\GetMeMethod;

class GetMeMethodTest extends MethodTestCase
{
    /**
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     * @throws \TgBotApi\BotApiBase\Exception\NormalizationException
     */
    public function testEncode()
    {
        $botApi = $this->getBot('getMe', []);

        $botApi->getMe(GetMeMethod::create());
    }
}
