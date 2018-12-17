<?php
declare(strict_types=1);

namespace Greenplugin\TelegramBot\Type;


class DocumentType
{
    /**
     * Unique file identifier.
     * @var String
     */
    public $fileId;

    /**
     * Optional. Document thumbnail as defined by sender.
     * @var PhotoSizeType
     */
    public $thumb;

    /**
     * Optional. Original filename as defined by sender.
     * @var String
     */
    public $fileName;

    /**
     * Optional. MIME type of the file as defined by sender.
     * @var String
     */
    public $mimeType;

    /**
     * Optional. File size.
     * @var Integer
     */
    public $fileSize;

}