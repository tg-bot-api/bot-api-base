<?php

declare(strict_types=1);

namespace Greenplugin\TelegramBot\Method;

use Greenplugin\TelegramBot\Method\Traits\ChatIdVariableTrait;

/**
 * Class SetChatStickerSetMethod.
 *
 * @see https://core.telegram.org/bots/api#setchatstickerset
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
     * @param int|string $chatId
     * @param string     $stickerSetName
     *
     * @return SetChatStickerSetMethod
     */
    public static function create($chatId, string $stickerSetName): SetChatStickerSetMethod
    {
        $instance = new static();
        $instance->chatId = $chatId;
        $instance->stickerSetName = $stickerSetName;

        return $instance;
    }
}
