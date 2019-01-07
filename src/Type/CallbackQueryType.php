<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type;

/**
 * Class CallbackQueryType
 * represents an incoming callback query from a callback button in an inline keyboard.
 * If the button that originated the query was attached to a message sent by the bot, the field message
 * will be present. If the button was attached to a message sent via the bot (in inline mode), the field
 * inline_message_id will be present. Exactly one of the fields data or game_short_name will be present.
 *
 * @see https://core.telegram.org/bots/api#callbackquery
 */
class CallbackQueryType
{
    /**
     * Unique identifier for this query.
     *
     * @var string
     */
    public $id;

    /**
     * Sender.
     *
     * @var UserType
     */
    public $from;

    /**
     * Optional. Message with the callback button that originated the query.
     * Note that message content and message date will not be available if the message is too old.
     *
     * @var MessageType|null
     */
    public $message;

    /**
     * Optional. Identifier of the message sent via the bot in inline mode, that originated the query.
     *
     * @var string|null
     */
    public $inlineMessageId;

    /**
     * Global identifier, uniquely corresponding to the chat to which the message with the callback button was sent.
     * Useful for high scores in games.
     *
     * @var string|null
     */
    public $chatInstance;

    /**
     * Optional. Data associated with the callback button.
     * Be aware that a bad client can send arbitrary data in this field.
     *
     * @var string|null
     */
    public $data;

    /**
     * Optional. Short name of a Game to be returned, serves as the unique identifier for the game.
     *
     * @var string|null
     */
    public $gameShortGame;
}
