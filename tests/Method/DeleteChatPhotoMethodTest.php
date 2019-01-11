<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\DeleteChatPhotoMethod;

class DeleteChatPhotoMethodTest extends MethodTestCase
{
    /**
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode()
    {
        $botApi = $this->getBot('deleteChatPhoto', ['chat_id' => 'chat_id'], true);

        $botApi->deleteChatPhoto(DeleteChatPhotoMethod::create('chat_id'));
    }
}
