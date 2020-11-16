<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type\InlineQueryResult;

use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;
use TgBotApi\BotApiBase\Type\InputMessageContent\InputMessageContentType;
use TgBotApi\BotApiBase\Type\Traits\CaptionEntitiesFieldTrait;

/**
 * Class InlineQueryResultCachedDocumentType.
 *
 * @see https://core.telegram.org/bots/api#inlinequeryresultcacheddocument
 */
class InlineQueryResultCachedDocumentType extends InlineQueryResultType
{
    use CaptionEntitiesFieldTrait;
    use FillFromArrayTrait;

    /**
     * Title for the result;.
     *
     * @var string
     */
    public $title;

    /**
     * A valid file identifier for the file.
     *
     * @var string
     */
    public $documentFileId;

    /**
     * Optional. Caption of the document to be sent, 0-1024 characters.
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
     * Optional. Short description of the result.
     *
     * @var string|null
     */
    public $description;

    /**
     * Optional. Content of the message to be sent instead of the file.
     *
     * @var InputMessageContentType|null
     */
    public $inputMessageContent;

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public static function create(
        string $id,
        string $title,
        string $documentFileId,
        array $data = null
    ): InlineQueryResultCachedDocumentType {
        $instance = new static();
        $instance->type = static::TYPE_DOCUMENT;
        $instance->id = $id;
        $instance->title = $title;
        $instance->documentFileId = $documentFileId;
        if ($data) {
            $instance->fill($data);
        }

        return $instance;
    }
}
