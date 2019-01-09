<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\SetChatStickerSetMethod;

class SetChatStickerSetMethodTest extends MethodTestCase
{
    /**
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     * @throws \TgBotApi\BotApiBase\Exception\NormalizationException
     */
    public function testEncode()
    {
        $botApi = $this->getBot(
            'setChatStickerSet',
            ['chat_id' => 'chat_id', 'sticker_set_name' => 'sticker_set_name'],
            true
        );

        $botApi->setChatStickerSet(SetChatStickerSetMethod::create('chat_id', 'sticker_set_name'));
    }
}
