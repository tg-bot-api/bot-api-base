<?php

declare(strict_types=1);

namespace Greenplugin\TelegramBot\Type\InputMessageContent;

/**
 * Class InputContactMessageContentType.
 *
 * @see https://core.telegram.org/bots/api#inputcontactmessagecontent
 */
class InputContactMessageContentType extends InputMessageContentType
{
    /**
     * Contact's phone number.
     *
     * @var string|null
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
