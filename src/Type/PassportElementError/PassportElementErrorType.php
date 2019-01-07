<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type\PassportElementError;

use TgBotApi\BotApiBase\Exception\BadArgumentException;

/**
 * Class PassportElementErrorType.
 *
 * @see https://core.telegram.org/bots/api#passportelementerror
 */
abstract class PassportElementErrorType
{
    const ALLOWED_TYPES = [];
    /**
     * Error source, must be unspecified.
     *
     * @var string
     */
    public $source;

    /**
     * Type of element of the user's Telegram Passport which has the issue.
     *
     * @var string
     */
    public $type;

    /**
     * Error message.
     *
     * @var string
     */
    public $message;

    /**
     * @param string $source
     * @param string $type
     * @param string $message
     *
     * @throws BadArgumentException
     *
     * @return mixed
     */
    protected static function createBase(string $source, string $type, string $message)
    {
        if (!\in_array($type, static::ALLOWED_TYPES, true)) {
            throw new BadArgumentException(\sprintf(
                'parameter "type" should be one of the options: "%s". %s provided.',
                \implode('", "', static::ALLOWED_TYPES),
                $type
            ));
        }
        $instance = new static();
        $instance->source = $source;
        $instance->type = $type;
        $instance->message = $message;

        return $instance;
    }
}
