<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\DeleteStickerFromSetMethod;

class DeleteStickerFromSetMethodTest extends MethodTestCase
{
    /**
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode()
    {
        $botApi = $this->getBot('deleteStickerFromSet', ['sticker' => 'file_id'], true);

        $botApi->deleteStickerFromSet(DeleteStickerFromSetMethod::create('file_id'));
    }
}
