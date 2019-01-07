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
