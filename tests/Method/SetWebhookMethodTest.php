<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\SetWebhookMethod;
use TgBotApi\BotApiBase\Type\InputFileType;

class SetWebhookMethodTest extends MethodTestCase
{
    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode()
    {
        $botApi = $this->getBotWithFiles(
            'setWebhook',
            [
                'url' => 'https://url',
                'certificate' => '',
                'max_connections' => 100,
                'allowed_updates' => [
                    SetWebhookMethod::TYPE_SHIPPING_QUERY,
                    SetWebhookMethod::TYPE_PRE_CHECKOUT_QUERY,
                    SetWebhookMethod::TYPE_MESSAGE,
                    SetWebhookMethod::TYPE_INLINE_QUERY,
                    SetWebhookMethod::TYPE_EDITED_MESSAGE,
                    SetWebhookMethod::TYPE_EDITED_CHANNEL_POST,
                    SetWebhookMethod::TYPE_CHOSEN_INLINE_RESULT,
                    SetWebhookMethod::TYPE_CHANNEL_POST,
                    SetWebhookMethod::TYPE_CALLBACK_QUERY,
                ],
            ],
            ['certificate' => true],
            [],
            true
        );

        $botApi->setWebhook(SetWebhookMethod::create(
            'https://url',
            [
                'certificate' => InputFileType::create('/dev/null'),
                'maxConnections' => 100,
                'allowedUpdates' => [
                    SetWebhookMethod::TYPE_SHIPPING_QUERY,
                    SetWebhookMethod::TYPE_PRE_CHECKOUT_QUERY,
                    SetWebhookMethod::TYPE_MESSAGE,
                    SetWebhookMethod::TYPE_INLINE_QUERY,
                    SetWebhookMethod::TYPE_EDITED_MESSAGE,
                    SetWebhookMethod::TYPE_EDITED_CHANNEL_POST,
                    SetWebhookMethod::TYPE_CHOSEN_INLINE_RESULT,
                    SetWebhookMethod::TYPE_CHANNEL_POST,
                    SetWebhookMethod::TYPE_CALLBACK_QUERY,
                ],
            ]
        ));
    }
}
