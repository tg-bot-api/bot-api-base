<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\RestrictChatMemberMethod;
use TgBotApi\BotApiBase\Type\ChatPermissionsType;

class RestrictChatMemberMethodTest extends MethodTestCase
{
    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     * @throws \Exception
     */
    public function testEncodeOld()
    {
        $dateTime = new \DateTimeImmutable();
        $botApi = $this->getBot('restrictChatMember', [
            'chat_id' => 'chat_id',
            'user_id' => 1,
            'until_date' => $dateTime->format('U'),
            'can_send_messages' => true,
            'can_send_media_messages' => true,
            'can_send_other_messages' => true,
            'can_add_web_page_previews' => true,
        ], true);

        $botApi->restrictChatMember(RestrictChatMemberMethod::createOld('chat_id', 1, [
            'untilDate' => $dateTime,
            'canSendMessages' => true,
            'canSendMediaMessages' => true,
            'canSendOtherMessages' => true,
            'canAddWebPagePreviews' => true,
        ]));
    }

    public function testEncode()
    {
        $dateTime = new \DateTimeImmutable();
        $botApi = $this->getBot('restrictChatMember', [
            'chat_id' => 'chat_id',
            'user_id' => 1,
            'until_date' => $dateTime->format('U'),
            'permissions' => [
                'can_send_messages' => true,
                'can_send_media_messages' => true,
                'can_send_polls' => true,
                'can_send_other_messages' => true,
                'can_add_web_page_previews' => true,
                'can_change_info' => true,
                'can_invite_users' => true,
                'can_pin_messages' => true,
            ], ], true);

        $permissions = ChatPermissionsType::create([
            'canAddWebPagePreviews' => true,
            'canChangeInfo' => true,
            'canInviteUsers' => true,
            'canPinMessages' => true,
            'canSendMediaMessages' => true,
            'canSendMessages' => true,
            'canSendOtherMessages' => true,
            'canSendPolls' => true,
        ]);

        $botApi->restrictChatMember(RestrictChatMemberMethod::create('chat_id', 1, $permissions, [
            'untilDate' => $dateTime,
        ]));
    }
}
