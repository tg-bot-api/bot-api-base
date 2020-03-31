<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\SetMethodAliasInterface;
use TgBotApi\BotApiBase\Type\BotCommandType;

/**
 * Class SetMyCommandsMethod.
 *
 * Use this method to change the list of the bot's commands. Returns True on success.
 *
 * @see https://core.telegram.org/bots/api#setmycommands
 */
class SetMyCommandsMethod implements SetMethodAliasInterface
{
    /**
     * A JSON-serialized list of bot commands to be set as the list of the bot's commands.
     * At most 100 commands can be specified.
     *
     * @var BotCommandType[]
     */
    public $commands;

    /**
     * @param BotCommandType[] $commands
     */
    public static function create(array $commands): SetMyCommandsMethod
    {
        $instance = new static();
        $instance->commands = $commands;

        return $instance;
    }
}
