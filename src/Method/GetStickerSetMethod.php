<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\MethodInterface;

/**
 * Class GetStickerSetMethod.
 *
 * @see https://core.telegram.org/bots/api#getstickerset
 */
class GetStickerSetMethod implements MethodInterface
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
