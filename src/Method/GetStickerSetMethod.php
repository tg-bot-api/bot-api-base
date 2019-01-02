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
     * @param string $name
     *
     * @return GetStickerSetMethod
     */
    public static function create(string $name): GetStickerSetMethod
    {
        $instance = new static();
        $instance->name = $name;

        return $instance;
    }
}
