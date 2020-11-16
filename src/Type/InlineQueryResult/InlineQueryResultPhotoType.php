<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type\InlineQueryResult;

use TgBotApi\BotApiBase\Method\Interfaces\HasParseModeVariableInterface;
use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;
use TgBotApi\BotApiBase\Type\InputMessageContent\InputMessageContentType;
use TgBotApi\BotApiBase\Type\Traits\CaptionEntitiesFieldTrait;

/**
 * Class InlineQueryResultPhotoType.
 *
 * @see https://core.telegram.org/bots/api#inlinequeryresultphoto
 */
class InlineQueryResultPhotoType extends InlineQueryResultType implements HasParseModeVariableInterface
{
    use CaptionEntitiesFieldTrait;
    use FillFromArrayTrait;

    /**
     * A valid URL of the photo. Photo must be in jpeg format. Photo size must not exceed 5MB.
     *
     * @var string
     */
    public $photoUrl;

    /**
     * URL of the thumbnail for the photo.
     *
     * @var string
     */
    public $thumbUrl;

    /**
     * Optional. Width of the photo.
     *
     * @var int|null
     */
    public $photoWidth;

    /**
     * Optional. Height of the photo.
     *
     * @var int|null
     */
    public $photoHeight;

    /**
     * Optional. Title for the result.
     *
     * @var string|null
     */
    public $title;

    /**
     * Optional. Short description of the result.
     *
     * @var string|null
     */
    public $description;

    /**
     * Optional. Caption of the photo to be sent, 0-1024 characters.
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
     * Optional. Content of the message to be sent instead of the photo.
     *
     * @var InputMessageContentType|null
     */
    public $inputMessageContent;

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public static function create(
        string $id,
        string $photoUrl,
        string $thumbUrl,
        array $data = null
    ): InlineQueryResultPhotoType {
        $instance = new static();
        $instance->type = static::TYPE_PHOTO;
        $instance->id = $id;
        $instance->photoUrl = $photoUrl;
        $instance->thumbUrl = $thumbUrl;
        if ($data) {
            $instance->fill($data);
        }

        return $instance;
    }
}
