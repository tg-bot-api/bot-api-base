<?php

declare(strict_types=1);

namespace Greenplugin\TelegramBot\Method;

use Greenplugin\TelegramBot\Method\Traits\FillFromArrayTrait;
use Greenplugin\TelegramBot\Method\Traits\UserIdVariableTrait;

/**
 * Class GetUserProfilePhotosMethod.
 *
 * @see https://core.telegram.org/bots/api#getuserprofilephotos
 */
class GetUserProfilePhotosMethod
{
    use FillFromArrayTrait;
    use UserIdVariableTrait;

    /**
     * Optional. Sequential number of the first photo to be returned. By default, all photos are returned.
     *
     * @var int|null
     */
    public $offset;

    /**
     * Limits the number of photos to be retrieved. Values between 1—100 are accepted. Defaults to 100.
     *
     * @var int|null
     */
    public $limit;

    /**
     * GetUserProfilePhotosMethod constructor.
     *
     * @param int        $userId
     * @param array|null $data
     *
     * @throws \Greenplugin\TelegramBot\Exception\BadArgumentException
     */
    public function __construct(int $userId, array $data = null)
    {
        $this->userId = $userId;
        if ($data) {
            $this->fill($data);
        }
    }
}
