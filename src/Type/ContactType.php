<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type;

/**
 * Class ContactType.
 *
 * @see https://core.telegram.org/bots/api#contact
 */
class ContactType
{
    /**
     * Contact's phone number.
     *
     * @var string
     */
    public $phoneNumber;

    /**
     * Contact's first name.
     *
     * @var string
     */
    public $firstName;

    /**
     * Optional. Contact's last name.
     *
     * @var string|null
     */
    public $lastName;

    /**
     * Optional. Contact's user identifier in Telegram.
     *
     * @var int|null
     */
    public $userId;

    /**
     * Optional. Additional data about the contact in the form of a vCard.
     *
     * @var string|null
     */
    public $vcard;
}
