<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type;

/**
 * Class UpdateType.
 *
 * @see https://core.telegram.org/bots/api#update
 */
class UpdateType
{
    /**
     * The update‘s unique identifier. Update identifiers start from a certain positive number and increase
     * sequentially. This ID becomes especially handy if you’re using Webhooks, since it allows you to ignore
     * repeated updates or to restore the correct update sequence, should they get out of order. If there are
     * no new updates for at least a week, then identifier of the next update will be chosen randomly instead
     * of sequentially.
     *
     * @var int
     */
    public $updateId;

    /**
     * Optional. New incoming message of any kind — text, photo, sticker, etc.
     *
     * @var MessageType|null
     */
    public $message;

    /**
     * Optional. New version of a message that is known to the bot and was edited.
     *
     * @var MessageType|null
     */
    public $editedMessage;

    /**
     * Optional. New incoming channel post of any kind — text, photo, sticker, etc.
     *
     * @var MessageType|null
     */
    public $channelPost;

    /**
     * Optional. New version of a channel post that is known to the bot and was edited.
     *
     * @var MessageType|null
     */
    public $editedChannelPost;

    /**
     * @see https://core.telegram.org/bots/api#inline-mode
     * Optional. New incoming inline query
     *
     * @var InlineQueryType|null
     */
    public $inlineQuery;

    /**
     * @see https://core.telegram.org/bots/api#inline-mode
     * @see https://core.telegram.org/bots/inline#collecting-feedback
     * Optional. The result of an inline query that was chosen by a user and sent to their chat partner.
     * Please see our documentation on the feedback collecting for details on how to enable these updates for your bot.
     *
     * @var ChosenInlineResultType|null
     */
    public $chosenInlineResult;

    /**
     * Optional. New incoming callback query.
     *
     * @var CallbackQueryType|null
     */
    public $callbackQuery;

    /**
     * Optional. New incoming shipping query. Only for invoices with flexible price.
     *
     * @var ShippingQueryType|null
     */
    public $shippingQuery;

    /**
     * Optional. New incoming pre-checkout query. Contains full information about checkout.
     *
     * @var PreCheckoutQueryType|null
     */
    public $preCheckoutQuery;

    /**
     * Optional. New poll state. Bots receive only updates about polls, which are sent or stopped by the bot.
     *
     * @var PollType
     */
    public $poll;

    /**
     * Optional. A user changed their answer in a non-anonymous poll.
     * Bots receive new votes only in polls that were sent by the bot itself.
     *
     * @var PollAnswerType|null
     */
    public $pollAnswer;
}
