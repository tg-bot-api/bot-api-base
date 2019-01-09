<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\SetGameScoreMethod;

class SetGameScoreMethodTest extends MethodTestCase
{
    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode()
    {
        $botApi = $this->getBot(
            'setGameScore',
            [
                'chat_id' => 1,
                'user_id' => 1,
                'score' => 100,
                'message_id' => 1,
                'force' => true,
                'disable_edit_message' => true,
            ],
            true
        );

        $botApi->setGameScore(SetGameScoreMethod::create(
            1,
            100,
            1,
            1,
            [
                'force' => true,
                'disableEditMessage' => true,
            ]
        ));
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncodeInline()
    {
        $botApi = $this->getBot(
            'setGameScore',
            [
                'user_id' => 1,
                'score' => 100,
                'inline_message_id' => 'id',
                'force' => true,
                'disable_edit_message' => true,
            ],
            true
        );

        $botApi->setGameScore(SetGameScoreMethod::createInline(
            1,
            100,
            'id',
            [
                'force' => true,
                'disableEditMessage' => true,
            ]
        ));
    }
}
