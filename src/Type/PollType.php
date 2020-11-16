<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type;

use TgBotApi\BotApiBase\Interfaces\PollTypeInterface;

/**
 * Class PollType
 * This object contains information about a poll.
 *
 * @see  https://core.telegram.org/bots/api#poll
 */
class PollType implements PollTypeInterface
{
    /**
     * Unique poll identifier.
     *
     * @var string
     */
    public $id;

    /**
     * Poll question, 1-300 characters.
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
     * Total number of users that voted in the poll.
     *
     * @var int
     */
    public $totalVoterCount;

    /**
     * True, if the poll is closed.
     *
     * @var bool|null
     */
    public $isClosed;

    /**
     * True, if the poll is anonymous.
     *
     * @var bool|null
     */
    public $isAnonymous;

    /**
     * Poll type, currently can be “regular” or “quiz”.
     *
     * @var string
     */
    public $type;

    /**
     * True, if the poll allows multiple answers.
     *
     * @var bool|null
     */
    public $allowsMultipleAnswers;

    /**
     * Optional. 0-based identifier of the correct answer option.
     * Available only for polls in the quiz mode, which are closed, or was sent (not forwarded)
     * by the bot or to the private chat with the bot.
     *
     * @var int|null
     */
    public $correctOptionId;

    /**
     * Optional. Text that is shown when a user chooses an incorrect answer or taps
     * on the lamp icon in a quiz-style poll, 0-200 characters.
     *
     * @var string|null
     */
    public $explanation;

    /**
     * Optional. Special entities like usernames, URLs, bot commands, etc. that appear in the explanation.
     *
     * @var MessageEntityType|null
     */
    public $explanationEntities;

    /**
     * Optional. Amount of time in seconds the poll will be active after creation.
     *
     * @var int|null
     */
    public $openPeriod;

    /**
     * Optional. Point in time (Unix timestamp) when the poll will be automatically closed.
     *
     * @var \DateTimeInterface|null
     */
    public $closeDate;
}
