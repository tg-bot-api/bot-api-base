<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type;

/**
 * Class ChatPhotoType.
 *
 * @see https://core.telegram.org/bots/api#chatphoto
 */
class ChatPhotoType
{
    /**
     * Unique file identifier of small (160x160) chat photo. This file_id can be used only for photo download.
     *
     * @var string
     */
    public $smallFileId;

    /**
     * Unique file identifier of small (160x160) chat photo,
     * which is supposed to be the same over time and for different bots.
     * Can't be used to download or reuse the file.
     *
     * @var string
     */
    public $smallFileUniqueId;

    /**
     * Unique file identifier of big (640x640) chat photo. This file_id can be used only for photo download.
     *
     * @var string
     */
    public $bigFileId;

    /**
     * Unique file identifier of big (640x640) chat photo,
     * which is supposed to be the same over time and for different bots.
     * Can't be used to download or reuse the file.
     *
     * @var string
     */
    public $bigFileUniqueId;
}
