<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\SetChatPermissionsMethod;
use TgBotApi\BotApiBase\Type\ChatPermissionsType;

class SetChatPermissionsMethodTest extends MethodTestCase
{
    public function testEncode()
    {
        $botApi = $this->getBot('setChatPermissions', [
            'chat_id' => 'chat_id',
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

        $botApi->setChatPermissions(SetChatPermissionsMethod::create('chat_id', $permissions));
    }
}
