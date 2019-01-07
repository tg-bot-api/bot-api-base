<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type;

/**
 * Class MaskPositionType.
 *
 * @see https://core.telegram.org/bots/api#maskposition
 */
class MaskPositionType
{
    const MASK_POINT_FOREHEAD = 'forehead';
    const MASK_POINT_EYES = 'eyes';
    const MASK_POINT_MOUTH = 'mouth';
    const MASK_POINT_CHIN = 'chin';

    /**
     * The part of the face relative to which the mask should be placed. One of “forehead”, “eyes”, “mouth”, or “chin”.
     *
     * @var string
     */
    public $point;

    /**
     * Shift by X-axis measured in widths of the mask scaled to the face size, from left to right.
     * For example, choosing -1.0 will place mask just to the left of the default mask position.
     *
     * @var float
     */
    public $xShift;

    /**
     * Shift by Y-axis measured in heights of the mask scaled to the face size, from top to bottom.
     * For example, 1.0 will place the mask just below the default mask position.
     *
     * @var float
     */
    public $yShift;

    /**
     * Mask scaling coefficient. For example, 2.0 means double size.
     *
     * @var float
     */
    public $scale;

    /**
     * @param string $point
     * @param float  $xShift
     * @param float  $yShift
     * @param float  $scale
     *
     * @return MaskPositionType
     */
    public static function create(string $point, float $xShift, float $yShift, float $scale): MaskPositionType
    {
        $instance = new static();
        $instance->point = $point;
        $instance->xShift = $xShift;
        $instance->yShift = $yShift;
        $instance->scale = $scale;

        return $instance;
    }
}
