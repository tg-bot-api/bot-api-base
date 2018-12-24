<?php
declare(strict_types=1);

namespace Greenplugin\TelegramBot\Method;

use Greenplugin\TelegramBot\Method\Traits\ChatIdVariableTrait;
use Greenplugin\TelegramBot\Method\Traits\FillFromArrayTrait;

/**
 * Class ForwardMessageMethod
 * @link https://core.telegram.org/bots/api#forwardmessage
 */
class ForwardMessageMethod
{
    use FillFromArrayTrait;
    use ChatIdVariableTrait;
    /**
     * Unique identifier for the chat where the original message was sent
     * (or channel username in the format @channelusername)
     *
     * @var integer|string
     */
    public $fromChatId;

    /**
     * Optional. Sends the message silently. Users will receive a notification with no sound.
     *
     * @var boolean|null
     */
    public $disableNotification;

    /**
     * Message identifier in the chat specified in from_chat_id.
     *
     * @var integer
     */
    public $messageId;

    /**
     * @param integer|string $chatId
     * @param integer|string $fromChatId
     * @param integer $messageId
     * @param array|null $data
     * @throws \Greenplugin\TelegramBot\Exception\BadArgumentException
     */
    public function __construct($chatId, $fromChatId, int $messageId, array $data = null)
    {
        $this->chatId = $chatId;
        $this->fromChatId = $fromChatId;
        $this->$messageId = $messageId;
        if ($data) {
            $this->fill($data);
        }
    }
}
