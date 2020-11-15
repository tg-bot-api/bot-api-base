<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type;

/**
 * Class ChatType.
 *
 * @see https://core.telegram.org/bots/api#chat
 */
class ChatType
{
    public const TYPE_PRIVATE = 'private';
    public const TYPE_GROUP = 'group';
    public const TYPE_SUPERGROUP = 'supergroup';
    public const TYPE_CHANNEL = 'channel';

    /**
     * Unique identifier for this chat. This number may be greater than 32 bits and some programming languages
     * may have difficulty/silent defects in interpreting it. But it is smaller than 52 bits,
     * so a signed 64 bit integer or double-precision float type are safe for storing this identifier.
     *
     * @var int
     */
    public $id;

    /**
     * Type of chat, can be either “private”, “group”, “supergroup” or “channel”.
     *
     * @var string
     */
    public $type;

    /**
     * Optional. Title, for supergroups, channels and group chats username.
     *
     * @var string|null
     */
    public $title;

    /**
     * Optional. Username of the other party in a private chat.
     *
     * @var string|null
     */
    public $username;

    /**
     * Optional. First name of the other party in a private chat.
     *
     * @var string|null
     */
    public $firstName;

    /**
     * Optional. Last name of the other party in a private chat.
     *
     * @var string|null
     */
    public $lastName;

    /**
     * Optional. True if a group has ‘All Members Are Admins’ enabled.
     *
     * @deprecated
     * @see https://core.telegram.org/bots/api#july-29-2019
     *
     * @var bool|null
     */
    public $allMembersAreAdministrators;

    /**
     * Optional. Default chat member permissions, for groups and supergroups. Returned only in getChat.
     *
     * @var ChatPermissionsType
     */
    public $chatPermissions;

    /**
     * Optional. Chat photo. Returned only in getChat.
     *
     * @var ChatPhotoType|null
     */
    public $photo;

    /**
     * Optional. Bio of the other party in a private chat. Returned only in getChat.
     *
     * @var string|null
     */
    public $bio;

    /**
     * Optional. Description, for supergroups and channel chats. Returned only in getChat.
     *
     * @var string|null
     */
    public $description;
    /**
     * Optional. Chat invite link, for supergroups and channel chats. Returned only in getChat.
     *
     * @var string|null
     */
    public $inviteLink;

    /**
     * Optional. Pinned message, for groups, supergroups and channels. Returned only in getChat.
     *
     * @var MessageType|null
     */
    public $pinnedMessage;

    /**
     * Optional. Default chat member permissions, for groups and supergroups. Returned only in getChat.
     *
     * @var ChatPermissionsType|null
     */
    public $permissions;

    /**
     * Optional. For supergroups, name of group sticker set. Returned only in getChat.
     *
     * @var string|null
     */
    public $stickerSetName;

    /**
     * Optional. For supergroups, the minimum allowed delay between consecutive messages
     * sent by each unpriviledged user. Returned only in getChat.
     *
     * @var int|null
     */
    public $slowModeDelay;

    /**
     * Optional. True, if the bot can change the group sticker set. Returned only in getChat.
     *
     * @var bool|null
     */
    public $canSetStickerSet;

    /**
     * Optional. Unique identifier for the linked chat,
     * i.e. the discussion group identifier for a channel and vice versa;
     * for supergroups and channel chats.
     * This identifier may be greater than 32 bits and some programming languages
     * may have difficulty/silent defects in interpreting it.
     * But it is smaller than 52 bits, so a signed 64 bit integer or double-precision
     * float type are safe for storing this identifier. Returned only in getChat.
     *
     * @var int|null
     */
    public $linkedChatId;

    /**
     * Optional. For supergroups, the location to which the supergroup is connected.
     * Returned only in getChat.
     *
     * @var ChatLocationType|null
     */
    public $location;
}
