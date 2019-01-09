<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type\InputMedia;

use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;
use TgBotApi\BotApiBase\Type\InputFileType;

/**
 * Class InputMediaVideoType.
 *
 * @see https://core.telegram.org/bots/api#inputmediavideo
 */
class InputMediaVideoType extends InputMediaType
{
    use FillFromArrayTrait;
    /**
     * Optional. Thumbnail of the file sent. The thumbnail should be in JPEG format and less than 200 kB in size.
     * A thumbnail‘s width and height should not exceed 90.
     * Ignored if the file is not uploaded using multipart/form-data.
     * Thumbnails can’t be reused and can be only uploaded as a new file,
     * so you can pass “attach://<file_attach_name>” if the thumbnail was uploaded using multipart/form-data
     * under <file_attach_name>.
     *
     * @var InputFileType|string|null
     */
    public $thumb;

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
     * Optional. Video duration.
     *
     * @var int|null
     */
    public $duration;

    /**
     * Optional. Pass True, if the uploaded video is suitable for streaming.
     *
     * @var bool|null
     */
    public $supportStreaming;

    /**
     * @param string|InputFileType $media
     * @param array|null           $data
     *
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     *
     * @return InputMediaVideoType
     */
    public static function create($media, array $data = null): InputMediaVideoType
    {
        $instance = new static();
        $instance->media = $media;
        $instance->type = static::TYPE_VIDEO;
        if ($data) {
            $instance->fill($data);
        }

        return $instance;
    }
}
