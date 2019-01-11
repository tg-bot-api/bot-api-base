<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\GetWebhookInfoMethod;

class GetWebhookInfoMethodTest extends MethodTestCase
{
    /**
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode()
    {
        $botApi = $this->getBot('getWebhookInfo', []);

        $botApi->getWebhookInfo(GetWebhookInfoMethod::create());
    }
}
