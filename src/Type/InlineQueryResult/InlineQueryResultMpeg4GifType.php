<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type\InlineQueryResult;

use TgBotApi\BotApiBase\Method\Interfaces\HasParseModeVariableInterface;
use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;
use TgBotApi\BotApiBase\Type\InputMessageContent\InputMessageContentType;
use TgBotApi\BotApiBase\Type\Traits\CaptionEntitiesFieldTrait;

/**
 * Class InlineQueryResultMpeg4GifType.
 *
 * @see https://core.telegram.org/bots/api#inlinequeryresultmpeg4gif
 */
class InlineQueryResultMpeg4GifType extends InlineQueryResultType implements HasParseModeVariableInterface
{
    use CaptionEntitiesFieldTrait;
    use FillFromArrayTrait;

    /**
     * A valid URL for the MP4 file. File size must not exceed 1MB.
     *
     * @var string
     */
    public $mpeg4Url;

    /**
     * Optional. Video width.
     *
     * @var int|null
     */
    public $mpeg4Width;

    /**
     * Optional. Video height.
     *
     * @var int|null
     */
    public $mpeg4Height;

    /**
     * Optional. Video duration.
     *
     * @var int|null
     */
    public $mpeg4Duration;

    /**
     * URL of the static (JPEG or GIF) or animated (MPEG4) thumbnail for the result.
     *
     * @var string
     */
    public $thumbUrl;

    /**
     * Optional. Title for the result.
     *
     * @var string|null
     */
    public $title;

    /**
     * Optional. Caption of the GIF file to be sent, 0-1024 characters.
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
     * Optional. Content of the message to be sent instead of the GIF animation.
     *
     * @var InputMessageContentType|null
     */
    public $inputMessageContent;

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public static function create(
        string $id,
        string $mpeg4Url,
        string $thumbUrl,
        array $data = null
    ): InlineQueryResultMpeg4GifType {
        $instance = new static();
        $instance->type = static::TYPE_MPEG4GIF;
        $instance->id = $id;
        $instance->mpeg4Url = $mpeg4Url;
        $instance->thumbUrl = $thumbUrl;
        if ($data) {
            $instance->fill($data);
        }

        return $instance;
    }
}
