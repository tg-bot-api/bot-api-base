<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Helper;

use TgBotApi\BotApiBase\Exception\NormalizationException;
use TgBotApi\BotApiBase\Exception\ResponseException;
use TgBotApi\BotApiBase\Method\DeleteChatPhotoMethod;
use TgBotApi\BotApiBase\Method\DeleteChatStickerSetMethod;
use TgBotApi\BotApiBase\Method\DeleteMessageMethod;
use TgBotApi\BotApiBase\Method\DeleteStickerFromSetMethod;
use TgBotApi\BotApiBase\Method\DeleteWebhookMethod;

/**
 * Trait DeleteMethodTrait.
 */
trait DeleteMethodTrait
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
     * @param DeleteChatPhotoMethod $method
     *
     * @throws NormalizationException
     * @throws ResponseException
     *
     * @return bool
     */
    public function deleteChatPhoto(DeleteChatPhotoMethod $method): bool
    {
        return $this->call($method);
    }

    /**
     * @param DeleteChatStickerSetMethod $method
     *
     * @throws NormalizationException
     * @throws ResponseException
     *
     * @return bool
     */
    public function deleteChatStickerSet(DeleteChatStickerSetMethod $method): bool
    {
        return $this->call($method);
    }

    /**
     * @param DeleteMessageMethod $method
     *
     * @throws NormalizationException
     * @throws ResponseException
     *
     * @return bool
     */
    public function deleteMessage(DeleteMessageMethod $method): bool
    {
        return $this->call($method);
    }

    /**
     * @param DeleteStickerFromSetMethod $method
     *
     * @throws NormalizationException
     * @throws ResponseException
     *
     * @return bool
     */
    public function deleteStickerFromSet(DeleteStickerFromSetMethod $method): bool
    {
        return $this->call($method);
    }

    /**
     * @param DeleteWebhookMethod $method
     *
     * @throws NormalizationException
     * @throws ResponseException
     *
     * @return bool
     */
    public function deleteWebhook(DeleteWebhookMethod $method): bool
    {
        return $this->call($method);
    }
}
