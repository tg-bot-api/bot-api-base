<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type\InlineQueryResult;

use TgBotApi\BotApiBase\Type\InlineKeyboardMarkupType;

/**
 * Class InlineQueryResult.
 *
 * @see https://core.telegram.org/bots/api#inlinequeryresult
 */
abstract class InlineQueryResultType
{
    public const TYPE_ARTICLE = 'article';
    public const TYPE_PHOTO = 'photo';
    public const TYPE_GIF = 'gif';
    public const TYPE_MPEG4GIF = 'mpeg4_gif';
    public const TYPE_VIDEO = 'video';
    public const TYPE_AUDIO = 'audio';
    public const TYPE_VOICE = 'voice';
    public const TYPE_DOCUMENT = 'document';
    public const TYPE_LOCATION = 'location';
    public const TYPE_VENUE = 'venue';
    public const TYPE_CONTACT = 'contact';
    public const TYPE_GAME = 'game';
    public const TYPE_STICKER = 'sticker';

    /**
     * Unique identifier for this result, 1-64 bytes.
     *
     * @var string
     */
    public $id;

    /**
     * Optional. Inline keyboard attached to the message.
     *
     * @var InlineKeyboardMarkupType|null
     */
    public $replyMarkup;

    /**
     * Type of the result.
     *
     * @var string
     */
    public $type;
}
