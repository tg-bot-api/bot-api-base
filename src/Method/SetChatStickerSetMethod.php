<?php
declare(strict_types=1);

namespace Greenplugin\TelegramBot\Method;

/**
 * Class SetChatStickerSetMethod
 * @link https://core.telegram.org/bots/api#setchatstickerset
 */
class SetChatStickerSetMethod extends ChatMethodAbstract
{
    /**
     * Name of the sticker set to be set as the group sticker set.
     *
     * @var string
     */
    public $stickerSetName;
}
