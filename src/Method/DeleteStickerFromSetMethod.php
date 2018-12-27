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
     * DeleteStickerFromSetMethod constructor.
     *
     * @param string $sticker
     */
    public function __construct(string $sticker)
    {
        $this->sticker = $sticker;
    }
}
