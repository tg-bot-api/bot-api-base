<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Traits;

use TgBotApi\BotApiBase\Exception\ResponseException;
use TgBotApi\BotApiBase\Method\AnswerCallbackQueryMethod;
use TgBotApi\BotApiBase\Method\AnswerInlineQueryMethod;
use TgBotApi\BotApiBase\Method\AnswerPreCheckoutQueryMethod;
use TgBotApi\BotApiBase\Method\AnswerShippingQueryMethod;
use TgBotApi\BotApiBase\Method\Interfaces\AnswerMethodAliasInterface;

/**
 * Trait AnswerMethodTrait.
 */
trait AnswerMethodTrait
{
    /**
     * @param AnswerMethodAliasInterface $method
     *
     * @throws ResponseException
     *
     * @return bool
     */
    abstract public function answer(AnswerMethodAliasInterface $method): bool;

    /**
     * @param AnswerCallbackQueryMethod $method
     *
     * @throws ResponseException
     *
     * @return bool
     */
    public function answerCallbackQuery(AnswerCallbackQueryMethod $method): bool
    {
        return $this->answer($method);
    }

    /**
     * @param AnswerInlineQueryMethod $method
     *
     * @throws ResponseException
     *
     * @return bool
     */
    public function answerInlineQuery(AnswerInlineQueryMethod $method): bool
    {
        return $this->answer($method);
    }

    /**
     * @param AnswerPreCheckoutQueryMethod $method
     *
     * @throws ResponseException
     *
     * @return bool
     */
    public function answerPreCheckoutQuery(AnswerPreCheckoutQueryMethod $method): bool
    {
        return $this->answer($method);
    }

    /**
     * @param AnswerShippingQueryMethod $method
     *
     * @throws ResponseException
     *
     * @return bool
     */
    public function answerShippingQuery(AnswerShippingQueryMethod $method): bool
    {
        return $this->answer($method);
    }
}
