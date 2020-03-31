<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\BotApiComplete;
use TgBotApi\BotApiBase\Method\SetStickerSetThumbMethod;
use TgBotApi\BotApiBase\Tests\Method\Traits\InlineKeyboardMarkupTrait;
use TgBotApi\BotApiBase\Type\InputFileType;

class SetStickerSetThumbMethodTest extends MethodTestCase
{
    use InlineKeyboardMarkupTrait;

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode()
    {
        $this->getApi()->setStickerSetThumb($this->getMethod());
        $this->getApi()->set($this->getMethod());
    }

    private function getApi(): BotApiComplete
    {
        return $this->getBotWithFiles(
            'setStickerSetThumb',
            [
                'name' => 'stickerSetName',
                'user_id' => 1,

                'thumb' => '',
            ],
            ['thumb' => true],
            [],
            true
        );
    }

    private function getMethod(): SetStickerSetThumbMethod
    {
        return SetStickerSetThumbMethod::create(
            'stickerSetName',
            1,
            InputFileType::create('/dev/null')
        );
    }
}
