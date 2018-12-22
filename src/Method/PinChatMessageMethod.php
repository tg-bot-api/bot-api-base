<?php
declare(strict_types=1);

namespace Greenplugin\TelegramBot\Method;

/**
 * Class PinChatMessageMethod
 * @link https://core.telegram.org/bots/api#pinchatmessage
 */
class PinChatMessageMethod extends ChatMethodAbstract
{
    /**
     * Identifier of a message to pin.
     *
     * @var integer
     */
    public $messageId;

    /**
     * Optional. Pass True, if it is not necessary to send a notification to all chat members about the new
     * pinned message. Notifications are always disabled in channels.
     *
     * @var boolean|null
     */
    public $disableNotification;
}
