<?php
declare(strict_types=1);

namespace Greenplugin\TelegramBot\Method;

/**
 * Class ChatMemberMethodAbstract
 */
abstract class ChatMemberMethodAbstract extends ChatMethodAbstract
{
    /**
     * Unique identifier of the target user.
     *
     * @var integer
     */
    public $userId;
}
