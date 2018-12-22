<?php
declare(strict_types=1);

namespace Greenplugin\TelegramBot\Method;

/**
 * Class KickChatMemberMethod
 * @link https://core.telegram.org/bots/api#kickchatmember
 */
class KickChatMemberMethod
{
    /**
     * Unique identifier for the target group or username
     * of the target supergroup or channel (in the format @channelusername)
     *
     * @var integer|string
     */
    public $chatId;

    /**
     * Unique identifier of the target user.
     *
     * @var integer
     */
    public $userId;


    /**
     * Optional. Date when the user will be unbanned, unix time.
     * If user is banned for more than 366 days or less than 30 seconds
     * from the current time they are considered to be banned forever.
     *
     * @var integer|null
     */
    public $untilDate;
}
