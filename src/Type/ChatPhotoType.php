<?php
declare(strict_types=1);

namespace Greenplugin\TelegramBot\Type;


class ChatPhotoType
{
    /**
     * Unique file identifier of small (160x160) chat photo. This file_id can be used only for photo download.
     * @var String
     */

    public $smallFileId;

    /**
     * Unique file identifier of big (640x640) chat photo. This file_id can be used only for photo download.
     * @var String
     */
    public $bigFileId;
}