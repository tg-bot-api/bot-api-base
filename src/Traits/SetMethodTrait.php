<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Traits;

use TgBotApi\BotApiBase\Exception\ResponseException;
use TgBotApi\BotApiBase\Method\Interfaces\SetMethodAliasInterface;
use TgBotApi\BotApiBase\Method\SetChatDescriptionMethod;
use TgBotApi\BotApiBase\Method\SetChatPermissionsMethod;
use TgBotApi\BotApiBase\Method\SetChatPhotoMethod;
use TgBotApi\BotApiBase\Method\SetChatStickerSetMethod;
use TgBotApi\BotApiBase\Method\SetChatTitleMethod;
use TgBotApi\BotApiBase\Method\SetGameScoreMethod;
use TgBotApi\BotApiBase\Method\SetPassportDataErrorsMethod;
use TgBotApi\BotApiBase\Method\SetStickerPositionInSetMethod;
use TgBotApi\BotApiBase\Method\SetWebhookMethod;

/**
 * Trait SetMethodTrait.
 */
trait SetMethodTrait
{
    /**
     * @param SetMethodAliasInterface $method
     *
     * @throws ResponseException
     *
     * @return bool
     */
    abstract public function set(SetMethodAliasInterface $method): bool;

    /**
     * @param SetChatDescriptionMethod $method
     *
     * @throws ResponseException
     *
     * @return bool
     */
    public function setChatDescription(SetChatDescriptionMethod $method): bool
    {
        return $this->set($method);
    }

    /**
     * @param SetChatPhotoMethod $method
     *
     * @throws ResponseException
     *
     * @return bool
     */
    public function setChatPhoto(SetChatPhotoMethod $method): bool
    {
        return $this->set($method);
    }

    /**
     * @param SetChatStickerSetMethod $method
     *
     * @throws ResponseException
     *
     * @return bool
     */
    public function setChatStickerSet(SetChatStickerSetMethod $method): bool
    {
        return $this->set($method);
    }

    /**
     * @param SetChatTitleMethod $method
     *
     * @throws ResponseException
     *
     * @return bool
     */
    public function setChatTitle(SetChatTitleMethod $method): bool
    {
        return $this->set($method);
    }

    /**
     * @param SetGameScoreMethod $method
     *
     * @throws ResponseException
     *
     * @return bool
     */
    public function setGameScore(SetGameScoreMethod $method): bool
    {
        return $this->set($method);
    }

    /**
     * @param SetStickerPositionInSetMethod $method
     *
     * @throws ResponseException
     *
     * @return bool
     */
    public function setStickerPositionInSet(SetStickerPositionInSetMethod $method): bool
    {
        return $this->set($method);
    }

    /**
     * @param SetWebhookMethod $method
     *
     * @throws ResponseException
     *
     * @return bool
     */
    public function setWebhook(SetWebhookMethod $method): bool
    {
        return $this->set($method);
    }

    /**
     * @param SetPassportDataErrorsMethod $method
     *
     * @throws ResponseException
     *
     * @return bool
     */
    public function setPassportDataErrors(SetPassportDataErrorsMethod $method): bool
    {
        return $this->set($method);
    }

    /**
     * @param SetChatPermissionsMethod $method
     *
     * @throws ResponseException
     *
     * @return bool
     */
    public function setChatPermissions(SetChatPermissionsMethod $method): bool
    {
        return $this->set($method);
    }
}
