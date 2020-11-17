<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\BotApiComplete;
use TgBotApi\BotApiBase\Method\Interfaces\HasParseModeVariableInterface;
use TgBotApi\BotApiBase\Method\SendMessageMethod;
use TgBotApi\BotApiBase\Type\InlineKeyboardMarkupType;
use TgBotApi\BotApiBase\Type\MessageEntityType;

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

    private function getApi(): BotApiComplete
    {
        return $this->getBot('sendMessage', [
            'text' => 'test',
            'parse_mode' => 'HTML',
            'chat_id' => '1',
            'disable_web_page_preview' => true,
            'disable_notification' => true,
            'entities' => [['type' => 'pre', 'offset' => 0, 'length' => 1]],
            'reply_to_message_id' => 1,
            'allow_sending_without_reply' => true,
            'reply_markup' => '{"inline_keyboard":[]}',
        ]);
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    private function getMethod(): SendMessageMethod
    {
        return SendMessageMethod::create('1', 'test', [
            'parseMode' => HasParseModeVariableInterface::PARSE_MODE_HTML,
            'disableWebPagePreview' => true,
            'disableNotification' => true,
            'replyToMessageId' => 1,
            'replyMarkup' => InlineKeyboardMarkupType::create([]),
            'allowSendingWithoutReply' => true,
            'entities' => [MessageEntityType::create(MessageEntityType::TYPE_PRE, 0, 1)],
        ]);
    }
}
