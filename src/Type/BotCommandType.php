<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type;

/**
 * Class BotCommandType.
 *
 * This object represents a bot command.
 *
 * @see https://core.telegram.org/bots/api#botcommand
 */
class BotCommandType
{
    /**
     * Text of the command, 1-32 characters. Can contain only lowercase English letters, digits and underscores.
     *
     * @var string
     */
    public $command;

    /**
     * Description of the command, 3-256 characters.
     *
     * @var string
     */
    public $description;

    public static function create(string $command, string $description): BotCommandType
    {
        $instance = new static();
        $instance->command = $command;
        $instance->description = $description;

        return $instance;
    }
}
