<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Exception\BadArgumentException;
use TgBotApi\BotApiBase\Interfaces\PollTypeInterface;
use TgBotApi\BotApiBase\Method\Interfaces\SendMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;
use TgBotApi\BotApiBase\Method\Traits\SendToChatVariablesTrait;

/**
 * Class SendPollMethod
 * Use this method to send a native poll. A native poll can't be sent to a private chat.
 * On success, the sent Message is returned.
 *
 * @see https://core.telegram.org/bots/api#sendpoll
 */
class SendPollMethod implements SendMethodAliasInterface, PollTypeInterface
{
    use FillFromArrayTrait;
    use SendToChatVariablesTrait;

    /**
     * Poll question, 1-255 characters.
     *
     * @var string;
     */
    public $question;

    /**
     * List of answer options, 2-10 strings 1-100 characters each.
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
