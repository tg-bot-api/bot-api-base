<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase;

use TgBotApi\BotApiBase\Exception\ResponseException;
use TgBotApi\BotApiBase\Method\CloseMethod;
use TgBotApi\BotApiBase\Method\CopyMessageMethod;
use TgBotApi\BotApiBase\Method\ExportChatInviteLinkMethod;
use TgBotApi\BotApiBase\Method\Interfaces\MethodInterface;
use TgBotApi\BotApiBase\Method\LogOutMethod;
use TgBotApi\BotApiBase\Method\SendChatActionMethod;
use TgBotApi\BotApiBase\Method\SendMediaGroupMethod;
use TgBotApi\BotApiBase\Method\StopPollMethod;
use TgBotApi\BotApiBase\Traits\AliasMethodTrait;
use TgBotApi\BotApiBase\Traits\GetMethodTrait;
use TgBotApi\BotApiBase\Type\FileType;
use TgBotApi\BotApiBase\Type\MessageIdType;
use TgBotApi\BotApiBase\Type\MessageType;
use TgBotApi\BotApiBase\Type\PollType;

/**
 * Class BotApi.
 */
class BotApi implements BotApiInterface
{
    use AliasMethodTrait;
    use GetMethodTrait;

    /**
     * @var string
     */
    private $botKey;

    /**
     * @var ApiClientInterface
     */
    private $apiClient;

    /**
     * @var string
     */
    private $endPoint;

    /**
     * @var NormalizerInterface
     */
    private $normalizer;

    public function __construct(
        string $botKey,
        ApiClientInterface $apiClient,
        NormalizerInterface $normalizer,
        string $endPoint = 'https://api.telegram.org'
    ) {
        $this->botKey = $botKey;
        $this->apiClient = $apiClient;
        $this->normalizer = $normalizer;
        $this->endPoint = $endPoint;

        $this->apiClient->setBotKey($botKey);
        $this->apiClient->setEndpoint($endPoint);
    }

    /**
     * @param $method
     *
     * @throws ResponseException
     *
     * @return mixed
     */
    public function call(MethodInterface $method, string $type = null)
    {
        $json = $this->apiClient->send($this->getMethodName($method), $this->normalizer->normalize($method));

        if (true !== $json->ok) {
            throw new ResponseException($json->description);
        }

        return $type ? $this->normalizer->denormalize($json->result, $type) : $json->result;
    }

    /**
     * @throws ResponseException
     */
    public function exportChatInviteLink(ExportChatInviteLinkMethod $method): string
    {
        return $this->call($method);
    }

    /**
     * @throws ResponseException
     */
    public function sendChatAction(SendChatActionMethod $method): bool
    {
        return $this->call($method);
    }

    /**
     * @throws ResponseException
     *
     * @return MessageType[]
     */
    public function sendMediaGroup(SendMediaGroupMethod $method): array
    {
        return $this->call($method, MessageType::class . '[]');
    }

    /**
     * @throws ResponseException
     */
    public function logOut(LogOutMethod $method): bool
    {
        return $this->call($method);
    }

    /**
     * @throws ResponseException
     */
    public function close(CloseMethod $method): bool
    {
        return $this->call($method);
    }

    /**
     * @throws ResponseException
     */
    public function copyMessage(CopyMessageMethod $method): MessageIdType
    {
        return $this->call($method, MessageIdType::class);
    }

    /**
     * @throws ResponseException
     */
    public function stopPoll(StopPollMethod $method): PollType
    {
        return $this->call($method, PollType::class);
    }

    public function getAbsoluteFilePath(FileType $file): string
    {
        return \sprintf(
            '%s/file/bot%s/%s',
            $this->endPoint,
            $this->botKey,
            $file->filePath
        );
    }

    /**
     * @param $method
     */
    private function getMethodName($method): string
    {
        return \lcfirst(\substr(
            \get_class($method),
            \strrpos(\get_class($method), '\\') + 1,
            -6
        ));
    }
}
