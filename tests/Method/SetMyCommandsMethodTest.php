<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\SetMyCommandsMethod;
use TgBotApi\BotApiBase\Type\BotCommandType;

class SetMyCommandsMethodTest extends MethodTestCase
{
    /**
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode()
    {
        $botApi = $this->getBot(
            'setMyCommands',
            [
                'commands' => [
                   [
                       'command' => '$command',
                       'description' => '$description',
                   ],
                    [
                        'command' => 'start',
                        'description' => 'start command description',
                    ],
                ],
            ],
            true,
            ['commands']
        );

        $botApi->setMyCommands(SetMyCommandsMethod::create([
            BotCommandType::create('$command', '$description'),
            BotCommandType::create('start', 'start command description'),
        ]));
    }
}
