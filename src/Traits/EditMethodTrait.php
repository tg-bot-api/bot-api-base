<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Traits;

use TgBotApi\BotApiBase\Exception\ResponseException;
use TgBotApi\BotApiBase\Method\EditMessageCaptionMethod;
use TgBotApi\BotApiBase\Method\EditMessageLiveLocationMethod;
use TgBotApi\BotApiBase\Method\EditMessageMediaMethod;
use TgBotApi\BotApiBase\Method\EditMessageReplyMarkupMethod;
use TgBotApi\BotApiBase\Method\EditMessageTextMethod;
use TgBotApi\BotApiBase\Method\Interfaces\EditMethodAliasInterface;
use TgBotApi\BotApiBase\Type\MessageType;

/**
 * Trait EditMethodTrait.
 */
trait EditMethodTrait
{
    /**
     * @param EditMethodAliasInterface $method
     *
     * @throws ResponseException
     *
     * @return MessageType | bool
     */
    abstract public function edit(EditMethodAliasInterface $method);

    /**
     * @param EditMessageCaptionMethod $method
     *
     * @throws ResponseException
     *
     * @return MessageType | bool
     */
    public function editMessageCaption(EditMessageCaptionMethod $method)
    {
        return $this->edit($method);
    }

    /**
     * @param EditMessageLiveLocationMethod $method
     *
     * @throws ResponseException
     *
     * @return MessageType | bool
     */
    public function editMessageLiveLocation(EditMessageLiveLocationMethod $method)
    {
        return $this->edit($method);
    }

    /**
     * @param EditMessageMediaMethod $method
     *
     * @throws ResponseException
     *
     * @return MessageType | bool
     */
    public function editMessageMedia(EditMessageMediaMethod $method)
    {
        return $this->edit($method);
    }

    /**
     * @param EditMessageReplyMarkupMethod $method
     *
     * @throws ResponseException
     *
     * @return MessageType | bool
     */
    public function editMessageReplyMarkup(EditMessageReplyMarkupMethod $method)
    {
        return $this->edit($method);
    }

    /**
     * @param EditMessageTextMethod $method
     *
     * @throws ResponseException
     *
     * @return MessageType | bool
     */
    public function editMessageText(EditMessageTextMethod $method)
    {
        return $this->edit($method);
    }
}
