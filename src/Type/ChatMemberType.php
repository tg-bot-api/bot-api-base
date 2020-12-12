<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type;

/**
 * Class ChatMemberType.
 *
 * @see https://core.telegram.org/bots/api#chatmember
 */
class ChatMemberType
{
    public const STATUS_CREATOR = 'creator';
    public const STATUS_ADMINISTRATOR = 'administrator';
    public const STATUS_MEMBER = 'member';
    public const STATUS_RESTRICTED = 'restricted';
    public const STATUS_LEFT = 'left';
    public const STATUS_KICKED = 'kicked';

    /**
     * Information about the user.
     *
     * @var UserType
     */
    public $user;

    /**
     * The member's status in the chat. Can be “creator”, “administrator”, “member”, “restricted”, “left” or “kicked”.
     *
     * @var string;
     */
    public $status;

    /**
     * Optional. Owner and administrators only. Custom title for this user.
     *
     * @var string|null
     */
    public $customTitle;

    /**
     * Optional. Owner and administrators only. True, if the user's presence in the chat is hidden.
     *
     * @var bool|null
     */
    public $isAnonymous;

    /**
     * Optional. Restricted and kicked only. Date when restrictions will be lifted for this user, \DateTimeImmutable.
     *
     * @var \DateTimeImmutable|null
     */
    public $untilDate;

    /**
     * Optional. Administrators only. True, if the bot is allowed to edit administrator privileges of that user.
     *
     * @var bool|null
     */
    public $canBeEdited;

    /**
     * Optional. Administrators only. True, if the administrator can change the chat title, photo and other settings.
     *
     * @var bool|null
     */
    public $canChangeInfo;

    /**
     * Optional. Administrators only. True, if the administrator can post in the channel, channels only.
     *
     * @var bool|null
     */
    public $canPostMessages;

    /**
     * Optional. Administrators only. True, if the administrator can edit messages of other users
     * and can pin messages, channels only.
     *
     * @var bool|null
     */
    public $canEditMessages;

    /**
     * Optional. Administrators only. True, if the administrator can delete messages of other users.
     *
     * @var bool|null
     */
    public $canDeleteMessages;

    /**
     * Optional. Administrators only. True, if the administrator can invite new users to the chat.
     *
     * @var bool|null
     */
    public $canInviteUsers;

    /**
     * Boolean    Optional. Administrators only. True, if the administrator can restrict, ban or unban chat members.
     *
     * @var bool|null
     */
    public $canRestrictMembers;

    /**
     * Optional. Administrators only. True, if the administrator can pin messages, supergroups only.
     *
     * @var bool|null
     */
    public $canPinMessages;

    /**
     * Optional. Administrators only. True, if the administrator can add new administrators with a subset
     * of his own privileges or demote administrators that he has promoted, directly or indirectly
     * (promoted by administrators that were appointed by the user).
     *
     * @var bool|null
     */
    public $canPromoteMembers;

    /**
     * Optional. Restricted only. True, if the user is a member of the chat at the moment of the request.
     *
     * @var bool | null
     */
    public $isMember;

    /**
     * Optional. Restricted only. True, if the user can send text messages, contacts, locations and venues.
     *
     * @var bool|null
     */
    public $canSendMessages;

    /**
     * Optional. Restricted only. True, if the user can send audios, documents, photos, videos,
     * video notes and voice notes, implies can_send_messages.
     *
     * @var bool|null
     */
    public $canSendMediaMessages;

    /**
     * Optional. Restricted only. True, if the user can send animations, games, stickers and use inline bots,
     * implies can_send_media_messages.
     *
     * @var bool|null
     */
    public $canSendOthersMessages;

    /**
     * Optional. Restricted only. True, if user may add web page previews to his messages,
     * implies can_send_media_messages.
     *
     * @var bool|null
     */
    public $canAddWebPagePreviews;

    /**
     * Optional. Restricted only. True, if the user is allowed to send polls;.
     *
     * @var bool|null
     */
    public $canSendPolls;
}
