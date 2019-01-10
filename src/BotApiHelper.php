<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase;

use TgBotApi\BotApiBase\Exception\NormalizationException;
use TgBotApi\BotApiBase\Exception\ResponseException;
use TgBotApi\BotApiBase\Helper\AddMethodTrait;
use TgBotApi\BotApiBase\Helper\AnswerMethodTrait;
use TgBotApi\BotApiBase\Helper\CreateMethodTrait;
use TgBotApi\BotApiBase\Helper\DeleteMethodTrait;
use TgBotApi\BotApiBase\Helper\EditMethodTrait;
use TgBotApi\BotApiBase\Helper\ExportMethodTrait;
use TgBotApi\BotApiBase\Helper\ForwardMethodTrait;
use TgBotApi\BotApiBase\Helper\GetMethodTrait;
use TgBotApi\BotApiBase\Helper\KickMethodTrait;
use TgBotApi\BotApiBase\Helper\LeaveMethodTrait;
use TgBotApi\BotApiBase\Helper\PinMethodTrait;
use TgBotApi\BotApiBase\Helper\PromoteMethodTrait;
use TgBotApi\BotApiBase\Helper\RestrictMethodTrait;
use TgBotApi\BotApiBase\Helper\SendMethodTrait;
use TgBotApi\BotApiBase\Helper\SetMethodTrait;
use TgBotApi\BotApiBase\Helper\StopMethodTrait;
use TgBotApi\BotApiBase\Helper\UnbanMethodTrait;
use TgBotApi\BotApiBase\Helper\UnpinMethodTrait;
use TgBotApi\BotApiBase\Helper\UploadMethodTrait;
use TgBotApi\BotApiBase\Method\Interfaces\SendMessageInterface;
use TgBotApi\BotApiBase\Type\FileType;
use TgBotApi\BotApiBase\Type\MessageType;

/**
 * Class BotApiHelper.
 * \ */
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
     * @param string|null $type
     *
     * @throws \TgBotApi\BotApiBase\Exception\NormalizationException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     *
     * @return mixed
     */
    public function call($method, string $type = null)
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
        return \sprintf(
            '%s/file/bot%s/%s',
            $this->botApi->getendPoint(),
            $this->botApi->getBotKey(),
            $file->filePath
        );
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

    /**
     * @return string
     */
    public function getBotKey(): string
    {
        return $this->botApi->getBotKey();
    }

    /**
     * @return string
     */
    public function getEndPoint(): string
    {
        return $this->botApi->getEndPoint();
    }
}
