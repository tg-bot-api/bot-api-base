<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Helper;

use TgBotApi\BotApiBase\BotApiInterface;
use TgBotApi\BotApiBase\Exception\NormalizationException;
use TgBotApi\BotApiBase\Exception\ResponseException;
use TgBotApi\BotApiBase\Method\Interfaces\SendMessageInterface;
use TgBotApi\BotApiBase\Type\FileType;
use TgBotApi\BotApiBase\Type\MessageType;

class BotApiHelper implements BotApiInterface
{
    use AddMethodTrait;
    use AnswerMethodTrait;
    use CreateMethodTrait;
    use DeleteMethodTrait;
    use EditMethodTrait;
    use ExportMethodTrait;
    use ForwardMethodTrait;
    use GetMethodTrait;
    use KickMethodTrait;
    use LeaveMethodTrait;
    use PinMethodTrait;
    use PromoteMethodTrait;
    use RestrictMethodTrait;
    use SendMethodTrait;
    use SetMethodTrait;
    use StopMethodTrait;
    use UnbanMethodTrait;
    use UnpinMethodTrait;
    use UploadMethodTrait;

    /**
     * @var BotApiInterface
     */
    private $botApi;

    /**
     * BotApiHelper constructor.
     *
     * @param BotApiInterface $botApi
     */
    public function __construct(BotApiInterface $botApi)
    {
        $this->botApi = $botApi;
    }

    /**
     * @param $method
     * @param null $type
     *
     * @throws \TgBotApi\BotApiBase\Exception\NormalizationException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     *
     * @return mixed
     */
    public function call($method, $type = null)
    {
        return $this->botApi->call($method, $type);
    }

    /**
     * @param FileType $file
     *
     * @return string
     */
    public function getAbsoluteFilePath(FileType $file): string
    {
        return $this->botApi->getAbsoluteFilePath($file);
    }

    /**
     * @param SendMessageInterface $method
     *
     * @throws ResponseException
     * @throws NormalizationException
     *
     * @return MessageType
     */
    public function send(SendMessageInterface $method): MessageType
    {
        return $this->botApi->call($method, MessageType::class);
    }
}
