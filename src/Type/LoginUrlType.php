<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type;

use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;

/**
 * Class LoginUrlType
 *This object represents a parameter of the inline keyboard button used to automatically authorize a user.
 * Serves as a great replacement for the Telegram Login Widget when the user is coming from Telegram.
 * All the user needs to do is tap/click a button.
 *
 * @see https://core.telegram.org/bots/api#loginurl
 */
class LoginUrlType
{
    use FillFromArrayTrait;

    /**
     * An HTTP URL to be opened with user authorization data added to the query string when the button is pressed.
     * If the user refuses to provide authorization data,
     * the original URL without information about the user will be opened.
     * The data added is the same as described in Receiving authorization data.
     *
     * NOTE: You must always check the hash of the received data to verify the authentication
     * and the integrity of the data as described in Checking authorization.
     *
     * @var string
     */
    public $url;

    /**
     * Optional. Username of a bot, which will be used for user authorization. See Setting up a bot for more details.
     * If not specified, the current bot's username will be assumed.
     * The url's domain must be the same as the domain linked with the bot.
     * See Linking your domain to the bot for more details.
     *
     * @var string | null
     */
    public $forwardText;

    /**
     * Optional. New text of the button in forwarded messages.
     *
     * @var string | null
     */
    public $botUsername;

    /**
     * Optional. Pass True to request the permission for your bot to send messages to the user.
     *
     * @var bool | null
     */
    public $requestWriteAccess;

    /**
     * @param string     $url
     * @param array|null $data
     *
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     *
     * @return LoginUrlType
     */
    public static function create(string $url, array $data = null): LoginUrlType
    {
        $instance = new static();
        $instance->url = $url;
        if ($data) {
            $instance->fill($data);
        }

        return $instance;
    }
}
