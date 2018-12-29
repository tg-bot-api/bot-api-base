<?php

declare(strict_types=1);

namespace Greenplugin\TelegramBot\Type\InlineQueryResult;

use Greenplugin\TelegramBot\Method\Interfaces\HasParseModeVariableInterface;
use Greenplugin\TelegramBot\Method\Traits\FillFromArrayTrait;
use Greenplugin\TelegramBot\Type\InputMessageContent\InputMessageContentType;

/**
 * Class InlineQueryResultCachedMpeg4GifType.
 *
 * @see https://core.telegram.org/bots/api#inlinequeryresultcachedmpeg4gif
 */
class InlineQueryResultCachedMpeg4GifType extends InlineQueryResultType implements HasParseModeVariableInterface
{
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
     * InlineQueryResultCachedMpeg4GifType constructor.
     *
     * @param string     $id
     * @param string     $mpeg4FileId
     * @param array|null $data
     *
     * @throws \Greenplugin\TelegramBot\Exception\BadArgumentException
     */
    public function __construct(string $id, string $mpeg4FileId, array $data = null)
    {
        $this->type = self::TYPE_MPEG4GIF;
        $this->id = $id;
        $this->mpeg4FileId = $mpeg4FileId;
        if ($data) {
            $this->fill($data);
        }
    }
}
