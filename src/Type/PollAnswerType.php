<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type;

/**
 * This object represents an answer of a user in a non-anonymous poll.
 *
 * @see https://core.telegram.org/bots/api#pollanswer
 */
class PollAnswerType
{
    /**
     * Unique poll identifier.
     *
     * @var string
     */
    public $pollId;

    /**
     * The user, who changed the answer to the poll.
     *
     * @var UserType
     */
    public $user;

    /**
     * 0-based identifiers of answer options, chosen by the user. May be empty if the user retracted their vote.
     *
     * @var int[]
     */
    public $optionIds;
}
