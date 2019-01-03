<?php

declare(strict_types=1);

namespace Greenplugin\TelegramBot\Type\InlineQueryResult;

use Greenplugin\TelegramBot\Method\Interfaces\HasParseModeVariableInterface;
use Greenplugin\TelegramBot\Method\Traits\FillFromArrayTrait;
use Greenplugin\TelegramBot\Type\InputMessageContent\InputMessageContentType;

/**
 * Class InlineQueryResultGifType.
 *
 * @see https://core.telegram.org/bots/api#inlinequeryresultgif
 */
class InlineQueryResultGifType extends InlineQueryResultType implements HasParseModeVariableInterface
{
    use FillFromArrayTrait;

    /**
     * A valid URL for the GIF file. File size must not exceed 1MB.
     *
     * @var string
     */
    public $gifUrl;

    /**
     * Optional. Width of the GIF.
     *
     * @var int|string
     */
    public $gifWidth;

    /**
     * Optional. Height of the GIF.
     *
     * @var int|null
     */
    public $gifHeight;

    /**
     * Optional. Duration of the GIF.
     *
     * @var int|null
     */
    public $gifDuration;

    /**
     * URL of the static thumbnail for the result (jpeg or gif).
     *
     * @var string
     */
    public $thumbUrl;

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
     * @param string     $id
     * @param string     $gifUrl
     * @param string     $thumbUrl
     * @param array|null $data
     *
     * @throws \Greenplugin\TelegramBot\Exception\BadArgumentException
     *
     * @return InlineQueryResultGifType
     */
    public static function create(
        string $id,
        string $gifUrl,
        string $thumbUrl,
        array $data = null
    ): InlineQueryResultGifType {
        $instance = new static();
        $instance->type = static::TYPE_GIF;
        $instance->id = $id;
        $instance->gifUrl = $gifUrl;
        $instance->thumbUrl = $thumbUrl;
        if ($data) {
            $instance->fill($data);
        }

        return $instance;
    }
}
