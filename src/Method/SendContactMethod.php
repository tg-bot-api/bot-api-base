<?php

declare(strict_types=1);

namespace Greenplugin\TelegramBot\Method;

use Greenplugin\TelegramBot\Method\Traits\FillFromArrayTrait;
use Greenplugin\TelegramBot\Method\Traits\SendToChatVariablesTrait;

/**
 * Class SendContactMethod.
 *
 * @see https://core.telegram.org/bots/api#sendcontact
 */
class SendContactMethod
{
    use FillFromArrayTrait;
    use SendToChatVariablesTrait;

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

    /**
     * SendContactMethod constructor.
     *
     * @param int|string $chatId
     * @param string     $phoneNumber
     * @param string     $firstName
     * @param array|null $data
     *
     * @throws \Greenplugin\TelegramBot\Exception\BadArgumentException
     */
    public function __construct($chatId, string $phoneNumber, string $firstName, array $data = null)
    {
        $this->chatId = $chatId;
        $this->phoneNumber = $phoneNumber;
        $this->$firstName = $firstName;
        if ($data) {
            $this->fill($data);
        }
    }
}
