<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type;

/**
 * Class ChosenInlineResultType.
 *
 * @see https://core.telegram.org/bots/api#choseninlineresult
 */
class ChosenInlineResultType
{
    /**
     * The unique identifier for the result that was chosen.
     *
     * @var string
     */
    public $resultId;

    /**
     * The user that chose the result.
     *
     * @var UserType
     */
    public $from;

    /**
     * Optional. Sender location, only for bots that require user location.
     *
     * @var LocationType|null
     */
    public $location;

    /**
     * Optional. Identifier of the sent inline message.
     * Available only if there is an inline keyboard attached to the message.
     * Will be also received in callback queries and can be used to edit the message.
     *
     * @var string|null
     */
    public $inlineMessageId;

    /**
     * The query that was used to obtain the result.
     *
     * @var string
     */
    public $query;
}
