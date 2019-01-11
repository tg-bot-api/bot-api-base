<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\UploadStickerFileMethod;
use TgBotApi\BotApiBase\Tests\Method\Traits\InlineKeyboardMarkupTrait;
use TgBotApi\BotApiBase\Type\InputFileType;

/**
 * Class SendStickerMethodTest.
 */
class UploadStickerFileMethodTest extends MethodTestCase
{
    use InlineKeyboardMarkupTrait;

    public function testEncode()
    {
        $botApi = $this->getBotWithFiles('uploadStickerFile', [
            'user_id' => 1,
            'png_sticker' => '',
        ], ['png_sticker' => true], [], true);

        $botApi->uploadStickerFile(UploadStickerFileMethod::create(
            1,
            InputFileType::create('/dev/null')
        ));
    }
}
