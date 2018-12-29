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
     * InlineQueryResultCachedStickerType constructor.
     *
     * @param string     $id
     * @param string     $stickerFileId
     * @param array|null $data
     *
     * @throws \Greenplugin\TelegramBot\Exception\BadArgumentException
     */
    public function __construct(string $id, string $stickerFileId, array $data = null)
    {
        $this->type = self::TYPE_STICKER;
        $this->id = $id;
        $this->stickerFileId = $stickerFileId;
        if ($data) {
            $this->fill($data);
        }
    }
}
