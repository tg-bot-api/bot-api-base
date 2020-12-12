<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\BotApiComplete;
use TgBotApi\BotApiBase\Method\Interfaces\HasParseModeVariableInterface;
use TgBotApi\BotApiBase\Method\SendVoiceMethod;
use TgBotApi\BotApiBase\Tests\Method\Traits\InlineKeyboardMarkupTrait;
use TgBotApi\BotApiBase\Type\InputFileType;
use TgBotApi\BotApiBase\Type\MessageEntityType;

/**
 * Class SendVoiceMethodTest.
 */
class SendVoiceMethodTest extends MethodTestCase
{
    use InlineKeyboardMarkupTrait;

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode()
    {
        $this->getApi()->sendVoice($this->getMethod());
        $this->getApi()->send($this->getMethod());
    }

    private function getApi(): BotApiComplete
    {
        return $this->getBotWithFiles(
            'sendVoice',
            [
                'chat_id' => 'chat_id',
                'voice' => '',
                'duration' => 100,
                'caption' => 'caption',
                'caption_entities' => [['type' => 'pre', 'offset' => 0, 'length' => 1]],
                'parse_mode' => HasParseModeVariableInterface::PARSE_MODE_MARKDOWN,
                'disable_notification' => true,
                'reply_to_message_id' => 1,
                'reply_markup' => static::buildInlineMarkupArray(),
                'allow_sending_without_reply' => true,
            ],
            ['voice' => true],
            ['reply_markup']
        );
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    private function getMethod(): SendVoiceMethod
    {
        return SendVoiceMethod::create(
            'chat_id',
            InputFileType::create('/dev/null'),
            [
                'duration' => 100,
                'caption' => 'caption',
                'captionEntities' => [MessageEntityType::create(MessageEntityType::TYPE_PRE, 0, 1)],
                'parseMode' => HasParseModeVariableInterface::PARSE_MODE_MARKDOWN,
                'disableNotification' => true,
                'replyToMessageId' => 1,
                'replyMarkup' => static::buildInlineMarkupObject(),
                'allowSendingWithoutReply' => true,
            ]
        );
    }
}
