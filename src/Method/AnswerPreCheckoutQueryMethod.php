<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\AnswerMethodAliasInterface;

/**
 * Class AnswerPreCheckoutQueryMethod.
 *
 * Once the user has confirmed their payment and shipping details,
 * the Bot API sends the final confirmation in the form of an Update with the field pre_checkout_query.
 * Use this method to respond to such pre-checkout queries. On success, True is returned.
 * Note: The Bot API must receive an answer within 10 seconds after the pre-checkout query was sent.
 *
 * @see https://core.telegram.org/bots/api#answerprecheckoutquery
 */
class AnswerPreCheckoutQueryMethod implements AnswerMethodAliasInterface
{
    /**
     * Unique identifier for the query to be answered.
     *
     * @var string
     */
    public $preCheckoutQueryId;

    /**
     * Specify True if everything is alright (goods are available, etc.) and the bot is ready to proceed with the order.
     * Use False if there are any problems.
     *
     * @var bool
     */
    public $ok;

    /**
     * Optional. Required if ok is False.
     * Error message in human readable form that explains the reason for failure to proceed with the checkout
     * (e.g. "Sorry, somebody just bought the last of our amazing black T-shirts while you
     * were busy filling out your payment details. Please choose a different color or garment!").
     * Telegram will display this message to the user.
     *
     * @var string|null
     */
    public $errorMessage;

    /**
     * @param string $preCheckoutQueryId
     *
     * @return AnswerPreCheckoutQueryMethod
     */
    public static function createSuccess(string $preCheckoutQueryId): AnswerPreCheckoutQueryMethod
    {
        $instance = new static();
        $instance->preCheckoutQueryId = $preCheckoutQueryId;
        $instance->ok = true;

        return $instance;
    }

    /**
     * @param string $preCheckoutQueryId
     * @param string $errorMessage
     *
     * @return AnswerPreCheckoutQueryMethod
     */
    public static function createFail(string $preCheckoutQueryId, string $errorMessage): AnswerPreCheckoutQueryMethod
    {
        $instance = new static();
        $instance->preCheckoutQueryId = $preCheckoutQueryId;
        $instance->ok = false;
        $instance->errorMessage = $errorMessage;

        return $instance;
    }
}
