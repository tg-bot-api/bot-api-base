<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type;

/**
 * Class OrderInfoType.
 *
 * @see https://core.telegram.org/bots/api#orderinfo
 */
class OrderInfoType
{
    /**
     * Optional. User name.
     *
     * @var string|null
     */
    public $name;

    /**
     * Optional. User's phone number.
     *
     * @var string|null
     */
    public $phoneNumber;

    /**
     * Optional. User email.
     *
     * @var string|null
     */
    public $email;

    /**
     * Optional. User shipping address.
     *
     * @var ShippingAddressType|null
     */
    public $shippingAddress;
}
