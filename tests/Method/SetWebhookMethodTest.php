<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\SetWebhookMethod;
use TgBotApi\BotApiBase\Type\InputFileType;

class SetWebhookMethodTest extends MethodTestCase
{
    public function testCreate(): void
    {
        $method = SetWebhookMethod::create(
            'https://url',
            [
                'certificate' => InputFileType::create('/dev/null'),
                'maxConnections' => 100,
                'ipAddress' => '0.0.0.0',
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
                'dropPendingUpdates' => true,
            ]
        );

        static::assertEquals('https://url', $method->url);
        static::assertEquals(InputFileType::create('/dev/null'), $method->certificate);
        static::assertEquals(100, $method->maxConnections);
        static::assertEquals('0.0.0.0', $method->ipAddress);
        static::assertEqualsCanonicalizing([
            'message',
            'edited_message',
            'channel_post',
            'edited_channel_post',
            'inline_query',
            'chosen_inline_result',
            'callback_query',
            'shipping_query',
            'pre_checkout_query',
        ], $method->allowedUpdates);
        static::assertTrue($method->dropPendingUpdates);
    }

    /**
     * @dataProvider provideData
     *
     * @param $expectedBody
     *
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode(SetWebhookMethod $method, $expectedBody): void
    {
        $botApi = $this->getBotWithFiles(
            'setWebhook',
            $expectedBody,
            ['certificate' => true],
            [],
            true
        );

        $botApi->setWebhook($method);
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     *
     * @return array[]
     */
    public function provideData()
    {
        return [
            'default case' => [
                SetWebhookMethod::create(
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
                ),
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
            ],
            'drop updates case' => [
                SetWebhookMethod::create(
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
                        'dropPendingUpdates' => true,
                    ]
                ),
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
                    'drop_pending_updates' => true,
                ],
            ],
            'with local ip case' => [
                SetWebhookMethod::create(
                    'https://url',
                    [
                        'certificate' => InputFileType::create('/dev/null'),
                        'maxConnections' => 100,
                        'ipAddress' => '0.0.0.0',
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
                ),
                [
                    'url' => 'https://url',
                    'certificate' => '',
                    'max_connections' => 100,
                    'ip_address' => '0.0.0.0',
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
            ],
        ];
    }
}
