<?php

declare(strict_types=1);

namespace Greenplugin\TelegramBot\Method;

use Greenplugin\TelegramBot\Type\ShippingOption;
use phpDocumentor\Reflection\Types\This;

/**
 * Class AnswerShippingQueryMethod.
 *
 * @see https://core.telegram.org/bots/api#answershippingquery
 */
class AnswerShippingQueryMethod
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
     */
    public static function createSuccess(string $shippingQueryId, array $shippingOptions)
    {
        $instance = new self();
        $instance->shippingQueryId = $shippingQueryId;
        $instance->ok = true;
        $instance->shippingOptions = $shippingOptions;
    }

    /**
     * @param string $shippingQueryId
     * @param string $errorMessage
     */
    public static function createFail(string $shippingQueryId, string $errorMessage)
    {
        $instance = new self();
        $instance->shippingQueryId = $shippingQueryId;
        $instance->ok = false;
        $instance->errorMessage = $errorMessage;
    }

    /**
     * @param ShippingOption $shippingOption
     */
    public function addShippingOption(ShippingOption $shippingOption)
    {
        $this->shippingOptions[] = $shippingOption;
    }
}
