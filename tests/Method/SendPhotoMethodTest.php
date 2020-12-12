<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\BotApiComplete;
use TgBotApi\BotApiBase\Method\Interfaces\HasParseModeVariableInterface;
use TgBotApi\BotApiBase\Method\SendPhotoMethod;
use TgBotApi\BotApiBase\Tests\Method\Traits\InlineKeyboardMarkupTrait;
use TgBotApi\BotApiBase\Type\InputFileType;
use TgBotApi\BotApiBase\Type\MessageEntityType;

class SendPhotoMethodTest extends MethodTestCase
{
    use InlineKeyboardMarkupTrait;

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode(): void
    {
        $this->getApi()->sendPhoto($this->getMethod());
        $this->getApi()->send($this->getMethod());
    }

    private function getApi(): BotApiComplete
    {
        return $this->getBotWithFiles(
            'sendPhoto',
            [
                'chat_id' => 'chat_id',
                'photo' => 'photo',
                'caption' => 'caption',
                'caption_entities' => [['type' => 'pre', 'offset' => 0, 'length' => 1]],
                'parse_mode' => HasParseModeVariableInterface::PARSE_MODE_MARKDOWN,
                'disable_notification' => true,
                'reply_to_message_id' => 1,
                'reply_markup' => static::buildInlineMarkupArray(),
                'allow_sending_without_reply' => true,
            ],
            ['photo' => true],
            ['reply_markup']
        );
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    private function getMethod(): SendPhotoMethod
    {
        return SendPhotoMethod::create(
            'chat_id',
            InputFileType::create('/dev/null'),
            [
                'caption' => 'caption',
                'parseMode' => HasParseModeVariableInterface::PARSE_MODE_MARKDOWN,
                'captionEntities' => [MessageEntityType::create(MessageEntityType::TYPE_PRE, 0, 1)],
                'disableNotification' => true,
                'replyToMessageId' => 1,
                'replyMarkup' => static::buildInlineMarkupObject(),
                'allowSendingWithoutReply' => true,
            ]
        );
    }
}
