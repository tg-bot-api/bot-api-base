<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type\InlineQueryResult;

use TgBotApi\BotApiBase\Method\Interfaces\HasParseModeVariableInterface;
use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;
use TgBotApi\BotApiBase\Type\InputMessageContent\InputMessageContentType;
use TgBotApi\BotApiBase\Type\Traits\CaptionEntitiesFieldTrait;

/**
 * Class InlineQueryResultCachedMpeg4GifType.
 *
 * @see https://core.telegram.org/bots/api#inlinequeryresultcachedmpeg4gif
 */
class InlineQueryResultCachedMpeg4GifType extends InlineQueryResultType implements HasParseModeVariableInterface
{
    use CaptionEntitiesFieldTrait;
    use FillFromArrayTrait;

    /**
     * A valid file identifier for the MP4 file.
     *
     * @var string
     */
    public $mpeg4FileId;

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
        string $mpeg4FileId,
        array $data = null
    ): InlineQueryResultCachedMpeg4GifType {
        $instance = new static();
        $instance->type = static::TYPE_MPEG4GIF;
        $instance->id = $id;
        $instance->mpeg4FileId = $mpeg4FileId;
        if ($data) {
            $instance->fill($data);
        }

        return $instance;
    }
}
