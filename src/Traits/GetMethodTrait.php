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
use TgBotApi\BotApiBase\Method\GetMyCommandsMethod;
use TgBotApi\BotApiBase\Method\GetStickerSetMethod;
use TgBotApi\BotApiBase\Method\GetUpdatesMethod;
use TgBotApi\BotApiBase\Method\GetUserProfilePhotosMethod;
use TgBotApi\BotApiBase\Method\GetWebhookInfoMethod;
use TgBotApi\BotApiBase\Method\Interfaces\MethodInterface;
use TgBotApi\BotApiBase\Type\BotCommandType;
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
     * @param $type
     *
     * @throws ResponseException
     *
     * @return mixed
     */
    abstract public function call(MethodInterface $method, string $type = null);

    /**
     * @throws ResponseException
     *
     * @return UpdateType[]
     */
    public function getUpdates(GetUpdatesMethod $method): array
    {
        return $this->call($method, UpdateType::class . '[]');
    }

    /**
     * @throws ResponseException
     */
    public function getMe(GetMeMethod $method): UserType
    {
        return $this->call($method, UserType::class);
    }

    /**
     * @throws ResponseException
     *
     * @return BotCommandType[]
     */
    public function getMyCommands(GetMyCommandsMethod $method): array
    {
        return $this->call($method, BotCommandType::class . '[]');
    }

    /**
     * @throws ResponseException
     */
    public function getUserProfilePhotos(GetUserProfilePhotosMethod $method): UserProfilePhotosType
    {
        return $this->call($method, UserProfilePhotosType::class);
    }

    /**
     * @throws ResponseException
     */
    public function getWebhookInfo(GetWebhookInfoMethod $method): WebhookInfoType
    {
        return $this->call($method, WebhookInfoType::class);
    }

    /**
     * @throws ResponseException
     */
    public function getChatMembersCount(GetChatMembersCountMethod $method): int
    {
        return $this->call($method);
    }

    /**
     * @throws ResponseException
     */
    public function getChat(GetChatMethod $method): ChatType
    {
        return $this->call($method, ChatType::class);
    }

    /**
     * @throws ResponseException
     *
     * @return ChatMemberType[]
     */
    public function getChatAdministrators(GetChatAdministratorsMethod $method): array
    {
        return $this->call($method, ChatMemberType::class . '[]');
    }

    /**
     * @throws ResponseException
     */
    public function getChatMember(GetChatMemberMethod $method): ChatMemberType
    {
        return $this->call($method, ChatMemberType::class);
    }

    /**
     * @throws ResponseException
     *
     * @return GameHighScoreType[]
     */
    public function getGameHighScores(GetGameHighScoresMethod $method): array
    {
        return $this->call($method, GameHighScoreType::class . '[]');
    }

    /**
     * @throws ResponseException
     */
    public function getStickerSet(GetStickerSetMethod $method): StickerSetType
    {
        return $this->call($method, StickerSetType::class);
    }

    /**
     * @throws ResponseException
     */
    public function getFile(GetFileMethod $method): FileType
    {
        return $this->call($method, FileType::class);
    }
}
