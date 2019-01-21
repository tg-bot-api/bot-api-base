<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\MethodInterface;

/**
 * Class GetFileMethod.
 *
 * Use this method to get basic info about a file and prepare it for downloading.
 * For the moment, bots can download files of up to 20MB in size. On success, a File object is returned.
 * The file can then be downloaded via the link https://api.telegram.org/file/bot<token>/<file_path>,
 * where <file_path> is taken from the response.
 * It is guaranteed that the link will be valid for at least 1 hour.
 * When the link expires, a new one can be requested by calling getFile
 *
 * Note: This function may not preserve the original file name and MIME type.
 * You should save the file's MIME type and name (if available) when the File object is received.
 *
 * @see https://core.telegram.org/bots/api#getfile
 */
class GetFileMethod implements MethodInterface
{
    /**
     * File identifier to get info about.
     *
     * @var string
     */
    public $fileId;

    /**
     * @param string $fileId
     *
     * @return GetFileMethod
     */
    public static function create(string $fileId): GetFileMethod
    {
        $instance = new static();
        $instance->fileId = $fileId;

        return $instance;
    }
}
