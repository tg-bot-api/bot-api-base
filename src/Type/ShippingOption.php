<?php

declare(strict_types=1);

namespace Greenplugin\TelegramBot\Type;

/**
 * Class ShippingOption.
 *
 * @see https://core.telegram.org/bots/api#shippingoption
 */
class ShippingOption
{
    /**
     * Shipping option identifier.
     *
     * @var string
     */
    public $id;

    /**
     * Option title.
     *
     * @var string
     */
    public $title;

    /**
     * List of price portions.
     *
     * @var LabeledPriceType[]
     */
    public $prices;

    /**
     * @param string $id
     * @param string $title
     * @param array  $prices
     */
    public static function create(string $id, string $title, array $prices)
    {
        $instance = new self();
        $instance->id = $id;
        $instance->title = $title;
        $instance->prices = $prices;
    }

    /**
     * @param LabeledPriceType $price
     */
    public function addPrice(LabeledPriceType $price)
    {
        $this->prices[] = $price;
    }
}
