<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type;

/**
 * Class ReplyKeyboardRemoveType.
 *
 * @plink https://core.telegram.org/bots/api#replykeyboardremove
 */
class ReplyKeyboardRemoveType
{
    /**
     * Requests clients to remove the custom keyboard (user will not be able to summon this keyboard;
     * if you want to hide the keyboard from sight but keep it accessible,
     * use one_time_keyboard in ReplyKeyboardMarkup).
     *
     * @var bool
     */
    public $removeKeyboard;

    /**
     * Optional. Use this parameter if you want to remove the keyboard for specific users only. Targets:
     * 1) users that are @mentioned in the text of the Message object;
     * 2) if the bot's message is a reply (has reply_to_message_id), sender of the original message.
     *
     * Example: A user votes in a poll, bot returns confirmation message in reply to the vote and removes
     * the keyboard for that user, while still showing the keyboard with poll options to users who haven't voted yet.
     *
     * @var bool|null
     */
    public $selective;
}
