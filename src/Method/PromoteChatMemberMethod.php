<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\PromoteMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Traits\ChatIdVariableTrait;
use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;
use TgBotApi\BotApiBase\Method\Traits\UserIdVariableTrait;

/**
 * Class PromoteChatMemberMethod.
 *
 * @see https://core.telegram.org/bots/api#promotechatmember
 */
class PromoteChatMemberMethod implements PromoteMethodAliasInterface
{
    use FillFromArrayTrait;
    use ChatIdVariableTrait;
    use UserIdVariableTrait;

    /**
     * Pass True, if the administrator's presence in the chat is hidden.
     *
     * @var bool|null
     */
    public $isAnonymous;

    /**
     * Optional. Pass True, if the administrator can change chat title, photo and other settings.
     *
     * @var bool|null
     */
    public $canChangeInfo;

    /**
     * Optional. Pass True, if the administrator can create channel posts, channels only.
     *
     * @var bool|null
     */
    public $canPostMessages;

    /**
     * Optional. Pass True, if the administrator can edit messages of other users and can pin messages, channels only.
     *
     * @var bool|null
     */
    public $canEditMessages;

    /**
     * Optional. Pass True, if the administrator can delete messages of other users.
     *
     * @var bool|null
     */
    public $canDeleteMessages;

    /**
     * Optional. Pass True, if the administrator can invite new users to the chat.
     *
     * @var bool|null
     */
    public $canInviteUsers;

    /**
     * Optional. Pass True, if the administrator can restrict, ban or unban chat members.
     *
     * @var bool|null
     */
    public $canRestrictMembers;

    /**
     * Optional. Pass True, if the administrator can pin messages, supergroups only.
     *
     * @var bool|null
     */
    public $canPinMessages;

    /**
     * Optional. Pass True, if the administrator can add new administrators with a subset of his own privileges
     * or demote administrators that he has promoted, directly or indirectly
     * (promoted by administrators that were appointed by him).
     *
     * @var bool|null
     */
    public $canPromoteMembers;

    /**
     * @param $chatId
     * @param $userId
     *
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public static function create($chatId, $userId, array $data = null): PromoteChatMemberMethod
    {
        $instance = new static();
        $instance->chatId = $chatId;
        $instance->userId = $userId;
        if ($data) {
            $instance->fill($data);
        }

        return $instance;
    }
}
