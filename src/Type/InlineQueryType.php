<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type;

/**
 * Class InlineQueryType.
 *
 * @see https://core.telegram.org/bots/api#inline-mode
 */
class InlineQueryType
{
    /**
     * Unique identifier for this query.
     *
     * @var string
     */
    public $id;

    /**
     * Sender.
     *
     * @var UserType
     */
    public $from;

    /**
     * Optional. Sender location, only for bots that request user location.
     *
     * @var LocationType|null
     */
    public $location;

    /**
     * Text of the query (up to 512 characters).
     *
     * @var string
     */
    public $query;

    /**
     * Offset of the results to be returned, can be controlled by the bot.
     *
     * @var string
     */
    public $offset;
}
