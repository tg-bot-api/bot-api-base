<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\MethodInterface;
use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;
use TgBotApi\BotApiBase\Method\Traits\UserIdVariableTrait;

/**
 * Class GetUserProfilePhotosMethod.
 *
 * @see https://core.telegram.org/bots/api#getuserprofilephotos
 */
class GetUserProfilePhotosMethod implements MethodInterface
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
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     *
     * @return GetUserProfilePhotosMethod
     */
    public static function create(int $userId, array $data = null): GetUserProfilePhotosMethod
    {
        $instance = new static();
        $instance->userId = $userId;
        if ($data) {
            $instance->fill($data);
        }

        return $instance;
    }
}
