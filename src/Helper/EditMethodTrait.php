<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Helper;

use TgBotApi\BotApiBase\Exception\NormalizationException;
use TgBotApi\BotApiBase\Exception\ResponseException;
use TgBotApi\BotApiBase\Method\EditMessageCaptionMethod;
use TgBotApi\BotApiBase\Method\EditMessageLiveLocationMethod;
use TgBotApi\BotApiBase\Method\EditMessageMediaMethod;
use TgBotApi\BotApiBase\Method\EditMessageReplyMarkupMethod;
use TgBotApi\BotApiBase\Method\EditMessageTextMethod;

/**
 * Trait EditMethodTrait.
 */
trait EditMethodTrait
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
     * @param EditMessageCaptionMethod $method
     *
     * @throws NormalizationException
     * @throws ResponseException
     *
     * @return bool
     */
    public function editMessageCaption(EditMessageCaptionMethod $method): bool
    {
        return $this->call($method);
    }

    /**
     * @param EditMessageLiveLocationMethod $method
     *
     * @throws NormalizationException
     * @throws ResponseException
     *
     * @return bool
     */
    public function editMessageLiveLocation(EditMessageLiveLocationMethod $method): bool
    {
        return $this->call($method);
    }

    /**
     * @param EditMessageMediaMethod $method
     *
     * @throws NormalizationException
     * @throws ResponseException
     *
     * @return bool
     */
    public function editMessageMedia(EditMessageMediaMethod $method): bool
    {
        return $this->call($method);
    }

    /**
     * @param EditMessageReplyMarkupMethod $method
     *
     * @throws NormalizationException
     * @throws ResponseException
     *
     * @return bool
     */
    public function editMessageReplyMarkup(EditMessageReplyMarkupMethod $method): bool
    {
        return $this->call($method);
    }

    /**
     * @param EditMessageTextMethod $method
     *
     * @throws NormalizationException
     * @throws ResponseException
     *
     * @return bool
     */
    public function editMessageText(EditMessageTextMethod $method): bool
    {
        return $this->call($method);
    }
}
