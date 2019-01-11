<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\SendMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;
use TgBotApi\BotApiBase\Method\Traits\SendToChatVariablesTrait;
use TgBotApi\BotApiBase\Type\InputFileType;

/**
 * Class SendVideoNoteMethod.
 *
 * @see https://core.telegram.org/bots/api#sendvideonote
 */
class SendVideoNoteMethod implements SendMethodAliasInterface
{
    use FillFromArrayTrait;
    use SendToChatVariablesTrait;
    /**
     * Video note to send.
     * Pass a file_id as String to send a video note that exists on the Telegram servers (recommended)
     * or upload a new video using multipart/form-data.
     * Sending video notes by a URL is currently unsupported.
     *
     * @var InputFileType|string
     */
    public $videoNote;

    /**
     * Optional. Duration of sent video in seconds.
     *
     * @var int|null
     */
    public $duration;

    /**
     * Optional. Video width and height, i.e. diameter of the video message.
     *
     * @var int|null
     */
    public $length;

    /**
     * Optional. Thumbnail of the file sent. The thumbnail should be in JPEG format and less than 200 kB in size.
     * A thumbnail‘s width and height should not exceed 90.
     * Ignored if the file is not uploaded using multipart/form-data.
     * Thumbnails can’t be reused and can be only uploaded as a new file,
     * so you can pass “attach://<file_attach_name>”
     * if the thumbnail was uploaded using multipart/form-data under <file_attach_name>.
     *
     * @var InputFileType|string|null
     */
    public $thumb;

    /**
     * @param int|string           $chatId
     * @param InputFileType|string $videoNote
     * @param array|null           $data
     *
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     *
     * @return SendVideoNoteMethod
     */
    public static function create($chatId, $videoNote, array $data = null): SendVideoNoteMethod
    {
        $instance = new static();
        $instance->chatId = $chatId;
        $instance->videoNote = $videoNote;
        if ($data) {
            $instance->fill($data);
        }

        return $instance;
    }
}
