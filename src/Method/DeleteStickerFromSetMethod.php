<?php

declare(strict_types=1);

namespace Greenplugin\TelegramBot\Method;

/**
 * Class DeleteStickerFromSetMethod.
 *
 * @see https://core.telegram.org/bots/api#deletestickerfromset
 */
class DeleteStickerFromSetMethod
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
