<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Traits;

use TgBotApi\BotApiBase\Exception\ResponseException;
use TgBotApi\BotApiBase\Method\GetChatAdministratorsMethod;
use TgBotApi\BotApiBase\Method\GetChatMemberMethod;
use TgBotApi\BotApiBase\Method\GetChatMembersCountMethod;
use TgBotApi\BotApiBase\Method\GetChatMethod;
use TgBotApi\BotApiBase\Method\GetFileMethod;
use TgBotApi\BotApiBase\Method\GetGameHighScoresMethod;
use TgBotApi\BotApiBase\Method\GetMeMethod;
use TgBotApi\BotApiBase\Method\GetStickerSetMethod;
use TgBotApi\BotApiBase\Method\GetUpdatesMethod;
use TgBotApi\BotApiBase\Method\GetUserProfilePhotosMethod;
use TgBotApi\BotApiBase\Method\GetWebhookInfoMethod;
use TgBotApi\BotApiBase\Method\Interfaces\MethodInterface;
use TgBotApi\BotApiBase\Type\ChatMemberType;
use TgBotApi\BotApiBase\Type\ChatType;
use TgBotApi\BotApiBase\Type\FileType;
use TgBotApi\BotApiBase\Type\GameHighScoreType;
use TgBotApi\BotApiBase\Type\StickerSetType;
use TgBotApi\BotApiBase\Type\UpdateType;
use TgBotApi\BotApiBase\Type\UserProfilePhotosType;
use TgBotApi\BotApiBase\Type\UserType;
use TgBotApi\BotApiBase\Type\WebhookInfoType;

trait GetMethodTrait
{
    /**
     * @param MethodInterface $method
     * @param $type
     *
     * @throws ResponseException
     *
     * @return mixed
     */
    abstract public function call(MethodInterface $method, string $type = null);

    /**
     * @param GetUpdatesMethod $method
     *
     * @throws ResponseException
     *
     * @return UpdateType[]
     */
    public function getUpdates(GetUpdatesMethod $method): array
    {
        return $this->call($method, UpdateType::class . '[]');
    }

    /**
     * @param GetMeMethod $method
     *
     * @throws ResponseException
     *
     * @return UserType
     */
    public function getMe(GetMeMethod $method): UserType
    {
        return $this->call($method, UserType::class);
    }

    /**
     * @param GetUserProfilePhotosMethod $method
     *
     * @throws ResponseException
     *
     * @return UserProfilePhotosType
     */
    public function getUserProfilePhotos(GetUserProfilePhotosMethod $method): UserProfilePhotosType
    {
        return $this->call($method, UserProfilePhotosType::class);
    }

    /**
     * @param GetWebhookInfoMethod $method
     *
     * @throws ResponseException
     *
     * @return WebhookInfoType
     */
    public function getWebhookInfo(GetWebhookInfoMethod $method): WebhookInfoType
    {
        return $this->call($method, WebhookInfoType::class);
    }

    /**
     * @param GetChatMembersCountMethod $method
     *
     * @throws ResponseException
     *
     * @return int
     */
    public function getChatMembersCount(GetChatMembersCountMethod $method): int
    {
        return $this->call($method);
    }

    /**
     * @param GetChatMethod $method
     *
     * @throws ResponseException
     *
     * @return ChatType
     */
    public function getChat(GetChatMethod $method): ChatType
    {
        return $this->call($method, ChatType::class);
    }

    /**
     * @param GetChatAdministratorsMethod $method
     *
     * @throws ResponseException
     *
     * @return ChatMemberType[]
     */
    public function getChatAdministrators(GetChatAdministratorsMethod $method): array
    {
        return $this->call($method, ChatMemberType::class . '[]');
    }

    /**
     * @param GetChatMemberMethod $method
     *
     * @throws ResponseException
     *
     * @return ChatMemberType
     */
    public function getChatMember(GetChatMemberMethod $method): ChatMemberType
    {
        return $this->call($method, ChatMemberType::class);
    }

    /**
     * @param GetGameHighScoresMethod $method
     *
     * @throws ResponseException
     *
     * @return GameHighScoreType[]
     */
    public function getGameHighScores(GetGameHighScoresMethod $method): array
    {
        return $this->call($method, GameHighScoreType::class . '[]');
    }

    /**
     * @param GetStickerSetMethod $method
     *
     * @throws ResponseException
     *
     * @return StickerSetType
     */
    public function getStickerSet(GetStickerSetMethod $method): StickerSetType
    {
        return $this->call($method, StickerSetType::class);
    }

    /**
     * @param GetFileMethod $method
     *
     * @throws ResponseException
     *
     * @return FileType
     */
    public function getFile(GetFileMethod $method): FileType
    {
        return $this->call($method, FileType::class);
    }
}
