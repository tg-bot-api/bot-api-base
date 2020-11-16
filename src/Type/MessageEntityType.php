<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type;

use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;

/**
 * Class MessageEntityType.
 *
 * @see https://core.telegram.org/bots/api#messageentity
 */
class MessageEntityType
{
    use FillFromArrayTrait;

    public const TYPE_MENTION = 'mention';
    public const TYPE_HASHTAG = 'hashtag';
    public const TYPE_CASH_TAG = 'cashtag';
    public const TYPE_BOT_COMMAND = 'bot_command';
    public const TYPE_URL = 'url';
    public const TYPE_EMAIL = 'email';
    public const TYPE_PHONE_NUMBER = 'phone_number';
    public const TYPE_BOLD = 'bold';
    public const TYPE_ITALIC = 'italic';
    public const TYPE_UNDERLINE = 'underline';
    public const TYPE_STRIKETHROUGH = 'strikethrough';
    public const TYPE_CODE = 'code';
    public const TYPE_PRE = 'pre';
    public const TYPE_TEXT_LINK = 'text_link';
    public const TYPE_TEXT_MENTION = 'text_mention';

    /**
     * Type of the entity. Can be “mention” (@username), “hashtag” (#hashtag), “cashtag” ($USD),
     * “bot_command” (/start@jobs_bot), “url” (https://telegram.org), “email” (do-not-reply@telegram.org),
     * “phone_number” (+1-212-555-0123), “bold” (bold text), “italic” (italic text), “underline” (underlined text),
     * “strikethrough” (strikethrough text), “code” (monowidth string), “pre” (monowidth block),
     * “text_link” (for clickable text URLs), “text_mention” (for users without usernames).
     *
     * @var string
     */
    public $type;

    /**
     * Offset in UTF-16 code units to the start of the entity.
     *
     * @var int
     */
    public $offset;

    /**
     * Length of the entity in UTF-16 code units.
     *
     * @var int
     */
    public $length;

    /**
     * Optional. For “text_link” only, url that will be opened after user taps on the text.
     *
     * @var string|null
     */
    public $url;

    /**
     * Optional. For “text_mention” only, the mentioned user.
     *
     * @var UserType|null
     */
    public $user;

    /**
     * Optional. For “pre” only, the programming language of the entity text.
     *
     * @var string|null
     */
    public $language;

    public static function create(string $type, int $offset, int $length, array $data = null): MessageEntityType
    {
        $instance = new static();
        $instance->type = $type;
        $instance->offset = $offset;
        $instance->length = $length;

        if (!empty($data)) {
            $instance->fill($data);
        }

        return $instance;
    }
}
