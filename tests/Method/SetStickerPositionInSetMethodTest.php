<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\SetStickerPositionInSetMethod;

class SetStickerPositionInSetMethodTest extends MethodTestCase
{
    /**
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode()
    {
        $botApi = $this->getBot(
            'setStickerPositionInSet',
            ['sticker' => 'sticker', 'position' => 'position'],
            true
        );

        $botApi->setStickerPositionInSet(SetStickerPositionInSetMethod::create('sticker', 'position'));
    }
}
