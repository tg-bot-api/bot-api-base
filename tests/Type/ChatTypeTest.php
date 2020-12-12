<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Type;

use TgBotApi\BotApiBase\Type\ChatLocationType;
use TgBotApi\BotApiBase\Type\ChatPermissionsType;
use TgBotApi\BotApiBase\Type\ChatPhotoType;
use TgBotApi\BotApiBase\Type\ChatType;
use TgBotApi\BotApiBase\Type\LocationType;
use TgBotApi\BotApiBase\Type\MessageType;

class ChatTypeTest extends TypeBaseTestCase
{
    public function provideData(): array
    {
        return [
            'full object case' => [
                ChatType::class,
                static::getResource('ChatType/full'),
                static::getFullObject(),
            ],
        ];
    }

    private static function getFullObject(): ChatType
    {
        $pinnedMessage = new MessageType();
        $pinnedMessage->messageId = 1;
        $pinnedMessage->date = (new \DateTimeImmutable())->setTimestamp(0);
        $pinnedMessage->chat = new ChatType();
        $pinnedMessage->chat->id = 9223372036854775807;
        $pinnedMessage->chat->type = ChatType::TYPE_SUPERGROUP;
        $pinnedMessage->chat->title = 'title';
        $pinnedMessage->chat->username = 'username';

        $chatType = new ChatType();

        $chatType->id = 9223372036854775807;
        $chatType->type = ChatType::TYPE_SUPERGROUP;
        $chatType->title = 'title';
        $chatType->username = 'username';
        $chatType->firstName = 'first_name';
        $chatType->lastName = 'last_name';

        $chatType->photo = new ChatPhotoType();
        $chatType->photo->bigFileId = 'big_file_id';
        $chatType->photo->bigFileUniqueId = 'big_file_unique_id';
        $chatType->photo->smallFileId = 'small_file_id';
        $chatType->photo->smallFileUniqueId = 'small_file_unique_id';

        $chatType->bio = 'bio';
        $chatType->description = 'description';
        $chatType->inviteLink = 'invite_link';
        $chatType->pinnedMessage = $pinnedMessage;

        $chatType->permissions = ChatPermissionsType::create([
            'canAddWebPagePreviews' => true,
            'canChangeInfo' => true,
            'canInviteUsers' => true,
            'canPinMessages' => true,
            'canSendMediaMessages' => true,
            'canSendMessages' => true,
            'canSendOtherMessages' => true,
            'canSendPolls' => true,
        ]);

        $chatType->slowModeDelay = 1;
        $chatType->stickerSetName = 'sticker_set_name';
        $chatType->canSetStickerSet = true;
        $chatType->linkedChatId = 9223372036854775806;

        $chatType->location = new ChatLocationType();
        $chatType->location->address = 'address';
        $chatType->location->location = new LocationType();
        $chatType->location->location->latitude = 1.1;
        $chatType->location->location->longitude = 1.1;
        $chatType->location->location->horizontalAccuracy = 200;

        return $chatType;
    }
}
