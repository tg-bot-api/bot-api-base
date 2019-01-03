<?php

declare(strict_types=1);

namespace Greenplugin\TelegramBot\Type\InlineQueryResult;

use Greenplugin\TelegramBot\Method\Interfaces\HasParseModeVariableInterface;
use Greenplugin\TelegramBot\Method\Traits\FillFromArrayTrait;
use Greenplugin\TelegramBot\Type\InputMessageContent\InputMessageContentType;

/**
 * Class InlineQueryResultCachedAudioType.
 *
 * @see https://core.telegram.org/bots/api#inlinequeryresultcachedaudio
 */
class InlineQueryResultCachedAudioType extends InlineQueryResultType implements HasParseModeVariableInterface
{
    use FillFromArrayTrait;

    /**
     * A valid file identifier for the audio file.
     *
     * @var string
     */
    public $audioFileId;

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
     * Optional. Content of the message to be sent instead of the audio.
     *
     * @var InputMessageContentType|null
     */
    public $inputMessageContent;

    /**
     * @param string     $id
     * @param string     $audioFileId
     * @param array|null $data
     *
     * @throws \Greenplugin\TelegramBot\Exception\BadArgumentException
     *
     * @return InlineQueryResultCachedAudioType
     */
    public static function create(string $id, string $audioFileId, array $data = null): InlineQueryResultCachedAudioType
    {
        $instance = new static();
        $instance->type = self::TYPE_AUDIO;
        $instance->id = $id;
        $instance->audioFileId = $audioFileId;
        if ($data) {
            $instance->fill($data);
        }

        return $instance;
    }
}
