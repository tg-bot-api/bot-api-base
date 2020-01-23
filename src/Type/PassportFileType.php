<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type;

/**
 * Class PassportFileType.
 *
 * @see https://core.telegram.org/bots/api#passportfile
 */
class PassportFileType
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
     * File size.
     *
     * @var int
     */
    public $fileSize;

    /**
     * time when the file was uploaded.
     *
     * @var \DateTimeImmutable
     */
    public $fileDate;
}
