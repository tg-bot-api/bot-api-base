<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Traits;

use TgBotApi\BotApiBase\Exception\ResponseException;
use TgBotApi\BotApiBase\Method\DeleteChatPhotoMethod;
use TgBotApi\BotApiBase\Method\DeleteChatStickerSetMethod;
use TgBotApi\BotApiBase\Method\DeleteMessageMethod;
use TgBotApi\BotApiBase\Method\DeleteStickerFromSetMethod;
use TgBotApi\BotApiBase\Method\DeleteWebhookMethod;
use TgBotApi\BotApiBase\Method\Interfaces\DeleteMethodAliasInterface;

/**
 * Trait DeleteMethodTrait.
 */
trait DeleteMethodTrait
{
    /**
     * @param DeleteMethodAliasInterface $method
     *
     * @throws ResponseException
     *
     * @return bool
     */
    abstract public function delete(DeleteMethodAliasInterface $method): bool;

    /**
     * @param DeleteChatPhotoMethod $method
     *
     * @throws ResponseException
     *
     * @return bool
     */
    public function deleteChatPhoto(DeleteChatPhotoMethod $method): bool
    {
        return $this->delete($method);
    }

    /**
     * @param DeleteChatStickerSetMethod $method
     *
     * @throws ResponseException
     *
     * @return bool
     */
    public function deleteChatStickerSet(DeleteChatStickerSetMethod $method): bool
    {
        return $this->delete($method);
    }

    /**
     * @param DeleteMessageMethod $method
     *
     * @throws ResponseException
     *
     * @return bool
     */
    public function deleteMessage(DeleteMessageMethod $method): bool
    {
        return $this->delete($method);
    }

    /**
     * @param DeleteStickerFromSetMethod $method
     *
     * @throws ResponseException
     *
     * @return bool
     */
    public function deleteStickerFromSet(DeleteStickerFromSetMethod $method): bool
    {
        return $this->delete($method);
    }

    /**
     * @param DeleteWebhookMethod $method
     *
     * @throws ResponseException
     *
     * @return bool
     */
    public function deleteWebhook(DeleteWebhookMethod $method): bool
    {
        return $this->delete($method);
    }
}
