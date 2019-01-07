<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type;

/**
 * Class ShippingQueryType.
 *
 * @see https://core.telegram.org/bots/api#shippingquery
 */
class ShippingQueryType
{
    /**
     * Unique query identifier.
     *
     * @var string
     */
    public $id;

    /**
     * User who sent the query.
     *
     * @var UserType
     */
    public $from;

    /**
     * Bot specified invoice payload.
     *
     * @var string
     */
    public $invoicePayload;

    /**
     * User specified shipping address.
     *
     * @var ShippingAddressType
     */
    public $shippingAddress;
}
