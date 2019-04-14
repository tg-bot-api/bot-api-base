<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

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
class SendPollMethod implements SendMethodAliasInterface
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
     * @param string     $chatId
     * @param string     $question
     * @param string[]   $options
     * @param array|null $data
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
