<?php

declare(strict_types=1);

namespace Greenplugin\TelegramBot\Type\InlineQueryResult;

use Greenplugin\TelegramBot\Method\Interfaces\HasParseModeVariableInterface;
use Greenplugin\TelegramBot\Method\Traits\FillFromArrayTrait;
use Greenplugin\TelegramBot\Type\InputMessageContent\InputMessageContentType;

/**
 * Class InlineQueryResultCachedVoiceType.
 *
 * @see https://core.telegram.org/bots/api#inlinequeryresultcachedvoice
 */
class InlineQueryResultCachedVoiceType extends InlineQueryResultType implements HasParseModeVariableInterface
{
    use FillFromArrayTrait;

    /**
     * A valid file identifier for the voice message.
     *
     * @var string
     */
    public $voiceFileId;

    /**
     * Recording title.
     *
     * @var string
     */
    public $title;

    /**
     * Optional. Caption, 0-1024 characters.
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
     * Optional. Content of the message to be sent instead of the voice recording.
     *
     * @var InputMessageContentType|null
     */
    public $inputMessageContent;

    /**
     * InlineQueryResultCachedVoiceType constructor.
     *
     * @param string     $id
     * @param string     $voiceFileId
     * @param string     $title
     * @param array|null $data
     *
     * @throws \Greenplugin\TelegramBot\Exception\BadArgumentException
     */
    public function __construct(string $id, string $voiceFileId, string $title, array $data = null)
    {
        $this->type = self::TYPE_VOICE;
        $this->id = $id;
        $this->title = $title;
        $this->voiceFileId = $voiceFileId;
        if ($data) {
            $this->fill($data);
        }
    }
}
