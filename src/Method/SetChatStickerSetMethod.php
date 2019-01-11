<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\SetMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Traits\ChatIdVariableTrait;

/**
 * Class SetChatStickerSetMethod.
 *
 * @see https://core.telegram.org/bots/api#setchatstickerset
 */
class SetChatStickerSetMethod implements SetMethodAliasInterface
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
