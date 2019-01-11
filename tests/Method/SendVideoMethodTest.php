<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\BotApiComplete;
use TgBotApi\BotApiBase\Method\Interfaces\HasParseModeVariableInterface;
use TgBotApi\BotApiBase\Method\SendVideoMethod;
use TgBotApi\BotApiBase\Tests\Method\Traits\InlineKeyboardMarkupTrait;
use TgBotApi\BotApiBase\Type\InputFileType;

class SendVideoMethodTest extends MethodTestCase
{
    use InlineKeyboardMarkupTrait;

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode()
    {
        $this->getApi()->sendVideo($this->getMethod());
        $this->getApi()->send($this->getMethod());
    }

    /**
     * @return BotApiComplete
     */
    private function getApi(): BotApiComplete
    {
        return $this->getBotWithFiles(
            'sendVideo',
            [
                'chat_id' => 'chat_id',
                'video' => '',
                'duration' => 100,
                'width' => 100,
                'height' => 100,
                'thumb' => '',
                'support_streaming' => true,
                'caption' => 'caption',
                'parse_mode' => HasParseModeVariableInterface::PARSE_MODE_MARKDOWN,
                'disable_notification' => true,
                'reply_to_message_id' => 1,
                'reply_markup' => $this->buildInlineMarkupArray(),
            ],
            ['video' => true, 'thumb' => true],
            ['reply_markup']
        );
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     *
     * @return SendVideoMethod
     */
    private function getMethod(): SendVideoMethod
    {
        return SendVideoMethod::create(
            'chat_id',
            InputFileType::create('/dev/null'),
            [
                'duration' => 100,
                'width' => 100,
                'height' => 100,
                'thumb' => InputFileType::create('/dev/null'),
                'caption' => 'caption',
                'supportStreaming' => true,
                'parseMode' => HasParseModeVariableInterface::PARSE_MODE_MARKDOWN,
                'disableNotification' => true,
                'replyToMessageId' => 1,
                'replyMarkup' => $this->buildInlineMarkupObject(),
            ]
        );
    }
}
