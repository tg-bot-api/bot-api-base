<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type\InputMedia;

use TgBotApi\BotApiBase\Type\InputFileType;
use TgBotApi\BotApiBase\Type\Traits\CaptionEntitiesFieldTrait;

/**
 * Class InputMediaType.
 *
 * @see https://core.telegram.org/bots/api#inputmedia
 */
abstract class InputMediaType
{
    use CaptionEntitiesFieldTrait;

    public const TYPE_PHOTO = 'photo';
    public const TYPE_VIDEO = 'video';
    public const TYPE_ANIMATION = 'animation';
    public const TYPE_AUDIO = 'audio';
    public const TYPE_DOCUMENT = 'document';

    /**
     * File to send. Pass a file_id to send a file that exists on the Telegram servers (recommended),
     * pass an HTTP URL for Telegram to get a file from the Internet, or pass “attach://<file_attach_name>”
     * to upload a new one using multipart/form-data under <file_attach_name> name.
     *
     * @see https://core.telegram.org/bots/api#sending-files
     *
     * @var string|InputFileType
     */
    public $media;

    /**
     * Optional. Caption of the media to be sent, 0-1024 characters.
     *
     * @var string|null
     */
    public $caption;

    /**
     * Optional. Send Markdown or HTML, if you want Telegram apps to show bold, italic,
     * fixed-width text or inline URLs in the media caption.
     *
     * @var string|null
     */
    public $parseMode;

    /**
     * Type of the result, must be photo.
     *
     * @var string
     */
    public $type;
}
