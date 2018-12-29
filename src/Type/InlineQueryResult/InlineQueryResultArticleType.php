<?php

declare(strict_types=1);

namespace Greenplugin\TelegramBot\Type\InlineQueryResult;

use Greenplugin\TelegramBot\Method\Traits\FillFromArrayTrait;
use Greenplugin\TelegramBot\Type\InputMessageContent\InputMessageContentType;

/**
 * Class InlineQueryResultArticleType.
 *
 * @see https://core.telegram.org/bots/api#inlinequeryresultarticle
 */
class InlineQueryResultArticleType extends InlineQueryResultType
{
    use FillFromArrayTrait;
    /**
     * Title of the result.
     *
     * @var string
     */
    public $title;

    /**
     * Content of the message to be sent.
     *
     * @var InputMessageContentType
     */
    public $inputMessageContent;

    /**
     * Optional. URL of the result.
     *
     * @var string|null
     */
    public $url;

    /**
     * Optional. Pass True, if you don't want the URL to be shown in the message.
     *
     * @var bool|null
     */
    public $hideUrl;

    /**
     * Optional. Short description of the result.
     *
     * @var string|null
     */
    public $description;

    /**
     * Optional. Url of the thumbnail for the result.
     *
     * @var string|null
     */
    public $thumbUrl;

    /**
     * Optional. Thumbnail width.
     *
     * @var int|null
     */
    public $thumbWidth;

    /**
     * Optional. Thumbnail height.
     *
     * @var int|null
     */
    public $thumbHeight;

    /**
     * InlineQueryResultArticleType constructor.
     *
     * @param string                  $id
     * @param string                  $title
     * @param InputMessageContentType $inputMessageContent
     * @param array|null              $data
     *
     * @throws \Greenplugin\TelegramBot\Exception\BadArgumentException
     */
    public function __construct(
        string $id,
        string $title,
        InputMessageContentType $inputMessageContent,
        array $data = null
    ) {
        $this->type = self::TYPE_ARTICLE;
        $this->id = $id;
        $this->title = $title;
        $this->inputMessageContent = $inputMessageContent;
        if ($data) {
            $this->fill($data);
        }
    }
}
