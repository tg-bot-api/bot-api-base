<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\GetGameHighScoresMethod;

class GetGameHighScoresMethodTest extends MethodTestCase
{
    /**
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode()
    {
        $botApi = $this->getBot('getGameHighScores', ['user_id' => 1, 'chat_id' => 1, 'message_id' => 1]);

        $botApi->getGameHighScores(GetGameHighScoresMethod::create(1, 1, 1));
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncodeInline()
    {
        $botApi = $this->getBot('getGameHighScores', ['user_id' => 1, 'inline_message_id' => 'message_id']);

        $botApi->getGameHighScores(GetGameHighScoresMethod::createInline(1, 'message_id'));
    }
}
