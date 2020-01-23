<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type;

/**
 * Class MessageEntityType.
 *
 * @see https://core.telegram.org/bots/api#messageentity
 */
class MessageEntityType
{
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
}
