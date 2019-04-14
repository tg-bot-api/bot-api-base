<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\BotApiComplete;
use TgBotApi\BotApiBase\Method\SendPollMethod;
use TgBotApi\BotApiBase\Type\InlineKeyboardMarkupType;

/**
 * Class SendMessageMethodTest.
 */
class SendPollMethodTest extends MethodTestCase
{
    public function testEncode()
    {
        $this->getApi()->sendPoll($this->getMethod());
    }

    /**
     * @return BotApiComplete
     */
    private function getApi(): BotApiComplete
    {
        return $this->getBot('sendPoll', [
            'chat_id' => 'chat_id',
            'question' => 'poll_question',
            'options' => ['q1', 'q2'],
            'disable_notification' => true,
            'reply_to_message_id' => 1,
            'reply_markup' => '{"inline_keyboard":[]}',
        ]);
    }

    private function getMethod(): SendPollMethod
    {
        return SendPollMethod::create(
            'chat_id',
            'poll_question',
            ['q1', 'q2'],
            [
                'replyMarkup' => InlineKeyboardMarkupType::create([]),
                'disableNotification' => true,
                'replyToMessageId' => 1,
            ]
        );
    }
}
