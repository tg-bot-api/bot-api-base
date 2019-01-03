<?php

declare(strict_types=1);

namespace Greenplugin\TelegramBot\Type\InlineQueryResult;

use Greenplugin\TelegramBot\Method\Traits\FillFromArrayTrait;
use Greenplugin\TelegramBot\Type\InputMessageContent\InputMessageContentType;

/**
 * Class InlineQueryResultCachedStickerType.
 *
 * @see https://core.telegram.org/bots/api#inlinequeryresultcachedsticker
 */
class InlineQueryResultCachedStickerType extends InlineQueryResultType
{
    use FillFromArrayTrait;

    /**
     * A valid file identifier of the sticker.
     *
     * @var string
     */
    public $stickerFileId;

    /**
     * Optional. Content of the message to be sent instead of the sticker.
     *
     * @var InputMessageContentType|null
     */
    public $inputMessageContent;

    /**
     * @param string     $id
     * @param string     $stickerFileId
     * @param array|null $data
     *
     * @throws \Greenplugin\TelegramBot\Exception\BadArgumentException
     *
     * @return InlineQueryResultCachedStickerType
     */
    public static function create(
        string $id,
        string $stickerFileId,
        array $data = null
    ): InlineQueryResultCachedStickerType {
        $instance = new static();
        $instance->type = static::TYPE_STICKER;
        $instance->id = $id;
        $instance->stickerFileId = $stickerFileId;
        if ($data) {
            $instance->fill($data);
        }

        return $instance;
    }
}
