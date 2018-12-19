<?php
declare(strict_types=1);

namespace Greenplugin\TelegramBot\Type;


/**
 * Class KeyboardButtonType
 * Note: request_contact and request_location options will only work in Telegram versions released after 9
 * April, 2016. Older clients will ignore them.
 * @link https://core.telegram.org/bots/api#keyboardbutton
 */
class KeyboardButtonType
{
    /**
     * Text of the button. If none of the optional fields are used,
     * it will be sent as a message when the button is pressed.
     * @var string
     */
    public $text;

    /**
     * Optional. If True, the user's phone number will be sent as a contact when the button is pressed.
     * Available in private chats only.
     * @var boolean|null
     */
    public $requestContact;

    /**
     * Optional. If True, the user's current location will be sent when the button is pressed.
     * Available in private chats only.
     * @var boolean|null
     */
    public $requestLocation;
}