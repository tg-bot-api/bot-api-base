<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Traits;

use TgBotApi\BotApiBase\Exception\ResponseException;
use TgBotApi\BotApiBase\Method\Interfaces\SetMethodAliasInterface;
use TgBotApi\BotApiBase\Method\SetChatAdministratorCustomTitleMethod;
use TgBotApi\BotApiBase\Method\SetChatDescriptionMethod;
use TgBotApi\BotApiBase\Method\SetChatPermissionsMethod;
use TgBotApi\BotApiBase\Method\SetChatPhotoMethod;
use TgBotApi\BotApiBase\Method\SetChatStickerSetMethod;
use TgBotApi\BotApiBase\Method\SetChatTitleMethod;
use TgBotApi\BotApiBase\Method\SetGameScoreMethod;
use TgBotApi\BotApiBase\Method\SetMyCommandsMethod;
use TgBotApi\BotApiBase\Method\SetPassportDataErrorsMethod;
use TgBotApi\BotApiBase\Method\SetStickerPositionInSetMethod;
use TgBotApi\BotApiBase\Method\SetStickerSetThumbMethod;
use TgBotApi\BotApiBase\Method\SetWebhookMethod;

/**
 * Trait SetMethodTrait.
 */
trait SetMethodTrait
{
    /**
     * @throws ResponseException
     */
    abstract public function set(SetMethodAliasInterface $method): bool;

    /**
     * @throws ResponseException
     */
    public function setChatDescription(SetChatDescriptionMethod $method): bool
    {
        return $this->set($method);
    }

    /**
     * @throws ResponseException
     */
    public function setChatPhoto(SetChatPhotoMethod $method): bool
    {
        return $this->set($method);
    }

    /**
     * @throws ResponseException
     */
    public function setChatAdministratorCustomTitle(SetChatAdministratorCustomTitleMethod $method): bool
    {
        return $this->set($method);
    }

    /**
     * @throws ResponseException
     */
    public function setChatStickerSet(SetChatStickerSetMethod $method): bool
    {
        return $this->set($method);
    }

    /**
     * @throws ResponseException
     */
    public function setChatTitle(SetChatTitleMethod $method): bool
    {
        return $this->set($method);
    }

    /**
     * @throws ResponseException
     */
    public function setMyCommands(SetMyCommandsMethod $method): bool
    {
        return $this->set($method);
    }

    /**
     * @throws ResponseException
     */
    public function setGameScore(SetGameScoreMethod $method): bool
    {
        return $this->set($method);
    }

    /**
     * @throws ResponseException
     */
    public function setStickerPositionInSet(SetStickerPositionInSetMethod $method): bool
    {
        return $this->set($method);
    }

    /**
     * @throws ResponseException
     */
    public function setStickerSetThumb(SetStickerSetThumbMethod $method): bool
    {
        return $this->set($method);
    }

    /**
     * @throws ResponseException
     */
    public function setWebhook(SetWebhookMethod $method): bool
    {
        return $this->set($method);
    }

    /**
     * @throws ResponseException
     */
    public function setPassportDataErrors(SetPassportDataErrorsMethod $method): bool
    {
        return $this->set($method);
    }

    /**
     * @throws ResponseException
     */
    public function setChatPermissions(SetChatPermissionsMethod $method): bool
    {
        return $this->set($method);
    }
}
