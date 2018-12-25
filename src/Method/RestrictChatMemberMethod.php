<?php

declare(strict_types=1);

namespace Greenplugin\TelegramBot\Method;

use Greenplugin\TelegramBot\Method\Traits\ChatIdVariableTrait;
use Greenplugin\TelegramBot\Method\Traits\FillFromArrayTrait;
use Greenplugin\TelegramBot\Method\Traits\UserIdVariableTrait;

/**
 * Class RestrictChatMemberMethod.
 *
 * @see https://core.telegram.org/bots/api#restrictchatmember
 */
class RestrictChatMemberMethod
{
    use FillFromArrayTrait;
    use ChatIdVariableTrait;
    use UserIdVariableTrait;

    /**
     * Optional. Date when the user will be unbanned, unix time.
     * If user is banned for more than 366 days or less than 30 seconds
     * from the current time they are considered to be banned forever.
     *
     * @var int|null
     */
    public $untilDate;

    /**
     * Optional. Pass True, if the user can send text messages, contacts, locations and venues.
     *
     * @var bool|null
     */
    public $canSendMessages;

    /**
     * Optional. Pass True, if the user can send audios, documents, photos, videos, video notes and voice notes,
     * implies can_send_messages.
     *
     * @var bool|null
     */
    public $canSendMediaMessages;

    /**
     * Optional. Pass True, if the user can send animations, games, stickers and use inline bots,
     * implies can_send_media_messages.
     *
     * @var bool|null
     */
    public $canSendOtherMessages;

    /**
     * Optional. Pass True, if the user may add web page previews to their messages, implies can_send_media_messages.
     *
     * @var bool|null
     */
    public $canAddWebPagePreview;

    /**
     * RestrictChatMemberMethod constructor.
     *
     * @param $chatId
     * @param int        $userId
     * @param array|null $data
     *
     * @throws \Greenplugin\TelegramBot\Exception\BadArgumentException
     */
    public function __construct($chatId, int $userId, array $data = null)
    {
        $this->chatId = $chatId;
        $this->userId = $userId;
        if ($data) {
            $this->fill($data);
        }
    }
}
