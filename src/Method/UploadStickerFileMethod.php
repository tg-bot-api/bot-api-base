<?php

declare(strict_types=1);

namespace Greenplugin\TelegramBot\Method;

use Greenplugin\TelegramBot\Type\InputFileType;

/**
 * Class UploadStickerFileMethod.
 *
 * Use this method to upload a .png file with a sticker for later use in createNewStickerSet
 * and addStickerToSet methods (can be used multiple times). Returns the uploaded File on success.
 *
 * @see https://core.telegram.org/bots/api#uploadstickerfile
 */
class UploadStickerFileMethod
{
    /**
     * User identifier of sticker file owner.
     *
     * @var int
     */
    public $userId;

    /**
     * Png image with the sticker, must be up to 512 kilobytes in size, dimensions must not exceed 512px,
     * and either width or height must be exactly 512px.
     *
     * @var InputFileType
     */
    public $pngSticker;

    /**
     * UploadStickerFileMethod constructor.
     *
     * @param int           $userId
     * @param InputFileType $pngSticker
     */
    public function __construct(int $userId, InputFileType $pngSticker)
    {
        $this->userId = $userId;
        $this->pngSticker = $pngSticker;
    }
}
