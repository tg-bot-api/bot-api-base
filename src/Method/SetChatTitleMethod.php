<?php
declare(strict_types=1);

namespace Greenplugin\TelegramBot\Method;

/**
 * Class SetChatTitleMethod
 * @link https://core.telegram.org/bots/api#setchattitle
 */
class SetChatTitleMethod extends ChatMethodAbstract
{
    /**
     * New chat title, 1-255 characters.
     *
     * @var string
     */
    public $title;
}
