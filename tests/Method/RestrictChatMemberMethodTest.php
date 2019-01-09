<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\RestrictChatMemberMethod;

class RestrictChatMemberMethodTest extends MethodTestCase
{
    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\NormalizationException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode()
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

        $botApi->restrictChatMember(RestrictChatMemberMethod::create('chat_id', 1, [
            'untilDate' => $dateTime,
            'canSendMessages' => true,
            'canSendMediaMessages' => true,
            'canSendOtherMessages' => true,
            'canAddWebPagePreviews' => true,
        ]));
    }
}
