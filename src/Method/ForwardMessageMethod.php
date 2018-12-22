<?php
declare(strict_types=1);

namespace Greenplugin\TelegramBot\Method;

/**
 * Class ForwardMessageMethod
 * @link https://core.telegram.org/bots/api#forwardmessage
 */
class ForwardMessageMethod extends ChatMethodAbstract
{
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
}
