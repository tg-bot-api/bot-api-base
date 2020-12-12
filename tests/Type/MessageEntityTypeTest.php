<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Type;

use TgBotApi\BotApiBase\Type\MessageEntityType;
use TgBotApi\BotApiBase\Type\UserType;

class MessageEntityTypeTest extends TypeBaseTestCase
{
    public function testCreate(): void
    {
        $type = MessageEntityType::create(MessageEntityType::TYPE_PRE, 1, 5, [
            'url' => 'url',
            'user' => new UserType(),
            'language' => 'json',
        ]);

        static::assertEquals('pre', $type->type);
        static::assertEquals(1, $type->offset);
        static::assertEquals(5, $type->length);
        static::assertEquals('url', $type->url);
        static::assertEquals(new UserType(), $type->user);
        static::assertEquals('json', $type->language);
    }

    public function provideData(): array
    {
        return [
            'all fields case' => [
                MessageEntityType::class,
                static::getResource('MessageEntityTypeTest/all-fields'),
                MessageEntityType::create(MessageEntityType::TYPE_PRE, 1, 5, [
                    'url' => 'url',
                    'user' => new UserType(),
                    'language' => 'json',
                ]),
            ],
        ];
    }
}
