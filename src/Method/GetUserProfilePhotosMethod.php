<?php
declare(strict_types=1);

namespace Greenplugin\TelegramBot\Method;

/**
 * Class GetUserProfilePhotosMethod
 * @link https://core.telegram.org/bots/api#getuserprofilephotos
 */
class GetUserProfilePhotosMethod
{
    /**
     * Unique identifier of the target user.
     *
     * @var integer
     */
    public $userId;

    /**
     * Optional. Sequential number of the first photo to be returned. By default, all photos are returned.
     *
     * @var integer|null
     */
    public $offset;

    /**
     * Limits the number of photos to be retrieved. Values between 1—100 are accepted. Defaults to 100.
     *
     * @var integer|null
     */
    public $limit;
}

