<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\SetChatPhotoMethod;
use TgBotApi\BotApiBase\Type\InputFileType;

class SetChatPhotoMethodTest extends MethodTestCase
{
    /**
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode()
    {
        $botApi = $this->getBotWithFiles(
            'setChatPhoto',
            ['chat_id' => 'chat_id', 'photo' => ''],
            ['photo' => true],
            [],
            true
        );

        $botApi->setChatPhoto(SetChatPhotoMethod::create(
            'chat_id',
            InputFileType::create('/dev/null')
        ));
    }
}
