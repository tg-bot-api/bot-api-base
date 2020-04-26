<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\BotApiComplete;
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
    public function testEncode(BotApiComplete $bot, SendDiceMethod $method): void
    {
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
                $this->getApi(SendDiceMethod::EMOJI_DICE),
                SendDiceMethod::createWithDice(
                    'chat_id',
                    [
                        'disableNotification' => true,
                        'replyToMessageId' => 1,
                        'replyMarkup' => $this->buildInlineMarkupObject(),
                    ]
                ),
            ],
            [
                $this->getApi(SendDiceMethod::EMOJI_DARTS),
                SendDiceMethod::createWithDarts(
                    'chat_id',
                    [
                        'disableNotification' => true,
                        'replyToMessageId' => 1,
                        'replyMarkup' => $this->buildInlineMarkupObject(),
                    ]
                ),
            ],
        ];
    }

    private function getApi(string $emoji): BotApiComplete
    {
        return $this->getBot('sendDice', [
            'chat_id' => 'chat_id',
            'disable_notification' => true,
            'reply_to_message_id' => 1,
            'emoji' => $emoji,
            'reply_markup' => $this->buildInlineMarkupArray(),
        ], [], ['reply_markup']);
    }
}
