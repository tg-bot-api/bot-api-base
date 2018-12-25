<?php
declare(strict_types=1);

namespace Greenplugin\TelegramBot\Type;


use Greenplugin\TelegramBot\Method\Traits\FillFromArrayTrait;

/**
 * Class KeyboardButtonType
 * Note: request_contact and request_location options will only work in Telegram versions released after 9
 * April, 2016. Older clients will ignore them.
 * @link https://core.telegram.org/bots/api#keyboardbutton
 */
class KeyboardButtonType
{
    use FillFromArrayTrait;

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

    /**
     * KeyboardButtonType constructor.
     * @param string $text
     * @param array|null $data
     * @throws \Greenplugin\TelegramBot\Exception\BadArgumentException
     */
    public function __construct(string $text, array $data = null)
    {
        $this->text = $text;
        if ($data) {
            $this->fill($data);
        }
    }
}