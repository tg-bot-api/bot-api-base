<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\AnswerMethodAliasInterface;
use TgBotApi\BotApiBase\Type\ShippingOption;

/**
 * Class AnswerShippingQueryMethod.
 *
 * @see https://core.telegram.org/bots/api#answershippingquery
 */
class AnswerShippingQueryMethod implements AnswerMethodAliasInterface
{
    /**
     * Unique identifier for the query to be answered.
     *
     * @var string
     */
    public $shippingQueryId;

    /**
     * Specify True if delivery to the specified address is possible and False if there are any problems
     * (for example, if delivery to the specified address is not possible).
     *
     * @var bool
     */
    public $ok;

    /**
     * Optional. Required if ok is True. A JSON-serialized array of available shipping options.
     *
     * @var ShippingOption[]|null
     */
    public $shippingOptions;

    /**
     * Optional. Required if ok is False.
     * Error message in human readable form that explains why it is impossible to complete the order
     * (e.g. "Sorry, delivery to your desired address is unavailable').
     * Telegram will display this message to the user.
     *
     * @var string|null
     */
    public $errorMessage;

    /**
     * @param string $shippingQueryId
     * @param array  $shippingOptions
     *
     * @return AnswerShippingQueryMethod
     */
    public static function createSuccess(string $shippingQueryId, array $shippingOptions): AnswerShippingQueryMethod
    {
        $instance = new static();
        $instance->shippingQueryId = $shippingQueryId;
        $instance->ok = true;
        $instance->shippingOptions = $shippingOptions;

        return $instance;
    }

    /**
     * @param string $shippingQueryId
     * @param string $errorMessage
     *
     * @return AnswerShippingQueryMethod
     */
    public static function createFail(string $shippingQueryId, string $errorMessage): AnswerShippingQueryMethod
    {
        $instance = new static();
        $instance->shippingQueryId = $shippingQueryId;
        $instance->ok = false;
        $instance->errorMessage = $errorMessage;

        return $instance;
    }

    /**
     * @param ShippingOption $shippingOption
     */
    public function addShippingOption(ShippingOption $shippingOption)
    {
        $this->shippingOptions[] = $shippingOption;
    }
}
