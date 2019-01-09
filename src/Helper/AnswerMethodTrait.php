<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Helper;

use TgBotApi\BotApiBase\Exception\NormalizationException;
use TgBotApi\BotApiBase\Exception\ResponseException;
use TgBotApi\BotApiBase\Method\AnswerCallbackQueryMethod;
use TgBotApi\BotApiBase\Method\AnswerInlineQueryMethod;
use TgBotApi\BotApiBase\Method\AnswerShippingQueryMethod;

/**
 * Trait AnswerMethodTrait.
 */
trait AnswerMethodTrait
{
    /**
     * @param $method
     * @param $type
     *
     * @throws ResponseException
     * @throws NormalizationException
     *
     * @return mixed
     */
    abstract public function call($method, $type = null);

    /**
     * @param AnswerCallbackQueryMethod $method
     *
     * @throws ResponseException
     * @throws NormalizationException
     *
     * @return bool
     */
    public function answerCallbackQuery(AnswerCallbackQueryMethod $method): bool
    {
        return $this->call($method);
    }

    /**
     * @param AnswerInlineQueryMethod $method
     *
     * @throws ResponseException
     * @throws NormalizationException
     *
     * @return bool
     */
    public function answerInlineQuery(AnswerInlineQueryMethod $method): bool
    {
        return $this->call($method);
    }

    /**
     * @param AnswerInlineQueryMethod $method
     *
     * @throws NormalizationException
     * @throws ResponseException
     *
     * @return bool
     */
    public function answerPreCheckoutQuery(AnswerInlineQueryMethod $method): bool
    {
        return $this->call($method);
    }

    /**
     * @param AnswerShippingQueryMethod $method
     *
     * @throws NormalizationException
     * @throws ResponseException
     *
     * @return bool
     */
    public function answerShippingQuery(AnswerShippingQueryMethod $method): bool
    {
        return $this->call($method);
    }
}
