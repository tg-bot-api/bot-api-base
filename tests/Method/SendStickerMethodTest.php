<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\BotApiComplete;
use TgBotApi\BotApiBase\Method\SendStickerMethod;
use TgBotApi\BotApiBase\Tests\Method\Traits\InlineKeyboardMarkupTrait;
use TgBotApi\BotApiBase\Type\InputFileType;

/**
 * Class SendStickerMethodTest.
 */
class SendStickerMethodTest extends MethodTestCase
{
    use InlineKeyboardMarkupTrait;

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode()
    {
        $this->getApi()->sendSticker($this->getMethod());
        $this->getApi()->send($this->getMethod());

        $this->getApiWithStringFileId()->sendSticker($this->getMethodWithStringFileId());
        $this->getApiWithStringFileId()->send($this->getMethodWithStringFileId());
    }

    private function getApi(): BotApiComplete
    {
        return $this->getBotWithFiles(
            'sendSticker',
            [
                'chat_id' => 'chat_id',
                'sticker' => '',
                'disable_notification' => true,
                'reply_to_message_id' => 1,
                'reply_markup' => static::buildInlineMarkupArray(),
                'allow_sending_without_reply' => true,
            ],
            ['sticker' => true],
            ['reply_markup']
        );
    }

    private function getApiWithStringFileId(): BotApiComplete
    {
        return $this->getBot(
            'sendSticker',
            [
                'chat_id' => 'chat_id',
                'sticker' => 'file_id',
                'disable_notification' => true,
                'reply_to_message_id' => 1,
                'reply_markup' => static::buildInlineMarkupArray(),
            ],
            [],
            ['reply_markup']
        );
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    private function getMethod(): SendStickerMethod
    {
        return SendStickerMethod::create(
            'chat_id',
            InputFileType::create('/dev/null'),
            [
                'disableNotification' => true,
                'replyToMessageId' => 1,
                'replyMarkup' => static::buildInlineMarkupObject(),
                'allowSendingWithoutReply' => true,
            ]
        );
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    private function getMethodWithStringFileId(): SendStickerMethod
    {
        return SendStickerMethod::create(
            'chat_id',
            'file_id',
            [
                'disableNotification' => true,
                'replyToMessageId' => 1,
                'replyMarkup' => static::buildInlineMarkupObject(),
            ]
        );
    }
}
