<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase;

use TgBotApi\BotApiBase\Exception\ResponseException;
use TgBotApi\BotApiBase\Method\ExportChatInviteLinkMethod;
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
use TgBotApi\BotApiBase\Method\SendChatActionMethod;
use TgBotApi\BotApiBase\Method\SendMediaGroupMethod;
use TgBotApi\BotApiBase\Type\ChatMemberType;
use TgBotApi\BotApiBase\Type\ChatType;
use TgBotApi\BotApiBase\Type\FileType;
use TgBotApi\BotApiBase\Type\GameHighScoreType;
use TgBotApi\BotApiBase\Type\MessageType;
use TgBotApi\BotApiBase\Type\StickerSetType;
use TgBotApi\BotApiBase\Type\UpdateType;
use TgBotApi\BotApiBase\Type\UserProfilePhotosType;
use TgBotApi\BotApiBase\Type\UserType;
use TgBotApi\BotApiBase\Type\WebhookInfoType;

/**
 * Interface BotApiInterface.
 */
interface BotApiInterface extends BotApiAliasInterface
{
    /**
     * @param MethodInterface $method
     * @param string|null     $type
     *
     * @throws ResponseException
     *
     * @return mixed
     */
    public function call(MethodInterface $method, string $type = null);

    /**
     * @param ExportChatInviteLinkMethod $method
     *
     * @throws ResponseException
     *
     * @return string
     */
    public function exportChatInviteLink(ExportChatInviteLinkMethod $method): string;

    /**
     * @param SendChatActionMethod $method
     *
     * @throws ResponseException
     *
     * @return bool
     */
    public function sendChatAction(SendChatActionMethod $method): bool;

    /**
     * @param GetUpdatesMethod $method
     *
     * @throws ResponseException
     *
     * @return UpdateType[]
     */
    public function getUpdates(GetUpdatesMethod $method): array;

    /**
     * @param GetMeMethod $method
     *
     * @throws ResponseException
     *
     * @return UserType
     */
    public function getMe(GetMeMethod $method): UserType;

    /**
     * @param GetUserProfilePhotosMethod $method
     *
     * @throws ResponseException
     *
     * @return UserProfilePhotosType
     */
    public function getUserProfilePhotos(GetUserProfilePhotosMethod $method): UserProfilePhotosType;

    /**
     * @param GetWebhookInfoMethod $method
     *
     * @throws ResponseException
     *
     * @return WebhookInfoType
     */
    public function getWebhookInfo(GetWebhookInfoMethod $method): WebhookInfoType;

    /**
     * @param GetChatMembersCountMethod $method
     *
     * @throws ResponseException
     *
     * @return int
     */
    public function getChatMembersCount(GetChatMembersCountMethod $method): int;

    /**
     * @param GetChatMethod $method
     *
     * @throws ResponseException
     *
     * @return ChatType
     */
    public function getChat(GetChatMethod $method): ChatType;

    /**
     * @param GetChatAdministratorsMethod $method
     *
     * @throws ResponseException
     *
     * @return ChatMemberType[]
     */
    public function getChatAdministrators(GetChatAdministratorsMethod $method): array;

    /**
     * @param GetChatMemberMethod $method
     *
     * @throws ResponseException
     *
     * @return ChatMemberType
     */
    public function getChatMember(GetChatMemberMethod $method): ChatMemberType;

    /**
     * @param GetGameHighScoresMethod $method
     *
     * @throws ResponseException
     *
     * @return GameHighScoreType[]
     */
    public function getGameHighScores(GetGameHighScoresMethod $method): array;

    /**
     * @param GetStickerSetMethod $method
     *
     * @throws ResponseException
     *
     * @return StickerSetType
     */
    public function getStickerSet(GetStickerSetMethod $method): StickerSetType;

    /**
     * @param GetFileMethod $method
     *
     * @throws ResponseException
     *
     * @return FileType
     */
    public function getFile(GetFileMethod $method): FileType;

    /**
     * @param SendMediaGroupMethod $method
     *
     * @throws ResponseException
     *
     * @return MessageType[]
     */
    public function sendMediaGroup(SendMediaGroupMethod $method): array;

    /**
     * @param FileType $file
     *
     * @return string
     */
    public function getAbsoluteFilePath(FileType $file): string;
}
