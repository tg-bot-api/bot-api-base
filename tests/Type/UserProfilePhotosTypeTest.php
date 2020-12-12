<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Type;

use TgBotApi\BotApiBase\Type\PhotoSizeType;
use TgBotApi\BotApiBase\Type\UserProfilePhotosType;

class UserProfilePhotosTypeTest extends TypeTestCase
{
    public function testEncode()
    {
        $result = static::getResource('user-profile-photos');

        $type = $this->getType($result);

        $result = \json_decode($result, true)['result'];

        $this->assertEquals($type->totalCount, $result['total_count']);
        $this->assertEquals(\count($type->photos), 1);
        $this->assertEquals(\count($type->photos[0]), 3);

        foreach ($result['photos'][0] as $index => $size) {
            $this->assertInstanceOf(PhotoSizeType::class, $type->photos[0][$index]);
            $this->assertEquals($type->photos[0][$index]->fileId, $size['file_id']);
            $this->assertEquals($type->photos[0][$index]->fileUniqueId, $size['file_unique_id']);
            $this->assertEquals($type->photos[0][$index]->fileSize, $size['file_size']);
            $this->assertEquals($type->photos[0][$index]->width, $size['width']);
            $this->assertEquals($type->photos[0][$index]->height, $size['height']);
        }
    }

    public function getType($result): UserProfilePhotosType
    {
        $botApi = $this->getBotFromJson($result);

        return $botApi->call($this->getMethod(), UserProfilePhotosType::class);
    }
}
