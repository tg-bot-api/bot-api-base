<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type;

/**
 * Class FileType
 * This object represents a file ready to be downloaded.
 * The file can be downloaded via the link https://api.telegram.org/file/bot<token>/<file_path>.
 * It is guaranteed that the link will be valid for at least 1 hour. When the link expires,
 * a new one can be requested by calling getFile.
 * Maximum file size to download is 20 MB.
 *
 * @see https://core.telegram.org/bots/api#file
 */
class FileType
{
    /**
     * Unique identifier for this file.
     *
     * @var string
     */
    public $fileId;

    /**
     * Unique identifier for this file, which is supposed to be the same over time and for different bots.
     * Can't be used to download or reuse the file.
     *
     * @var string
     */
    public $fileUniqueId;

    /**
     * Optional. File size, if known.
     *
     * @var int|null
     */
    public $fileSize;

    /**
     * Optional. File path. Use https://api.telegram.org/file/bot<token>/<file_path> to get the file.
     *
     * @var string|null
     */
    public $filePath;
}
