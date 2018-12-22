<?php
declare(strict_types=1);

namespace Greenplugin\TelegramBot\Method;

/**
 * Class SendContactMethod
 * @link https://core.telegram.org/bots/api#sendcontact
 */
class SendContactMethod extends SendMethodAbstract
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
     * Optional. Additional data about the contact in the form of a vCard, 0-2048 bytes.
     *
     * @var string|null
     */
    public $vcard;
}
