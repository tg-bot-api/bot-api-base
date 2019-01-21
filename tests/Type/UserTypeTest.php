<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Type;

use TgBotApi\BotApiBase\Type\UserType;

class UserTypeTest extends TypeTestCase
{
    /**
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode()
    {
        $result = [
            'id' => 1,
            'is_bot' => true,
            'first_name' => 'test',
            'last_name' => 'test',
            'username' => 'test',
            'language_code' => 'en',
        ];
        $botApi = $this->getBot($result);

        $type = $botApi->call($this->getMethod(), UserType::class);

        $this->assertEquals($type->id, $result['id']);
        $this->assertEquals($type->isBot, $result['is_bot']);
        $this->assertEquals($type->firstName, $result['first_name']);
        $this->assertEquals($type->lastName, $result['last_name']);
        $this->assertEquals($type->username, $result['username']);
        $this->assertEquals($type->languageCode, $result['language_code']);
    }
}
