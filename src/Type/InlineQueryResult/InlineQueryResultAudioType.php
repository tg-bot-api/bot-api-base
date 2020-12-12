<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type\InlineQueryResult;

use TgBotApi\BotApiBase\Method\Interfaces\HasParseModeVariableInterface;
use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;
use TgBotApi\BotApiBase\Type\InputMessageContent\InputMessageContentType;
use TgBotApi\BotApiBase\Type\Traits\CaptionEntitiesFieldTrait;

/**
 * Class InlineQueryResultAudio.
 *
 * @see https://core.telegram.org/bots/api#inlinequeryresultaudio
 */
class InlineQueryResultAudioType extends InlineQueryResultType implements HasParseModeVariableInterface
{
    use CaptionEntitiesFieldTrait;
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
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public static function create(
        string $id,
        string $audioUrl,
        string $title,
        array $data = null
    ): InlineQueryResultAudioType {
        $instance = new static();
        $instance->type = self::TYPE_AUDIO;
        $instance->id = $id;
        $instance->audioUrl = $audioUrl;
        $instance->title = $title;
        if ($data) {
            $instance->fill($data);
        }

        return $instance;
    }
}
