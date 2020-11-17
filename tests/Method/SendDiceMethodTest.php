<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\SendDiceMethod;
use TgBotApi\BotApiBase\Tests\Method\Traits\InlineKeyboardMarkupTrait;

class SendDiceMethodTest extends MethodTestCase
{
    use InlineKeyboardMarkupTrait;

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
                $this->getApiRequest(SendDiceMethod::EMOJI_DICE),
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
                $this->getApiRequest(SendDiceMethod::EMOJI_DARTS),
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
                $this->getApiRequest(SendDiceMethod::EMOJI_BASKETBALL),
            ],
        ];
    }

    private function getApiRequest(string $emoji): array
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
}
