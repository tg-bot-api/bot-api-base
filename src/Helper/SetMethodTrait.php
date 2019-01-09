<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Helper;

use TgBotApi\BotApiBase\Exception\NormalizationException;
use TgBotApi\BotApiBase\Exception\ResponseException;
use TgBotApi\BotApiBase\Method\SetChatDescriptionMethod;
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
     * @param SetChatDescriptionMethod $method
     *
     * @throws ResponseException
     * @throws NormalizationException
     *
     * @return bool
     */
    public function setChatDescription(SetChatDescriptionMethod $method): bool
    {
        return $this->call($method);
    }

    /**
     * @param SetChatPhotoMethod $method
     *
     * @throws ResponseException
     * @throws NormalizationException
     *
     * @return bool
     */
    public function setChatPhoto(SetChatPhotoMethod $method): bool
    {
        return $this->call($method);
    }

    /**
     * @param SetChatStickerSetMethod $method
     *
     * @throws ResponseException
     * @throws NormalizationException
     *
     * @return bool
     */
    public function setChatStickerSet(SetChatStickerSetMethod $method): bool
    {
        return $this->call($method);
    }

    /**
     * @param SetChatTitleMethod $method
     *
     * @throws ResponseException
     * @throws NormalizationException
     *
     * @return bool
     */
    public function setChatTitle(SetChatTitleMethod $method): bool
    {
        return $this->call($method);
    }

    /**
     * @param SetGameScoreMethod $method
     *
     * @throws ResponseException
     * @throws NormalizationException
     *
     * @return bool
     */
    public function setGameScore(SetGameScoreMethod $method): bool
    {
        return $this->call($method);
    }

    /**
     * @param SetStickerPositionInSetMethod $method
     *
     * @throws ResponseException
     * @throws NormalizationException
     *
     * @return bool
     */
    public function setStickerPositionInSet(SetStickerPositionInSetMethod $method): bool
    {
        return $this->call($method);
    }

    /**
     * @param SetWebhookMethod $method
     *
     * @throws ResponseException
     * @throws NormalizationException
     *
     * @return bool
     */
    public function setWebhook(SetWebhookMethod $method): bool
    {
        return $this->call($method);
    }

    /**
     * @param SetPassportDataErrorsMethod $method
     *
     * @throws NormalizationException
     * @throws ResponseException
     *
     * @return bool
     */
    public function setPassportDataErrors(SetPassportDataErrorsMethod $method): bool
    {
        return $this->call($method);
    }
}
