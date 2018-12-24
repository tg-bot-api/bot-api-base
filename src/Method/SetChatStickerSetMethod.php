<?php
declare(strict_types=1);

namespace Greenplugin\TelegramBot\Method;

use Greenplugin\TelegramBot\Method\Traits\ChatIdVariableTrait;

/**
 * Class SetChatStickerSetMethod
 * @link https://core.telegram.org/bots/api#setchatstickerset
 */
class SetChatStickerSetMethod
{
    use ChatIdVariableTrait;

    /**
     * Name of the sticker set to be set as the group sticker set.
     *
     * @var string
     */
    public $stickerSetName;

    /**
     * SetChatStickerSetMethod constructor.
     * @param int|string $chatId
     * @param string $stickerSetName
     */
    public function __construct($chatId, string $stickerSetName)
    {
        $this->chatId = $chatId;
        $this->stickerSetName = $stickerSetName;
    }
}
