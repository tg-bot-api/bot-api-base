<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\GetUpdatesMethod;

class GetUpdatesMethodTest extends MethodTestCase
{
    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode()
    {
        $botApi = $this->getBot('getUpdates', [
            'offset' => 1,
            'limit' => 10,
            'timeout' => 60,
            'allowed_updates' => [
                GetUpdatesMethod::TYPE_CALLBACK_QUERY,
                GetUpdatesMethod::TYPE_CHANNEL_POST,
                GetUpdatesMethod::TYPE_CHOSEN_INLINE_RESULT,
                GetUpdatesMethod::TYPE_EDITED_CHANNEL_POST,
                GetUpdatesMethod::TYPE_EDITED_MESSAGE,
                GetUpdatesMethod::TYPE_INLINE_QUERY,
                GetUpdatesMethod::TYPE_MESSAGE,
                GetUpdatesMethod::TYPE_PRE_CHECKOUT_QUERY,
                GetUpdatesMethod::TYPE_SHIPPING_QUERY,
            ],
        ]);

        $botApi->getUpdates(GetUpdatesMethod::create([
            'offset' => 1,
            'limit' => 10,
            'timeout' => 60,
            'allowedUpdates' => [
                GetUpdatesMethod::TYPE_CALLBACK_QUERY,
                GetUpdatesMethod::TYPE_CHANNEL_POST,
                GetUpdatesMethod::TYPE_CHOSEN_INLINE_RESULT,
                GetUpdatesMethod::TYPE_EDITED_CHANNEL_POST,
                GetUpdatesMethod::TYPE_EDITED_MESSAGE,
                GetUpdatesMethod::TYPE_INLINE_QUERY,
                GetUpdatesMethod::TYPE_MESSAGE,
                GetUpdatesMethod::TYPE_PRE_CHECKOUT_QUERY,
                GetUpdatesMethod::TYPE_SHIPPING_QUERY,
            ],
        ]));
    }
}
