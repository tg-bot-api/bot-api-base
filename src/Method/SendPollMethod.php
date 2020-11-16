<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Exception\BadArgumentException;
use TgBotApi\BotApiBase\Interfaces\PollTypeInterface;
use TgBotApi\BotApiBase\Method\Interfaces\HasParseModeVariableInterface;
use TgBotApi\BotApiBase\Method\Interfaces\SendMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;
use TgBotApi\BotApiBase\Method\Traits\SendToChatVariablesTrait;
use TgBotApi\BotApiBase\Type\MessageEntityType;

/**
 * Class SendPollMethod
 * Use this method to send a native poll. A native poll can't be sent to a private chat.
 * On success, the sent Message is returned.
 *
 * @see https://core.telegram.org/bots/api#sendpoll
 */
class SendPollMethod implements SendMethodAliasInterface, PollTypeInterface, HasParseModeVariableInterface
{
    use FillFromArrayTrait;
    use SendToChatVariablesTrait;

    /**
     * Poll question, 1-300 characters.
     *
     * @var string;
     */
    public $question;

    /**
     * A JSON-serialized list of answer options, 2-10 strings 1-100 characters each.
     *
     * @var string[]
     */
    public $options;

    /**
     * Optional. If the poll needs to be anonymous, defaults to True.
     *
     * @var bool|null
     */
    public $isAnonymous;

    /**
     * Optional. Poll type, “quiz” or “regular”, defaults to “regular”.
     *
     * @var string
     */
    public $type;

    /**
     * Optional. True, if the poll allows multiple answers, ignored for polls in quiz mode, defaults to False.
     *
     * @var bool|null
     */
    public $allowsMultipleAnswers;

    /**
     * Optional. 0-based identifier of the correct answer option, required for polls in quiz mode.
     *
     * @var int|null
     */
    public $correctOptionId;

    /**
     * Optional. Text that is shown when a user chooses an incorrect answer or taps on the lamp icon
     * in a quiz-style poll, 0-200 characters with at most 2 line feeds after entities parsing.
     *
     * @var string|null
     */
    public $explanation;

    /**
     * Optional. Mode for parsing entities in the explanation. See formatting options for more details.
     *
     * @var string|null
     */
    public $explanationParseMode;

    /**
     * List of special entities that appear in the poll explanation, which can be specified instead of parse_mode.
     *
     * @var MessageEntityType[]|null
     */
    public $explanationEntities;

    /**
     * Optional. Amount of time in seconds the poll will be active after creation, 5-600.
     * Can't be used together with close_date.
     *
     * @var int|null
     */
    public $openPeriod;

    /**
     * Point in time (will be transformed to Unix timestamp on send) when the poll will be automatically closed.
     * Must be at least 5 and no more than 600 seconds in the future. Can't be used together with open_period.
     *
     * @var \DateTimeInterface|null
     */
    public $closeDate;

    /**
     * Optional. Pass True, if the poll needs to be immediately closed.
     *
     * @var bool|null
     */
    public $isClosed;

    /**
     * @param string[] $options
     *
     * @throws BadArgumentException
     *
     * @return SendPollMethod
     */
    public static function create(string $chatId, string $question, array $options, array $data = null): self
    {
        $instance = new static();
        $instance->chatId = $chatId;
        $instance->question = $question;
        $instance->options = $options;
        if ($data) {
            $instance->fill($data);
        }

        return $instance;
    }
}
