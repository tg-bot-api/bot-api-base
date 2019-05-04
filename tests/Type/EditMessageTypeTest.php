<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Type;

use TgBotApi\BotApiBase\Exception\ResponseException;
use TgBotApi\BotApiBase\Type\ChatType;
use TgBotApi\BotApiBase\Type\MessageType;
use TgBotApi\BotApiBase\Type\UserType;

class EditMessageTypeTest extends TypeTestCase
{
    /**
     * @throws ResponseException
     */
    public function testEncode()
    {
        $result = [
            'message_id' => 0,
            'from' => [
                    'id' => 0,
                    'is_bot' => true,
                    'first_name' => 'first_name',
                    'username' => 'username',
                ],
            'chat' => [
                    'id' => 0,
                    'first_name' => 'first_name',
                    'username' => 'username',
                    'type' => 'private',
                ],
            'date' => 1556950485,
            'edit_date' => 1556950491,
            'text' => 'text',
        ];

        $botApi = $this->getBot($result);

        /** @var MessageType $type */
        $type = $botApi->call($this->getMethod(), MessageType::class . '|bool');

        $this->assertInstanceOf(MessageType::class, $type);
        $this->assertEquals('text', $type->text);
        $this->assertEquals(0, $type->messageId);
        $this->assertInstanceOf(UserType::class, $type->from);
        $this->assertInstanceOf(ChatType::class, $type->chat);
        $this->assertInstanceOf(\DateTimeImmutable::class, $type->date);
        $this->assertInstanceOf(\DateTimeImmutable::class, $type->editDate);
    }

    /**
     * @throws ResponseException
     */
    public function testEncodeBool()
    {
        $result = true;

        $botApi = $this->getBot($result);

        /** @var MessageType $type */
        $type = $botApi->call($this->getMethod(), MessageType::class . '|bool');

        $this->assertIsBool($type);
    }
}
