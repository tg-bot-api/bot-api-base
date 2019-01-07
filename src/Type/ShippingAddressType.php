<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type;

/**
 * Class ShippingAddressType.
 *
 * @see https://core.telegram.org/bots/api#shippingaddress
 */
class ShippingAddressType
{
    /**
     * ISO 3166-1 alpha-2 country code.
     *
     * @var string
     */
    public $countryCode;

    /**
     * State, if applicable.
     *
     * @var string
     */
    public $state;

    /**
     * City.
     *
     * @var string
     */
    public $city;

    /**
     * First line for the address.
     *
     * @var string
     */
    public $streetLine1;

    /**
     * Second line for the address.
     *
     * @var string
     */
    public $streetLine2;

    /**
     * Address post code.
     *
     * @var string
     */
    public $postCode;
}
