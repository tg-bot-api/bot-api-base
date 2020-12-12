<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\DeleteWebhookMethod;

class DeleteWebhookMethodTest extends MethodTestCase
{
    public function testCreate(): void
    {
        $method = DeleteWebhookMethod::create(['dropPendingUpdates' => true]);
        static::assertTrue($method->dropPendingUpdates);
    }

    /**
     * @dataProvider provideData
     *
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode(DeleteWebhookMethod $method, array $exceptedBody): void
    {
        $botApi = $this->getBot('deleteWebhook', $exceptedBody, true);

        $botApi->deleteWebhook($method);
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     *
     * @return array[]
     */
    public function provideData(): array
    {
        return [
            'default case' => [
                DeleteWebhookMethod::create(),
                [],
            ],
            'drop pending updates case' => [
                DeleteWebhookMethod::create(['dropPendingUpdates' => true]),
                ['drop_pending_updates' => true],
            ],
        ];
    }
}
