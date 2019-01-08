<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

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
        $botApi = $this->getBotWithFiles(
            'sendVideoNote',
            [
                'chat_id' => 'chat_id',
                'video_note' => '',
                'duration' => 100,
                'thumb' => '',
                'disable_notification' => true,
                'reply_to_message_id' => 1,
                'reply_markup' => $this->buildInlineMarkupArray(),
            ],
            ['video_note' => true, 'thumb' => true],
            ['reply_markup']
        );

        $botApi->sendVideoNote(SendVideoNoteMethod::create(
            'chat_id',
            InputFileType::create(new \SplFileInfo('/dev/null')),
            [
                'duration' => 100,
                'thumb' => InputFileType::create(new \SplFileInfo('/dev/null')),
                'disableNotification' => true,
                'replyToMessageId' => 1,
                'replyMarkup' => $this->buildInlineMarkupObject(),
            ]
        ));
    }
}
