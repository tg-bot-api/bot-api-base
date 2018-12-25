<?php

declare(strict_types=1);

namespace Greenplugin\TelegramBot\Method;

use Greenplugin\TelegramBot\Method\Interfaces\HasParseModeVariableInterface;
use Greenplugin\TelegramBot\Method\Traits\CaptionVariablesTrait;
use Greenplugin\TelegramBot\Method\Traits\FillFromArrayTrait;
use Greenplugin\TelegramBot\Method\Traits\SendToChatVariablesTrait;
use Greenplugin\TelegramBot\Type\InputFileType;

/**
 * Class SendVideoMethod.
 *
 * @see https://core.telegram.org/bots/api#sendvideo
 */
class SendVideoMethod implements HasParseModeVariableInterface
{
    use FillFromArrayTrait;
    use SendToChatVariablesTrait;
    use CaptionVariablesTrait;

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
     * @var int|null
     */
    public $duration;

    /**
     * Optional. Video width.
     *
     * @var int|null
     */
    public $width;

    /**
     * Optional. Video height.
     *
     * @var int|null
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
     * @var bool|null
     */
    public $supportStreaming;

    /**
     * SendVideoMethod constructor.
     *
     * @param int|string           $chatId
     * @param InputFileType|string $video
     * @param array|null           $data
     *
     * @throws \Greenplugin\TelegramBot\Exception\BadArgumentException
     */
    public function __construct($chatId, $video, array $data = null)
    {
        $this->chatId = $chatId;
        $this->video = $video;
        if ($data) {
            $this->fill($data);
        }
    }
}
