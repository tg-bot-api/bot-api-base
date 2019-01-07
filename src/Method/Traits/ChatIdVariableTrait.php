<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method\Traits;

/**
 * Trait ChatIdVariableTrait.
 */
trait ChatIdVariableTrait
{
    /**
     * Unique identifier for the target chat or username of the target channel (in the format @channelusername).
     *
     * @var int|string
     */
    public $chatId;
}
