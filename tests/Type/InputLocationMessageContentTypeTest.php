<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Type;

use TgBotApi\BotApiBase\Type\InputMessageContent\InputLocationMessageContentType;

class InputLocationMessageContentTypeTest extends TypeBaseTestCase
{
    public function testCreate(): void
    {
        $type = InputLocationMessageContentType::create(1.3, 1.3, [
            'horizontalAccuracy' => 200.5,
            'livePeriod' => 20,
            'heading' => 30,
            'proximityAlertRadius' => 40,
        ]);

        static::assertEquals(200.5, $type->horizontalAccuracy);
        static::assertEquals(20, $type->livePeriod);
        static::assertEquals(30, $type->heading);
        static::assertEquals(40, $type->proximityAlertRadius);
        static::assertEquals(1.3, $type->latitude);
        static::assertEquals(1.3, $type->longitude);
    }

    public function provideData(): array
    {
        return [
            'default case' => [
                InputLocationMessageContentType::class,
                static::getResource('InputLocationContentType/default'),
                static::getType(),
            ],
            'with redundant variables' => [
                InputLocationMessageContentType::class,
                static::getResource('InputLocationContentType/default_with_extended_keys'),
                static::getType(),
            ],
        ];
    }

    private static function getType(): InputLocationMessageContentType
    {
        $type = new InputLocationMessageContentType();

        $type->latitude = 1.3;
        $type->longitude = 1.3;
        $type->horizontalAccuracy = 200.5;
        $type->livePeriod = 20;
        $type->heading = 30;
        $type->proximityAlertRadius = 40;

        return $type;
    }
}
