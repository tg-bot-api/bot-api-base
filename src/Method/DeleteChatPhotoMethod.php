<?php
declare(strict_types=1);

namespace Greenplugin\TelegramBot\Method;

use Greenplugin\TelegramBot\Method\Traits\ChatIdVariableTrait;

/**
 * Class DeleteChatPhotoMethod
 * @link https://core.telegram.org/bots/api#deletechatphoto
 */
class DeleteChatPhotoMethod
{
    use ChatIdVariableTrait;
    /**
     * @param integer|string $chatId
     */
    public function __construct($chatId)
    {
        $this->chatId = $chatId;
    }
}
