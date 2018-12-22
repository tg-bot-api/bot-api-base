<?php
declare(strict_types=1);

namespace Greenplugin\TelegramBot\Method;

/**
 * Class PromoteChatMemberMethod
 * @package Greenplugin\TelegramBot\Method
 */
class PromoteChatMemberMethod extends ChatMemberMethodAbstract
{
    /**
     * Optional. Pass True, if the administrator can change chat title, photo and other settings.
     *
     * @var boolean|null
     */
    public $canChangeInfo;

    /**
     * Optional. Pass True, if the administrator can create channel posts, channels only.
     *
     * @var boolean|null
     */
    public $canPostMessages;

    /**
     * Optional. Pass True, if the administrator can edit messages of other users and can pin messages, channels only.
     *
     * @var boolean|null
     */
    public $canEditMessages;

    /**
     * Optional. Pass True, if the administrator can delete messages of other users.
     *
     * @var boolean|null
     */
    public $canDeleteMessages;

    /**
     * Optional. Pass True, if the administrator can invite new users to the chat.
     *
     * @var boolean|null
     */
    public $canInviteUsers;

    /**
     * Optional. Pass True, if the administrator can restrict, ban or unban chat members.
     *
     * @var boolean|null
     */
    public $canRestrictMembers;

    /**
     * Optional. Pass True, if the administrator can pin messages, supergroups only.
     *
     * @var boolean|null
     */
    public $canPinMessages;

    /**
     * Optional. Pass True, if the administrator can add new administrators with a subset of his own privileges
     * or demote administrators that he has promoted, directly or indirectly
     * (promoted by administrators that were appointed by him)
     *
     * @var boolean|null
     */
    public $canPromoteMembers;
}
