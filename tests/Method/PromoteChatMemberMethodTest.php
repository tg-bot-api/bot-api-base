<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\PromoteChatMemberMethod;

/**
 * Class PromoteChatMemberMethodTest.
 */
class PromoteChatMemberMethodTest extends MethodTestCase
{
    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode()
    {
        $botApi = $this->getBot('promoteChatMember', [
            'chat_id' => 'chat_id',
            'user_id' => 1,
            'can_change_info' => true,
            'can_post_messages' => true,
            'can_edit_messages' => true,
            'can_delete_messages' => true,
            'can_invite_users' => true,
            'can_restrict_members' => true,
            'can_pin_messages' => true,
            'can_promote_members' => true,
            'is_anonymous' => true,
        ], true);

        $method = PromoteChatMemberMethod::create('chat_id', 1, ['canChangeInfo' => true]);
        $method->canPostMessages = true;
        $method->canEditMessages = true;
        $method->canDeleteMessages = true;
        $method->canInviteUsers = true;
        $method->canRestrictMembers = true;
        $method->canPinMessages = true;
        $method->canPromoteMembers = true;
        $method->isAnonymous = true;

        $botApi->promoteChatMember($method);
    }
}
