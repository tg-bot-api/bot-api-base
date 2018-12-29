<?php

declare(strict_types=1);

namespace Greenplugin\TelegramBot\Type\InlineQueryResult;

use Greenplugin\TelegramBot\Method\Interfaces\HasParseModeVariableInterface;
use Greenplugin\TelegramBot\Method\Traits\FillFromArrayTrait;
use Greenplugin\TelegramBot\Type\InputMessageContent\InputMessageContentType;

/**
 * Class InlineQueryResultPhotoType.
 *
 * @see https://core.telegram.org/bots/api#inlinequeryresultphoto
 */
class InlineQueryResultPhotoType extends InlineQueryResultType implements HasParseModeVariableInterface
{
    use FillFromArrayTrait;
    /**
     * A valid URL of the photo. Photo must be in jpeg format. Photo size must not exceed 5MB.
     *
     * @var string
     */
    public $photoUrl;

    /**
     * URL of the thumbnail for the photo.
     *
     * @var string
     */
    public $thumbUrl;

    /**
     * Optional. Width of the photo.
     *
     * @var int|null
     */
    public $photoWidth;

    /**
     * Optional. Height of the photo.
     *
     * @var int|null
     */
    public $photoHeight;

    /**
     * Optional. Title for the result.
     *
     * @var string|null
     */
    public $title;

    /**
     * Optional. Short description of the result.
     *
     * @var string|null
     */
    public $description;

    /**
     * Optional. Caption of the photo to be sent, 0-1024 characters.
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
     * Optional. Content of the message to be sent instead of the photo.
     *
     * @var InputMessageContentType|null
     */
    public $inputMessageContent;

    /**
     * InlineQueryResultArticleType constructor.
     *
     * @param string     $id
     * @param string     $thumbUrl
     * @param string     $photoUrl
     * @param array|null $data
     *
     * @throws \Greenplugin\TelegramBot\Exception\BadArgumentException
     */
    public function __construct(
        string $id,
        string $photoUrl,
        string $thumbUrl,
        array $data = null
    ) {
        $this->type = self::TYPE_PHOTO;
        $this->id = $id;
        $this->photoUrl = $photoUrl;
        $this->thumbUrl = $thumbUrl;
        if ($data) {
            $this->fill($data);
        }
    }
}
