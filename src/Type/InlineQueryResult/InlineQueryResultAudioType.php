<?php

declare(strict_types=1);

namespace Greenplugin\TelegramBot\Type\InlineQueryResult;

use Greenplugin\TelegramBot\Method\Interfaces\HasParseModeVariableInterface;
use Greenplugin\TelegramBot\Method\Traits\FillFromArrayTrait;
use Greenplugin\TelegramBot\Type\InputMessageContent\InputMessageContentType;

/**
 * Class InlineQueryResultAudio.
 *
 * @see https://core.telegram.org/bots/api#inlinequeryresultaudio
 */
class InlineQueryResultAudioType extends InlineQueryResultType implements HasParseModeVariableInterface
{
    use FillFromArrayTrait;
    /**
     * A valid URL for the audio file.
     *
     * @var string
     */
    public $audioUrl;

    /**
     * Title.
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
     * Optional. Performer.
     *
     * @var string|null
     */
    public $performer;

    /**
     * Optional. Audio duration in seconds.
     *
     * @var int|null
     */
    public $audioDuration;

    /**
     * Optional. Content of the message to be sent instead of the audio.
     *
     * @var InputMessageContentType|null
     */
    public $inputMessageContent;

    /**
     * InlineQueryResultAudio constructor.
     *
     * @param string     $id
     * @param string     $audioUrl
     * @param string     $title
     * @param array|null $data
     *
     * @throws \Greenplugin\TelegramBot\Exception\BadArgumentException
     */
    public function __construct(
        string $id,
        string $audioUrl,
        string $title,
        array $data = null
    ) {
        $this->type = self::TYPE_AUDIO;
        $this->id = $id;
        $this->audioUrl = $audioUrl;
        $this->title = $title;
        if ($data) {
            $this->fill($data);
        }
    }
}
