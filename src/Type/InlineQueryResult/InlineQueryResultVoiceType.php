<?php

declare(strict_types=1);

namespace Greenplugin\TelegramBot\Type\InlineQueryResult;

use Greenplugin\TelegramBot\Method\Interfaces\HasParseModeVariableInterface;
use Greenplugin\TelegramBot\Method\Traits\FillFromArrayTrait;
use Greenplugin\TelegramBot\Type\InputMessageContent\InputMessageContentType;

/**
 * Class InlineQueryResultVoiceType.
 *
 * @see https://core.telegram.org/bots/api#inlinequeryresultvoice
 */
class InlineQueryResultVoiceType extends InlineQueryResultType implements HasParseModeVariableInterface
{
    use FillFromArrayTrait;

    /**
     * A valid URL for the voice recording.
     *
     * @var string
     */
    public $voiceUrl;

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
     * Optional. Recording duration in seconds.
     *
     * @var int|null
     */
    public $voiceDuration;

    /**
     * Optional. Content of the message to be sent instead of the voice recording.
     *
     * @var InputMessageContentType|null
     */
    public $inputMessageContent;

    /**
     * InlineQueryResultVoiceType constructor.
     *
     * @param string     $id
     * @param string     $voiceUrl
     * @param string     $title
     * @param array|null $data
     *
     * @throws \Greenplugin\TelegramBot\Exception\BadArgumentException
     */
    public function __construct(string $id, string $voiceUrl, string $title, array $data = null)
    {
        $this->type = self::TYPE_VOICE;
        $this->id = $id;
        $this->voiceUrl = $voiceUrl;
        $this->title = $title;
        if ($data) {
            $this->fill($data);
        }
    }
}
