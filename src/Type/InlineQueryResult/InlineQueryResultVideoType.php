<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type\InlineQueryResult;

use TgBotApi\BotApiBase\Method\Interfaces\HasParseModeVariableInterface;
use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;
use TgBotApi\BotApiBase\Type\InputMessageContent\InputMessageContentType;
use TgBotApi\BotApiBase\Type\Traits\CaptionEntitiesFieldTrait;

/**
 * Class InlineQueryResultVideoType
 * Represents a link to a page containing an embedded video player or a video file.
 * By default, this video file will be sent by the user with an optional caption.
 * Alternatively, you can use input_message_content to send a message with the specified content instead of the video.
 *
 * If an InlineQueryResultVideo message contains an embedded video (e.g., YouTube),
 * you must replace its content using inputMessageContent.
 *
 * @see https://core.telegram.org/bots/api#inlinequeryresultvideo
 */
class InlineQueryResultVideoType extends InlineQueryResultType implements HasParseModeVariableInterface
{
    use CaptionEntitiesFieldTrait;
    use FillFromArrayTrait;

    public const MIME_TYPE_TEXT = 'text/html';
    public const MIME_TYPE_VIDEO = 'video/mp4';

    /**
     * A valid URL for the embedded video player or video file.
     *
     * @var string
     */
    public $video;

    /**
     * Mime type of the content of video url, “text/html” or “video/mp4”.
     *
     * @var string
     */
    public $mimeType;

    /**
     * URL of the thumbnail (jpeg only) for the video;.
     *
     * @var string
     */
    public $thumbUrl;

    /**
     * Title for the result.
     *
     * @var string
     */
    public $title;

    /**
     * Optional. Caption of the video to be sent, 0-1024 characters.
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
     * Optional. Video width.
     *
     * @var int|null
     */
    public $videoWidth;

    /**
     * Optional. Video height.
     *
     * @var int|null
     */
    public $videoHeight;

    /**
     * Optional. Video duration in seconds.
     *
     * @var int|null
     */
    public $videoDuration;

    /**
     * Optional. Short description of the result.
     *
     * @var string|null
     */
    public $description;

    /**
     * Optional. Content of the message to be sent instead of the video.
     * This field is required if InlineQueryResultVideo is used to send an HTML-page as a result
     * (e.g., a YouTube video).
     *
     * @var InputMessageContentType|null
     */
    public $inputMessageContent;

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public static function create(
        string $id,
        string $video,
        string $mimeType,
        string $thumbUrl,
        string $title,
        array $data = null
    ): InlineQueryResultVideoType {
        $instance = new static();
        $instance->type = static::TYPE_VIDEO;
        $instance->id = $id;
        $instance->video = $video;
        $instance->mimeType = $mimeType;
        $instance->thumbUrl = $thumbUrl;
        $instance->title = $title;
        if ($data) {
            $instance->fill($data);
        }

        return $instance;
    }
}
