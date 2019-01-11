<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\GetFileMethod;

class GetFileMethodTest extends MethodTestCase
{
    /**
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode()
    {
        $botApi = $this->getBot('getFile', ['file_id' => 'file_id']);

        $botApi->getFile(GetFileMethod::create('file_id'));
    }
}
