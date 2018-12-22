<?php
declare(strict_types=1);

namespace Greenplugin\TelegramBot\Method;

use Greenplugin\TelegramBot\Type\InputFileType;

/**
 * Class SendVideoMethod
 * @link https://core.telegram.org/bots/api#sendvideo
 */
class SendVideoMethod extends SendWithCaptionMethodAbstract
{
    /**
     * Video to send. Pass a file_id as String to send a video that exists on the Telegram servers (recommended),
     * pass an HTTP URL as a String for Telegram to get a video from the Internet,
     * or upload a new video using multipart/form-data.
     *
     * @var InputFileType|string
     */
    public $video;

    /**
     * Optional. Duration of sent video in seconds.
     *
     * @var integer|null
     */
    public $duration;

    /**
     * Optional. Video width.
     *
     * @var
     */
    public $width;

    /**
     * Optional. Video height.
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

    /**
     * Optional. Pass True, if the uploaded video is suitable for streaming.
     *
     * @var boolean|null
     */
    public $supportStreaming;
}