<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\SetMethodAliasInterface;

/**
 * Class SetStickerPositionInSetMethod.
 *
 * @see https://core.telegram.org/bots/api#setstickerpositioninset
 */
class SetStickerPositionInSetMethod implements SetMethodAliasInterface
{
    /**
     * File identifier of the sticker.
     *
     * @var string
     */
    public $sticker;

    /**
     * New sticker position in the set, zero-based.
     *
     * @var int
     */
    public $position;

    /**
     * @param $sticker
     * @param $position
     *
     * @return SetStickerPositionInSetMethod
     */
    public static function create($sticker, $position): SetStickerPositionInSetMethod
    {
        $instance = new static();
        $instance->sticker = $sticker;
        $instance->position = $position;

        return $instance;
    }
}
