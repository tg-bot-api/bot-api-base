<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type;

/**
 * Class LabeledPriceType.
 *
 * @see https://core.telegram.org/bots/api#labeledprice
 */
class LabeledPriceType
{
    /**
     * Portion label.
     *
     * @var string
     */
    public $label;

    /**
     * Price of the product in the smallest units of the currency (integer, not float/double).
     * For example, for a price of US$ 1.45 pass amount = 145.
     * See the exp parameter in currencies.json,
     * it shows the number of digits past the decimal point for each currency (2 for the majority of currencies).
     *
     * @see https://core.telegram.org/bots/payments#supported-currencies
     * @see https://core.telegram.org/bots/payments/currencies.json
     *
     * @var int
     */
    public $amount;

    /**
     * @param string $label
     * @param int    $amount
     *
     * @return LabeledPriceType
     */
    public static function create(string $label, int $amount): LabeledPriceType
    {
        $instance = new static();
        $instance->label = $label;
        $instance->amount = $amount;

        return $instance;
    }
}
