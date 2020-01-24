<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type\Poll;

use TgBotApi\BotApiBase\Interfaces\PollTypeInterface;

/**
 * This object represents type of a poll,
 * which is allowed to be created and sent when the corresponding button is pressed.
 *
 * @see https://core.telegram.org/bots/api#keyboardbuttonpolltype
 */
class KeyboardButtonPollType implements PollTypeInterface
{
    /**
     * Optional. If quiz is passed, the user will be allowed to create only polls in the quiz mode.
     * If regular is passed, only regular polls will be allowed.
     * Otherwise, the user will be allowed to create a poll of any type.
     *
     * @var string
     */
    public $type;

    public static function create(string $type): KeyboardButtonPollType
    {
        $instance = new static();
        $instance->type = $type;

        return $instance;
    }
}
