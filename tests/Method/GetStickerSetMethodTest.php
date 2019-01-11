<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\GetStickerSetMethod;

class GetStickerSetMethodTest extends MethodTestCase
{
    /**
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode()
    {
        $botApi = $this->getBot('getStickerSet', ['name' => 'sicker_set_name']);

        $botApi->getStickerSet(GetStickerSetMethod::create('sicker_set_name'));
    }
}
