<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\BotApiComplete;
use TgBotApi\BotApiBase\Method\SendVideoNoteMethod;
use TgBotApi\BotApiBase\Tests\Method\Traits\InlineKeyboardMarkupTrait;
use TgBotApi\BotApiBase\Type\InputFileType;

class SendVideoNoteMethodTest extends MethodTestCase
{
    use InlineKeyboardMarkupTrait;

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode()
    {
        $this->getApi()->sendVideoNote($this->getMethod());
        $this->getApi()->send($this->getMethod());
    }

    private function getApi(): BotApiComplete
    {
        return $this->getBotWithFiles(
            'sendVideoNote',
            [
                'chat_id' => 'chat_id',
                'video_note' => '',
                'duration' => 100,
                'thumb' => '',
                'disable_notification' => true,
                'reply_to_message_id' => 1,
                'reply_markup' => static::buildInlineMarkupArray(),
                'allow_sending_without_reply' => true,
            ],
            ['video_note' => true, 'thumb' => true],
            ['reply_markup']
        );
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    private function getMethod(): SendVideoNoteMethod
    {
        return SendVideoNoteMethod::create(
            'chat_id',
            InputFileType::create('/dev/null'),
            [
                'duration' => 100,
                'thumb' => InputFileType::create('/dev/null'),
                'disableNotification' => true,
                'replyToMessageId' => 1,
                'replyMarkup' => static::buildInlineMarkupObject(),
                'allowSendingWithoutReply' => true,
            ]
        );
    }
}
