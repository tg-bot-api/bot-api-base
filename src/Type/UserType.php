<?php


namespace Greenplugin\TelegramBot\Type;


/**
 * Class UserType
 * @link https://core.telegram.org/bots/api#user
 */
class UserType
{
    /**
     * Unique identifier for this user or bot.
     * @var integer
     */
    public $id;

    /**
     * True, if this user is a bot.
     * @var boolean
     */
    public $isBot;

    /**
     * User‘s or bot’s first name.
     * @var string
     */
    public $firstName;

    /**
     * Optional. User‘s or bot’s last name.
     * @var string|null
     */
    public $lastName;

    /**
     * Optional. User‘s or bot’s username.
     * @var string|null
     */
    public $username;

    /**
     * Optional. IETF language tag of the user's language.
     * @var string|null
     */
    public $languageCode;
}