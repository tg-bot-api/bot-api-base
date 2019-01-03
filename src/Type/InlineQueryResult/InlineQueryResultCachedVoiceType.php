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
     * @param string     $id
     * @param string     $voiceFileId
     * @param string     $title
     * @param array|null $data
     *
     * @throws \Greenplugin\TelegramBot\Exception\BadArgumentException
     *
     * @return InlineQueryResultCachedVoiceType
     */
    public static function create(
        string $id,
        string $voiceFileId,
        string $title,
        array $data = null
    ): InlineQueryResultCachedVoiceType {
        $instance = new static();
        $instance->type = static::TYPE_VOICE;
        $instance->id = $id;
        $instance->title = $title;
        $instance->voiceFileId = $voiceFileId;
        if ($data) {
            $instance->fill($data);
        }

        return $instance;
    }
}
