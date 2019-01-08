<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\Interfaces\HasParseModeVariableInterface;
use TgBotApi\BotApiBase\Method\SendAnimationMethod;
use TgBotApi\BotApiBase\Tests\Method\Traits\InlineKeyboardMarkupTrait;
use TgBotApi\BotApiBase\Type\InputFileType;

class SendAnimationMethodTest extends MethodTestCase
{
    use InlineKeyboardMarkupTrait;

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode()
    {
        $botApi = $this->getBotWithFiles(
            'sendAnimation',
            [
                'chat_id' => 'chat_id',
                'animation' => '',
                'duration' => 100,
                'width' => 100,
                'height' => 100,
                'thumb' => '',
                'caption' => 'caption',
                'parse_mode' => HasParseModeVariableInterface::PARSE_MODE_MARKDOWN,
                'disable_notification' => true,
                'reply_to_message_id' => 1,
                'reply_markup' => $this->buildInlineMarkupArray(),
            ],
            ['animation' => true, 'thumb' => true],
            ['reply_markup']
        );

        $botApi->sendAnimation(SendAnimationMethod::create(
            'chat_id',
            InputFileType::create(new \SplFileInfo('/dev/null')),
            [
                'duration' => 100,
                'width' => 100,
                'height' => 100,
                'thumb' => InputFileType::create(new \SplFileInfo('/dev/null')),
                'caption' => 'caption',
                'parseMode' => HasParseModeVariableInterface::PARSE_MODE_MARKDOWN,
                'disableNotification' => true,
                'replyToMessageId' => 1,
                'replyMarkup' => $this->buildInlineMarkupObject(),
            ]
        ));
    }
}
