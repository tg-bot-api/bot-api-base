<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type;

/**
 * This object represents a unique message identifier.
 *
 * @see https://core.telegram.org/bots/api#messageid
 */
class MessageIdType
{
    /**
     * Unique message identifier;.
     *
     * @var int
     */
    public $messageId;
}
