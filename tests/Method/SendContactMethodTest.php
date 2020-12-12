<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\BotApiComplete;
use TgBotApi\BotApiBase\Method\SendContactMethod;
use TgBotApi\BotApiBase\Tests\Method\Traits\InlineKeyboardMarkupTrait;

class SendContactMethodTest extends MethodTestCase
{
    use InlineKeyboardMarkupTrait;

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode()
    {
        $this->getApi()->sendContact($this->getMethod());
        $this->getApi()->send($this->getMethod());
    }

    private function getApi(): BotApiComplete
    {
        return $this->getBot('sendContact', [
            'chat_id' => 'chat_id',
            'phone_number' => '+00000000000',
            'first_name' => 'first_name',
            'last_name' => 'last_name',
            'vcard' => 'vcard_data',
            'disable_notification' => true,
            'reply_to_message_id' => 1,
            'allow_sending_without_reply' => true,
            'reply_markup' => $this->buildInlineMarkupArray(),
        ], [], ['reply_markup']);
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    private function getMethod(): SendContactMethod
    {
        return SendContactMethod::create(
            'chat_id',
            '+00000000000',
            'first_name',
            [
                'lastName' => 'last_name',
                'vcard' => 'vcard_data',
                'disableNotification' => true,
                'replyToMessageId' => 1,
                'allowSendingWithoutReply' => true,
                'replyMarkup' => $this->buildInlineMarkupObject(),
            ]
        );
    }
}
