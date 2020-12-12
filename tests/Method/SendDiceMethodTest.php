<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\SendDiceMethod;
use TgBotApi\BotApiBase\Tests\Method\Traits\InlineKeyboardMarkupTrait;
use TgBotApi\BotApiBase\Type\InlineKeyboardMarkupType;

class SendDiceMethodTest extends MethodTestCase
{
    use InlineKeyboardMarkupTrait;

    public function testCreate(): void
    {
        $datasets = $this->dataProvider();

        foreach ($datasets as $params) {
            $this->assertMethod(...$params);
        }
    }

    /**
     * @dataProvider dataProvider
     *
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode(SendDiceMethod $method, array $data): void
    {
        $bot = $this->getBot('sendDice', $data, [], ['reply_markup']);

        $bot->sendDice($method);
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     *
     * @return array[]
     */
    public function dataProvider(): array
    {
        return [
            [
                SendDiceMethod::createWithDice(
                    'chat_id',
                    [
                        'disableNotification' => true,
                        'replyToMessageId' => 1,
                        'replyMarkup' => static::buildInlineMarkupObject(),
                        'allowSendingWithoutReply' => true,
                    ]
                ),
                static::getApiRequest(SendDiceMethod::EMOJI_DICE),
            ],
            [
                SendDiceMethod::createWithDarts(
                    'chat_id',
                    [
                        'disableNotification' => true,
                        'replyToMessageId' => 1,
                        'replyMarkup' => static::buildInlineMarkupObject(),
                        'allowSendingWithoutReply' => true,
                    ]
                ),
                static::getApiRequest(SendDiceMethod::EMOJI_DARTS),
            ],
            [
                SendDiceMethod::createWithBasketball(
                    'chat_id',
                    [
                        'disableNotification' => true,
                        'replyToMessageId' => 1,
                        'replyMarkup' => static::buildInlineMarkupObject(),
                        'allowSendingWithoutReply' => true,
                    ]
                ),
                static::getApiRequest(SendDiceMethod::EMOJI_BASKETBALL),
            ],
            [
                SendDiceMethod::createWithFootBall(
                    'chat_id',
                    [
                        'disableNotification' => true,
                        'replyToMessageId' => 1,
                        'replyMarkup' => static::buildInlineMarkupObject(),
                        'allowSendingWithoutReply' => true,
                    ]
                ),
                static::getApiRequest(SendDiceMethod::EMOJI_FOOTBALL),
            ],
            [
                SendDiceMethod::createWithSlotMachine(
                    'chat_id',
                    [
                        'disableNotification' => true,
                        'replyToMessageId' => 1,
                        'replyMarkup' => static::buildInlineMarkupObject(),
                        'allowSendingWithoutReply' => true,
                    ]
                ),
                static::getApiRequest(SendDiceMethod::EMOJI_SLOT_MACHINE),
            ],
        ];
    }

    private static function getApiRequest(string $emoji): array
    {
        return [
            'chat_id' => 'chat_id',
            'disable_notification' => true,
            'reply_to_message_id' => 1,
            'emoji' => $emoji,
            'allow_sending_without_reply' => true,
            'reply_markup' => static::buildInlineMarkupArray(),
        ];
    }

    private function assertMethod(SendDiceMethod $method, $data): void
    {
        static::assertEquals($data['allow_sending_without_reply'], $method->allowSendingWithoutReply);
        static::assertInstanceOf(InlineKeyboardMarkupType::class, $method->replyMarkup);
        static::assertEquals('chat_id', $method->chatId);
        static::assertEquals(1, $method->replyToMessageId);
        static::assertEquals($data['emoji'], $method->emoji);
    }
}
