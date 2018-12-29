<?php

declare(strict_types=1);

namespace Greenplugin\TelegramBot\Method;

/**
 * Class GetStickerSetMethod.
 *
 * @see https://core.telegram.org/bots/api#getstickerset
 */
class GetStickerSetMethod
{
    /**
     * Name of the sticker set.
     *
     * @var string
     */
    public $name;

    /**
     * GetStickerSetMethod constructor.
     *
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }
}
