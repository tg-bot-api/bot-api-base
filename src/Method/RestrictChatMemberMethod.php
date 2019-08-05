<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\RestrictMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Traits\ChatIdVariableTrait;
use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;
use TgBotApi\BotApiBase\Method\Traits\UserIdVariableTrait;
use TgBotApi\BotApiBase\Type\ChatPermissionsType;

/**
 * Class RestrictChatMemberMethod.
 *
 * @see https://core.telegram.org/bots/api#restrictchatmember
 */
class RestrictChatMemberMethod implements RestrictMethodAliasInterface
{
    use FillFromArrayTrait;
    use ChatIdVariableTrait;
    use UserIdVariableTrait;

    /**
     * Optional. Date when the user will be unbanned, DateTimeInterface.
     * If user is banned for more than 366 days or less than 30 seconds
     * from the current time they are considered to be banned forever.
     *
     * @var \DateTimeInterface|null
     */
    public $untilDate;

    /**
     * Optional. Pass True, if the user can send text messages, contacts, locations and venues.
     *
     * @deprecated
     *
     * @var bool|null
     */
    public $canSendMessages;

    /**
     * Optional. Pass True, if the user can send audios, documents, photos, videos, video notes and voice notes,
     * implies can_send_messages.
     *
     * @deprecated
     *
     * @var bool|null
     */
    public $canSendMediaMessages;

    /**
     * Optional. Pass True, if the user can send animations, games, stickers and use inline bots,
     * implies can_send_media_messages.
     *
     * @deprecated
     *
     * @var bool|null
     */
    public $canSendOtherMessages;

    /**
     * Optional. Pass True, if the user may add web page previews to their messages, implies can_send_media_messages.
     *
     * @deprecated
     *
     * @var bool|null
     */
    public $canAddWebPagePreviews;

    /**
     * New user permissions.
     *
     * @var ChatPermissionsType
     */
    public $permissions;

    /**
     * @param            $chatId
     * @param int        $userId
     * @param array|null $data
     *
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     *
     * @return RestrictChatMemberMethod
     *
     * @deprecated
     * @see https://core.telegram.org/bots/api#july-29-2019
     */
    public static function createOld($chatId, int $userId, array $data = null): RestrictChatMemberMethod
    {
        $instance = new static();
        $instance->chatId = $chatId;
        $instance->userId = $userId;
        if ($data) {
            $instance->fill($data);
        }

        return $instance;
    }

    /**
     * @param                     $chatId
     * @param int                 $userId
     * @param ChatPermissionsType $chatPermissionsType
     * @param array|null          $data
     *
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     *
     * @return RestrictChatMemberMethod
     */
    public static function create(
        $chatId,
        int $userId,
        ChatPermissionsType $chatPermissionsType,
        array $data = null
    ): RestrictChatMemberMethod {
        $instance = new static();
        $instance->chatId = $chatId;
        $instance->userId = $userId;
        $instance->permissions = $chatPermissionsType;
        if ($data) {
            $instance->fill($data);
        }

        return $instance;
    }
}
