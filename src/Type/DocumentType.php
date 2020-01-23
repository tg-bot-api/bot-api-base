<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type;

/**
 * Class DocumentType.
 *
 * @see https://core.telegram.org/bots/api#document
 */
class DocumentType
{
    /**
     * Unique file identifier.
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
     * Optional. Document thumbnail as defined by sender.
     *
     * @var PhotoSizeType|null
     */
    public $thumb;

    /**
     * Optional. Original filename as defined by sender.
     *
     * @var string|null
     */
    public $fileName;

    /**
     * Optional. MIME type of the file as defined by sender.
     *
     * @var string|null
     */
    public $mimeType;

    /**
     * Optional. File size.
     *
     * @var int|null
     */
    public $fileSize;
}
