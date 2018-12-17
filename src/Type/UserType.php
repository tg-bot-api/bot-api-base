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
     * @var Integer
     */
    public $id;

    /**
     * True, if this user is a bot.
     * @var Boolean
     */
    public $isBot;

    /**
     * User‘s or bot’s first name.
     * @var String
     */
    public $firstName;

    /**
     * Optional. User‘s or bot’s last name.
     * @var String|null
     */
    public $lastName;

    /**
     * Optional. User‘s or bot’s username.
     * @var String|null
     */
    public $username;

    /**
     * Optional. IETF language tag of the user's language.
     * @var String|null
     */
    public $languageCode;
}