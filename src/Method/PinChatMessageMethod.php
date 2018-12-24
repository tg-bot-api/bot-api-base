<?php
declare(strict_types=1);

namespace Greenplugin\TelegramBot\Method;

use Greenplugin\TelegramBot\Method\Traits\ChatIdVariableTrait;
use Greenplugin\TelegramBot\Method\Traits\FillFromArrayTrait;
use Greenplugin\TelegramBot\Method\Traits\MessageIdVariableTrait;

/**
 * Class PinChatMessageMethod
 * @link https://core.telegram.org/bots/api#pinchatmessage
 */
class PinChatMessageMethod
{
    use FillFromArrayTrait;
    use ChatIdVariableTrait;
    use MessageIdVariableTrait;

    /**
     * Optional. Pass True, if it is not necessary to send a notification to all chat members about the new
     * pinned message. Notifications are always disabled in channels.
     *
     * @var boolean|null
     */
    public $disableNotification;

    /**
     * PinChatMessageMethod constructor.
     * @param integer|string $chatId
     * @param int $messageId
     * @param array|null $data
     * @throws \Greenplugin\TelegramBot\Exception\BadArgumentException
     */
    public function __construct($chatId, int $messageId, array $data = null)
    {
        $this->chatId = $chatId;
        $this->messageId = $messageId;
        if ($data) {
            $this->fill($data);
        }
    }
}
