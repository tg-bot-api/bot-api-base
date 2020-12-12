<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase;

use TgBotApi\BotApiBase\Method\CloseMethod;
use TgBotApi\BotApiBase\Method\CopyMessageMethod;
use TgBotApi\BotApiBase\Method\Interfaces\AddMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Interfaces\AnswerMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Interfaces\CreateMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Interfaces\DeleteMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Interfaces\EditMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Interfaces\ForwardMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Interfaces\KickMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Interfaces\LeaveMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Interfaces\PinMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Interfaces\PromoteMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Interfaces\RestrictMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Interfaces\SendMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Interfaces\SetMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Interfaces\StopMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Interfaces\UnbanMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Interfaces\UnpinMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Interfaces\UploadMethodAliasInterface;
use TgBotApi\BotApiBase\Method\LogOutMethod;
use TgBotApi\BotApiBase\Type\FileType;
use TgBotApi\BotApiBase\Type\MessageIdType;
use TgBotApi\BotApiBase\Type\MessageType;

/**
 * Interface BotApiAliasInterface.
 */
interface BotApiAliasInterface
{
    public function send(SendMethodAliasInterface $method): MessageType;

    public function create(CreateMethodAliasInterface $method): bool;

    public function add(AddMethodAliasInterface $method): bool;

    public function answer(AnswerMethodAliasInterface $method): bool;

    public function delete(DeleteMethodAliasInterface $method): bool;

    /**
     * @return MessageType | bool
     */
    public function edit(EditMethodAliasInterface $method);

    public function forward(ForwardMethodAliasInterface $method): MessageType;

    public function kick(KickMethodAliasInterface $method): bool;

    public function leave(LeaveMethodAliasInterface $method): bool;

    public function pin(PinMethodAliasInterface $method): bool;

    public function promote(PromoteMethodAliasInterface $method): bool;

    public function restrict(RestrictMethodAliasInterface $method): bool;

    public function set(SetMethodAliasInterface $method): bool;

    public function stop(StopMethodAliasInterface $method): bool;

    public function unban(UnbanMethodAliasInterface $method): bool;

    public function unpin(UnpinMethodAliasInterface $method): bool;

    public function upload(UploadMethodAliasInterface $method): FileType;

    public function logOut(LogOutMethod $method): bool;

    public function close(CloseMethod $method): bool;

    public function copyMessage(CopyMessageMethod $method): MessageIdType;
}
