<?php
declare(strict_types=1);

namespace Greenplugin\TelegramBot\Type;


/**
 * Class DocumentType
 * @see https://core.telegram.org/bots/api#document
 */
class DocumentType
{
    /**
     * Unique file identifier.
     * @var String
     */
    public $fileId;

    /**
     * Optional. Document thumbnail as defined by sender.
     * @var PhotoSizeType|null
     */
    public $thumb;

    /**
     * Optional. Original filename as defined by sender.
     * @var String|null
     */
    public $fileName;

    /**
     * Optional. MIME type of the file as defined by sender.
     * @var String|null
     */
    public $mimeType;

    /**
     * Optional. File size.
     * @var Integer|null
     */
    public $fileSize;

}