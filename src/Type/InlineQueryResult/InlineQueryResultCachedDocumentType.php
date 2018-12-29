<?php

declare(strict_types=1);

namespace Greenplugin\TelegramBot\Type\InlineQueryResult;

use Greenplugin\TelegramBot\Method\Traits\FillFromArrayTrait;
use Greenplugin\TelegramBot\Type\InputMessageContent\InputMessageContentType;

/**
 * Class InlineQueryResultCachedDocumentType.
 *
 * @see https://core.telegram.org/bots/api#inlinequeryresultcacheddocument
 */
class InlineQueryResultCachedDocumentType extends InlineQueryResultType
{
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
     * InlineQueryResultCachedDocumentType constructor.
     *
     * @param string     $id
     * @param string     $title
     * @param string     $documentFileId
     * @param array|null $data
     *
     * @throws \Greenplugin\TelegramBot\Exception\BadArgumentException
     */
    public function __construct(string $id, string $title, string $documentFileId, array $data = null)
    {
        $this->type = self::TYPE_DOCUMENT;
        $this->id = $id;
        $this->title = $title;
        $this->documentFileId = $documentFileId;
        if ($data) {
            $this->fill($data);
        }
    }
}
