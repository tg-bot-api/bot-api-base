<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type;

/**
 * Class PollType
 * This object contains information about a poll.
 *
 * @see  https://core.telegram.org/bots/api#poll
 */
class PollType
{
    /**
     * Unique poll identifier.
     *
     * @var string
     */
    public $id;

    /**
     * Poll question, 1-255 characters.
     *
     * @var string
     */
    public $question;

    /**
     * List of poll options.
     *
     * @var PollOptionType[]
     */
    public $options;

    /**
     * Optional. True, if the poll is closed.
     *
     * @var bool|null
     */
    public $isClosed;
}
