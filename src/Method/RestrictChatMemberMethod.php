<?php
declare(strict_types=1);

namespace Greenplugin\TelegramBot\Method;

/**
 * Class RestrictChatMemberMethod
 * @link https://core.telegram.org/bots/api#restrictchatmember
 */
class RestrictChatMemberMethod extends ChatMemberMethodAbstract
{
    /**
     * Optional. Date when the user will be unbanned, unix time.
     * If user is banned for more than 366 days or less than 30 seconds
     * from the current time they are considered to be banned forever.
     *
     * @var integer|null
     */
    public $untilDate;

    /**
     * Optional. Pass True, if the user can send text messages, contacts, locations and venues.
     *
     * @var boolean|null
     */
    public $canSendMessages;

    /**
     * Optional. Pass True, if the user can send audios, documents, photos, videos, video notes and voice notes,
     * implies can_send_messages
     *
     * @var boolean|null
     */
    public $canSendMediaMessages;

    /**
     * Optional. Pass True, if the user can send animations, games, stickers and use inline bots,
     * implies can_send_media_messages
     *
     * @var boolean|null
     */
    public $canSendOtherMessages;

    /**
     * Optional. Pass True, if the user may add web page previews to their messages, implies can_send_media_messages
     *
     * @var boolean|null
     */
    public $canAddWebPagePreview;
}
