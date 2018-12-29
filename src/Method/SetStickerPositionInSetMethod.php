<?php

declare(strict_types=1);

namespace Greenplugin\TelegramBot\Method;

/**
 * Class SetStickerPositionInSetMethod.
 *
 * @see https://core.telegram.org/bots/api#setstickerpositioninset
 */
class SetStickerPositionInSetMethod
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
     * SetStickerPositionInSetMethod constructor.
     *
     * @param $sticker
     * @param $position
     */
    public function __construct($sticker, $position)
    {
        $this->sticker = $sticker;
        $this->position = $position;
    }
}
