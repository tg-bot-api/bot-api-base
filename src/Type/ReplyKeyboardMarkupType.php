<?php
declare(strict_types=1);

namespace Greenplugin\TelegramBot\Type;


use Greenplugin\TelegramBot\Method\Traits\FillFromArrayTrait;

/**
 * Class ReplyKeyboardMarkupType
 * @link https://core.telegram.org/bots/api#replykeyboardmarkup
 * @link https://core.telegram.org/bots#keyboards
 */
class ReplyKeyboardMarkupType
{
    use FillFromArrayTrait;

    /**
     * Array of button rows, each represented by an Array of KeyboardButton objects
     * @var KeyboardButtonType[][]
     */
    public $keyboard;

    /**
     * Optional. Requests clients to resize the keyboard vertically for optimal fit (e.g., make the keyboard smaller
     * if there are just two rows of buttons). Defaults to false, in which case the custom keyboard is always
     * of the same height as the app's standard keyboard.
     * @var boolean|null
     */
    public $resizeKeyboard;

    /**
     * Optional. Requests clients to hide the keyboard as soon as it's been used. The keyboard will still be available,
     * but clients will automatically display the usual letter-keyboard in the chat – the user can press a special
     * button in the input field to see the custom keyboard again. Defaults to false.
     * @var boolean|null
     */
    public $oneTimeKeyboard;

    /**
     * Optional. Use this parameter if you want to show the keyboard to specific users only. Targets: 1) users
     * that are @mentioned in the text of the MessageType object;
     * 2) if the bot's message is a reply (has reply_to_message_id), sender of the original message.
     *
     * Example: A user requests to change the bot‘s language, bot replies to the request with a keyboard to
     * select the new language. Other users in the group don’t see the keyboard.
     * @var boolean|null
     */
    public $selective;

    /**
     * ReplyKeyboardMarkupType constructor.
     * @param array $keyboard
     * @param array|null $data
     * @throws \Greenplugin\TelegramBot\Exception\BadArgumentException
     */
    public function __construct(array $keyboard = [], array $data = null)
    {
        $this->keyboard = $keyboard;
        if ($data) {
            $this->fill($data);
        }
    }
}