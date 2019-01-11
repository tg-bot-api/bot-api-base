<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\BotApiComplete;
use TgBotApi\BotApiBase\Method\Interfaces\HasParseModeVariableInterface;
use TgBotApi\BotApiBase\Method\SendMessageMethod;
use TgBotApi\BotApiBase\Type\InlineKeyboardMarkupType;

/**
 * Class SendMessageMethodTest.
 */
class SendMessageMethodTest extends MethodTestCase
{
    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode()
    {
        $this->getApi()->sendMessage($this->getMethod());
        $this->getApi()->send($this->getMethod());
    }

    /**
     * @return BotApiComplete
     */
    private function getApi(): BotApiComplete
    {
        return $this->getBot('sendMessage', [
            'text' => 'test',
            'parse_mode' => 'HTML',
            'chat_id' => '1',
            'disable_web_page_preview' => true,
            'disable_notification' => true,
            'reply_to_message_id' => 1,
            'reply_markup' => '{"inline_keyboard":[]}',
        ]);
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     *
     * @return SendMessageMethod
     */
    private function getMethod(): SendMessageMethod
    {
        return SendMessageMethod::create('1', 'test', [
            'parseMode' => HasParseModeVariableInterface::PARSE_MODE_HTML,
            'disableWebPagePreview' => true,
            'disableNotification' => true,
            'replyToMessageId' => 1,
            'replyMarkup' => InlineKeyboardMarkupType::create([]),
        ]);
    }
}
