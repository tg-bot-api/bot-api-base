<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type;

/**
 * Class UserProfilePhotosType.
 *
 * @see https://core.telegram.org/bots/api#userprofilephotos
 */
class UserProfilePhotosType
{
    /**
     * Total number of profile pictures the target user has.
     *
     * @var int
     */
    public $totalCount;

    /**
     * Requested profile pictures (in up to 4 sizes each).
     *
     * @var PhotoSizeType[][]
     */
    public $photos;
}
