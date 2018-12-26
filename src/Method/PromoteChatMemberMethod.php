<?php

declare(strict_types=1);

namespace Greenplugin\TelegramBot\Method;

use Greenplugin\TelegramBot\Method\Traits\ChatIdVariableTrait;
use Greenplugin\TelegramBot\Method\Traits\FillFromArrayTrait;
use Greenplugin\TelegramBot\Method\Traits\UserIdVariableTrait;

/**
 * Class PromoteChatMemberMethod.
 */
class PromoteChatMemberMethod
{
    use FillFromArrayTrait;
    use ChatIdVariableTrait;
    use UserIdVariableTrait;

    /**
     * Optional. Pass True, if the administrator can change chat title, photo and other settings.
     *
     * @var bool|null
     */
    public $canChangeInfo;

    /**
     * Optional. Pass True, if the administrator can create channel posts, channels only.
     *
     * @var bool|null
     */
    public $canPostMessages;

    /**
     * Optional. Pass True, if the administrator can edit messages of other users and can pin messages, channels only.
     *
     * @var bool|null
     */
    public $canEditMessages;

    /**
     * Optional. Pass True, if the administrator can delete messages of other users.
     *
     * @var bool|null
     */
    public $canDeleteMessages;

    /**
     * Optional. Pass True, if the administrator can invite new users to the chat.
     *
     * @var bool|null
     */
    public $canInviteUsers;

    /**
     * Optional. Pass True, if the administrator can restrict, ban or unban chat members.
     *
     * @var bool|null
     */
    public $canRestrictMembers;

    /**
     * Optional. Pass True, if the administrator can pin messages, supergroups only.
     *
     * @var bool|null
     */
    public $canPinMessages;

    /**
     * Optional. Pass True, if the administrator can add new administrators with a subset of his own privileges
     * or demote administrators that he has promoted, directly or indirectly
     * (promoted by administrators that were appointed by him).
     *
     * @var bool|null
     */
    public $canPromoteMembers;

    /**
     * PromoteChatMemberMethod constructor.
     *
     * @param $chatId
     * @param $userId
     * @param array|null $data
     *
     * @throws \Greenplugin\TelegramBot\Exception\BadArgumentException
     */
    public function __construct($chatId, $userId, array $data = null)
    {
        $this->chatId = $chatId;
        $this->userId = $userId;
        if ($data) {
            $this->fill($data);
        }
    }
}
