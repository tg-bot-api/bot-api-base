<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type\InlineQueryResult;

use TgBotApi\BotApiBase\Method\Interfaces\HasParseModeVariableInterface;
use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;
use TgBotApi\BotApiBase\Type\InputMessageContent\InputMessageContentType;
use TgBotApi\BotApiBase\Type\Traits\CaptionEntitiesFieldTrait;

/**
 * Class InlineQueryResultCachedGifType.
 *
 * Represents a link to an animated GIF file stored on the Telegram servers.
 * By default, this animated GIF file will be sent by the user with an optional caption.
 * Alternatively, you can use input_message_content to send a message with specified content instead of the animation.
 *
 * @see https://core.telegram.org/bots/api#inlinequeryresultcachedgif
 */
class InlineQueryResultCachedGifType extends InlineQueryResultType implements HasParseModeVariableInterface
{
    use CaptionEntitiesFieldTrait;
    use FillFromArrayTrait;

    /**
     * A valid file identifier for the GIF file.
     *
     * @var string
     */
    public $gifFileId;

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
    public static function create(string $id, string $gifFileId, array $data = null): InlineQueryResultCachedGifType
    {
        $instance = new static();
        $instance->type = static::TYPE_GIF;
        $instance->id = $id;
        $instance->gifFileId = $gifFileId;
        if ($data) {
            $instance->fill($data);
        }

        return $instance;
    }
}
