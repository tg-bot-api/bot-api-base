<?php
declare(strict_types=1);

namespace Greenplugin\TelegramBot\Method;

use Greenplugin\TelegramBot\Type\InputFileType;

/**
 * Class SendAnimationMethod
 * @link https://core.telegram.org/bots/api#sendanimation
 */
class SendAnimationMethod extends SendWithCaptionMethodAbstract
{
    /**
     * Animation to send.
     * Pass a file_id as String to send an animation that exists on the Telegram servers (recommended),
     * pass an HTTP URL as a String for Telegram to get an animation from the Internet,
     * or upload a new animation using multipart/form-data.
     *
     * @var InputFileType|string
     */
    public $animation;

    /**
     * Optional. Duration of sent video in seconds.
     *
     * @var integer|null
     */
    public $duration;

    /**
     * Optional. Animation width.
     *
     * @var
     */
    public $width;

    /**
     * Optional. Animation height.
     *
     * @var integer|null
     */
    public $height;

    /**
     * Optional. Thumbnail of the file sent. The thumbnail should be in JPEG format and less than 200 kB in size.
     * A thumbnail‘s width and height should not exceed 90.
     * Ignored if the file is not uploaded using multipart/form-data.
     * Thumbnails can’t be reused and can be only uploaded as a new file, so you can pass “attach://<file_attach_name>”
     * if the thumbnail was uploaded using multipart/form-data under <file_attach_name>.
     *
     * @var InputFileType|string|null
     */
    public $thumb;
}
