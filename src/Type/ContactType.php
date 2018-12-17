<?php
declare(strict_types=1);

namespace Greenplugin\TelegramBot\Type;


/**
 * Class ContactType
 * @see https://core.telegram.org/bots/api#contact
 */
class ContactType
{
    /**
     * Contact's phone number.
     * @var String
     */
    public $phoneNumber;

    /**
     * Contact's first name.
     * @var String
     */
    public $firstName;

    /**
     * Optional. Contact's last name.
     * @var String|null
     */
    public $lastName;

    /**
     * Optional. Contact's user identifier in Telegram.
     * @var Integer|null
     */
    public $userId;

    /**
     * Optional. Additional data about the contact in the form of a vCard
     * @var String|null
     */
    public $vcard;
}