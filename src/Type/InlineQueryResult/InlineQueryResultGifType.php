<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type\InlineQueryResult;

use TgBotApi\BotApiBase\Method\Interfaces\HasParseModeVariableInterface;
use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;
use TgBotApi\BotApiBase\Type\InputMessageContent\InputMessageContentType;
use TgBotApi\BotApiBase\Type\Traits\CaptionEntitiesFieldTrait;

/**
 * Class InlineQueryResultGifType.
 *
 * @see https://core.telegram.org/bots/api#inlinequeryresultgif
 */
class InlineQueryResultGifType extends InlineQueryResultType implements HasParseModeVariableInterface
{
    use CaptionEntitiesFieldTrait;
    use FillFromArrayTrait;

    /**
     * A valid URL for the GIF file. File size must not exceed 1MB.
     *
     * @var string
     */
    public $gifUrl;

    /**
     * Optional. Width of the GIF.
     *
     * @var int|string
     */
    public $gifWidth;

    /**
     * Optional. Height of the GIF.
     *
     * @var int|null
     */
    public $gifHeight;

    /**
     * Optional. Duration of the GIF.
     *
     * @var int|null
     */
    public $gifDuration;

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
        string $gifUrl,
        string $thumbUrl,
        array $data = null
    ): InlineQueryResultGifType {
        $instance = new static();
        $instance->type = static::TYPE_GIF;
        $instance->id = $id;
        $instance->gifUrl = $gifUrl;
        $instance->thumbUrl = $thumbUrl;
        if ($data) {
            $instance->fill($data);
        }

        return $instance;
    }
}
