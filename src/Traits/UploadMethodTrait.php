<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Traits;

use TgBotApi\BotApiBase\Exception\ResponseException;
use TgBotApi\BotApiBase\Method\Interfaces\UploadMethodAliasInterface;
use TgBotApi\BotApiBase\Method\UploadStickerFileMethod;
use TgBotApi\BotApiBase\Type\FileType;

/**
 * Trait UploadMethodTrait.
 */
trait UploadMethodTrait
{
    /**
     * @param UploadMethodAliasInterface $method
     *
     * @throws ResponseException
     *
     * @return FileType
     */
    abstract public function upload(UploadMethodAliasInterface $method): FileType;

    /**
     * @param UploadStickerFileMethod $method
     *
     * @throws ResponseException
     *
     * @return FileType
     */
    public function uploadStickerFile(UploadStickerFileMethod $method): FileType
    {
        return $this->upload($method);
    }
}
