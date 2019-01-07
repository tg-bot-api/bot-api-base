<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type\InlineQueryResult;

use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;
use TgBotApi\BotApiBase\Type\InputMessageContent\InputMessageContentType;

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
     * @param string                  $id
     * @param string                  $title
     * @param InputMessageContentType $inputMessageContent
     * @param array|null              $data
     *
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     *
     * @return InlineQueryResultArticleType
     */
    public static function create(
        string $id,
        string $title,
        InputMessageContentType $inputMessageContent,
        array $data = null
    ): InlineQueryResultArticleType {
        $instance = new static();
        $instance->type = self::TYPE_ARTICLE;
        $instance->id = $id;
        $instance->title = $title;
        $instance->inputMessageContent = $inputMessageContent;
        if ($data) {
            $instance->fill($data);
        }

        return $instance;
    }
}
