<?php

declare(strict_types=1);

namespace Greenplugin\TelegramBot\Type\InlineQueryResult;

use Greenplugin\TelegramBot\Method\Interfaces\HasParseModeVariableInterface;
use Greenplugin\TelegramBot\Method\Traits\FillFromArrayTrait;
use Greenplugin\TelegramBot\Type\InputMessageContent\InputMessageContentType;

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
    use FillFromArrayTrait;
    const MIME_TYPE_TEXT = 'text/html';
    const MIME_TYPE_VIDEO = 'video/mp4';

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
     * InlineQueryResultVideoType constructor.
     *
     * @param string     $id
     * @param string     $video
     * @param string     $mimeType
     * @param string     $thumbUrl
     * @param string     $title
     * @param array|null $data
     *
     * @throws \Greenplugin\TelegramBot\Exception\BadArgumentException
     */
    public function __construct(
        string $id,
        string $video,
        string $mimeType,
        string $thumbUrl,
        string $title,
        array $data = null
    ) {
        $this->type = self::TYPE_VIDEO;
        $this->id = $id;
        $this->video = $video;
        $this->mimeType = $mimeType;
        $this->thumbUrl = $thumbUrl;
        $this->title = $title;
        if ($data) {
            $this->fill($data);
        }
    }
}
