<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type;

/**
 * Class UserType.
 *
 * @see https://core.telegram.org/bots/api#user
 */
class UserType
{
    /**
     * Unique identifier for this user or bot.
     *
     * @var int
     */
    public $id;

    /**
     * True, if this user is a bot.
     *
     * @var bool
     */
    public $isBot;

    /**
     * User‘s or bot’s first name.
     *
     * @var string
     */
    public $firstName;

    /**
     * Optional. User‘s or bot’s last name.
     *
     * @var string|null
     */
    public $lastName;

    /**
     * Optional. User‘s or bot’s username.
     *
     * @var string|null
     */
    public $username;

    /**
     * Optional. IETF language tag of the user's language.
     *
     * @var string|null
     */
    public $languageCode;

    /**
     * Optional. True, if the bot can be invited to groups. Returned only in getMe.
     *
     * @var bool|null
     */
    public $canJoinGroups;

    /**
     * Optional. True, if privacy mode is disabled for the bot. Returned only in getMe.
     *
     * @var bool|null
     */
    public $canReadAllGroupMessages;

    /**
     * Optional. True, if the bot supports inline queries. Returned only in getMe.
     *
     * @var bool|null
     */
    public $supportsInlineQueries;
}
