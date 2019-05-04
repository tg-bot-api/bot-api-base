<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Traits;

use TgBotApi\BotApiBase\Exception\ResponseException;
use TgBotApi\BotApiBase\Method\Interfaces\AddMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Interfaces\AnswerMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Interfaces\CreateMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Interfaces\DeleteMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Interfaces\EditMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Interfaces\ForwardMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Interfaces\KickMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Interfaces\LeaveMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Interfaces\MethodInterface;
use TgBotApi\BotApiBase\Method\Interfaces\PinMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Interfaces\PromoteMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Interfaces\RestrictMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Interfaces\SendMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Interfaces\SetMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Interfaces\StopMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Interfaces\UnbanMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Interfaces\UnpinMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Interfaces\UploadMethodAliasInterface;
use TgBotApi\BotApiBase\Type\FileType;
use TgBotApi\BotApiBase\Type\MessageType;

/**
 * Trait AliasMethodTrait.
 */
trait AliasMethodTrait
{
    /**
     * @param MethodInterface $method
     * @param string|null     $type
     *
     * @throws ResponseException
     *
     * @return mixed
     */
    abstract public function call(MethodInterface $method, string $type = null);

    /**
     * @param AddMethodAliasInterface $method
     *
     * @throws ResponseException
     *
     * @return bool
     */
    public function add(AddMethodAliasInterface $method): bool
    {
        return $this->call($method);
    }

    /**
     * @param AnswerMethodAliasInterface $method
     *
     * @throws ResponseException
     *
     * @return bool
     */
    public function answer(AnswerMethodAliasInterface $method): bool
    {
        return $this->call($method);
    }

    /**
     * @param CreateMethodAliasInterface $method
     *
     * @throws ResponseException
     *
     * @return bool
     */
    public function create(CreateMethodAliasInterface $method): bool
    {
        return $this->call($method);
    }

    /**
     * @param DeleteMethodAliasInterface $method
     *
     * @throws ResponseException
     *
     * @return bool
     */
    public function delete(DeleteMethodAliasInterface $method): bool
    {
        return $this->call($method);
    }

    /**
     * @param EditMethodAliasInterface $method
     *
     * @throws ResponseException
     *
     * @return MessageType | bool
     */
    public function edit(EditMethodAliasInterface $method)
    {
        return $this->call($method, MessageType::class . '|bool');
    }

    /**
     * @param ForwardMethodAliasInterface $method
     *
     * @throws ResponseException
     *
     * @return MessageType
     */
    public function forward(ForwardMethodAliasInterface $method): MessageType
    {
        return $this->call($method, MessageType::class);
    }

    /**
     * @param KickMethodAliasInterface $method
     *
     * @throws ResponseException
     *
     * @return bool
     */
    public function kick(KickMethodAliasInterface $method): bool
    {
        return $this->call($method);
    }

    /**
     * @param LeaveMethodAliasInterface $method
     *
     * @throws ResponseException
     *
     * @return bool
     */
    public function leave(LeaveMethodAliasInterface $method): bool
    {
        return $this->call($method);
    }

    /**
     * @param PinMethodAliasInterface $method
     *
     * @throws ResponseException
     *
     * @return bool
     */
    public function pin(PinMethodAliasInterface $method): bool
    {
        return $this->call($method);
    }

    /**
     * @param PromoteMethodAliasInterface $method
     *
     * @throws ResponseException
     *
     * @return bool
     */
    public function promote(PromoteMethodAliasInterface $method): bool
    {
        return $this->call($method);
    }

    /**
     * @param RestrictMethodAliasInterface $method
     *
     * @throws ResponseException
     *
     * @return bool
     */
    public function restrict(RestrictMethodAliasInterface $method): bool
    {
        return $this->call($method);
    }

    /**
     * @param SendMethodAliasInterface $method
     *
     * @throws ResponseException
     *
     * @return MessageType
     */
    public function send(SendMethodAliasInterface $method): MessageType
    {
        return $this->call($method, MessageType::class);
    }

    /**
     * @param SetMethodAliasInterface $method
     *
     * @throws ResponseException
     *
     * @return bool
     */
    public function set(SetMethodAliasInterface $method): bool
    {
        return $this->call($method);
    }

    /**
     * @param StopMethodAliasInterface $method
     *
     * @throws ResponseException
     *
     * @return bool
     */
    public function stop(StopMethodAliasInterface $method): bool
    {
        return $this->call($method);
    }

    /**
     * @param UnbanMethodAliasInterface $method
     *
     * @throws ResponseException
     *
     * @return bool
     */
    public function unban(UnbanMethodAliasInterface $method): bool
    {
        return $this->call($method);
    }

    /**
     * @param UnpinMethodAliasInterface $method
     *
     * @throws ResponseException
     *
     * @return bool
     */
    public function unpin(UnpinMethodAliasInterface $method): bool
    {
        return $this->call($method);
    }

    /**
     * @param UploadMethodAliasInterface $method
     *
     * @throws ResponseException
     *
     * @return FileType
     */
    public function upload(UploadMethodAliasInterface $method): FileType
    {
        return $this->call($method, FileType::class);
    }
}
