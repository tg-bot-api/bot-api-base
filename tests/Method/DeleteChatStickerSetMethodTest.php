<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\DeleteChatStickerSetMethod;

class DeleteChatStickerSetMethodTest extends MethodTestCase
{
    /**
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode()
    {
        $botApi = $this->getBot('deleteChatStickerSet', ['chat_id' => 'chat_id'], true);

        $botApi->deleteChatStickerSet(DeleteChatStickerSetMethod::create('chat_id'));
    }
}
