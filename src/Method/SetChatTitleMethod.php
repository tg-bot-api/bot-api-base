<?php

declare(strict_types=1);

namespace Greenplugin\TelegramBot\Method;

use Greenplugin\TelegramBot\Method\Traits\ChatIdVariableTrait;

/**
 * Class SetChatTitleMethod.
 *
 * @see https://core.telegram.org/bots/api#setchattitle
 */
class SetChatTitleMethod
{
    use ChatIdVariableTrait;

    /**
     * New chat title, 1-255 characters.
     *
     * @var string
     */
    public $title;

    /**
     * SetChatTitleMethod constructor.
     *
     * @param int|string $chatId
     * @param string     $title
     */
    public function __construct($chatId, string $title)
    {
        $this->chatId = $chatId;
        $this->title = $title;
    }
}
