<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\DeleteWebhookMethod;

class DeleteWebhookMethodTest extends MethodTestCase
{
    /**
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode()
    {
        $botApi = $this->getBot('deleteWebhook', [], true);

        $botApi->deleteWebhook(DeleteWebhookMethod::create());
    }
}
