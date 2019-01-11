<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\DeleteMethodAliasInterface;

/**
 * Class DeleteStickerFromSetMethod.
 *
 * @see https://core.telegram.org/bots/api#deletestickerfromset
 */
class DeleteStickerFromSetMethod implements DeleteMethodAliasInterface
{
    /**
     * File identifier of the sticker.
     *
     * @var string
     */
    public $sticker;

    /**
     * @param string $sticker
     *
     * @return DeleteStickerFromSetMethod
     */
    public static function create(string $sticker): DeleteStickerFromSetMethod
    {
        $instance = new static();
        $instance->sticker = $sticker;

        return $instance;
    }
}
