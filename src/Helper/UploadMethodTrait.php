<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Helper;

use TgBotApi\BotApiBase\Exception\NormalizationException;
use TgBotApi\BotApiBase\Exception\ResponseException;
use TgBotApi\BotApiBase\Method\UploadStickerFileMethod;
use TgBotApi\BotApiBase\Type\FileType;

/**
 * Trait UploadMethodTrait.
 */
trait UploadMethodTrait
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
     * @param UploadStickerFileMethod $method
     *
     * @throws NormalizationException
     * @throws ResponseException
     *
     * @return FileType
     */
    public function uploadStickerFile(UploadStickerFileMethod $method): FileType
    {
        return $this->call($method, FileType::class);
    }
}
