<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\GetUserProfilePhotosMethod;

class GetUserProfilePhotosMethodTest extends MethodTestCase
{
    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode()
    {
        $botApi = $this->getBot(
            'getUserProfilePhotos',
            ['user_id' => 1, 'offset' => 0, 'limit' => 100],
            ['total_count' => 1, 'photos' => []]
        );

        $botApi->getUserProfilePhotos(GetUserProfilePhotosMethod::create(1, ['offset' => 0, 'limit' => 100]));
    }
}
