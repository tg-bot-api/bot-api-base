<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type;

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
     *
     * @return ShippingOption
     */
    public static function create(string $id, string $title, array $prices): ShippingOption
    {
        $instance = new static();
        $instance->id = $id;
        $instance->title = $title;
        $instance->prices = $prices;

        return $instance;
    }

    /**
     * @param LabeledPriceType $price
     *
     * @return ShippingOption
     */
    public function addPrice(LabeledPriceType $price): ShippingOption
    {
        $this->prices[] = $price;

        return $this;
    }
}
