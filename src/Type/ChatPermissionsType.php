<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type;

use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;

/**
 * Class ChatPermissionsType
 * Describes actions that a non-administrator user is allowed to take in a chat.
 *
 * @see https://core.telegram.org/bots/api#chatpermissions
 */
class ChatPermissionsType
{
    use FillFromArrayTrait;

    /**
     * Optional. True, if the user is allowed to send text messages, contacts, locations and venues.
     *
     * @var bool
     */
    public $canSendMessages;
    /**
     * Optional. True, if the user is allowed to send
     * audios, documents, photos, videos, video notes and voice notes, implies can_send_messages.
     *
     * @var bool
     */
    public $canSendMediaMessages;

    /**
     * Optional. True, if the user is allowed to send polls, implies can_send_messages.
     *
     * @var bool
     */
    public $canSendPolls;

    /**
     * Optional. True, if the user is allowed to send
     * animations, games, stickers and use inline bots, implies can_send_media_messages.
     *
     * @var bool
     */
    public $canSendOtherMessages;

    /**
     * Optional. True, if the user is allowed to add web page previews to their messages,
     * implies can_send_media_messages.
     *
     * @var bool
     */
    public $canAddWebPagePreviews;

    /**
     * Optional. True, if the user is allowed to change
     * the chat title, photo and other settings. Ignored in public supergroups.
     *
     * @var bool
     */
    public $canChangeInfo;

    /**
     * Optional. True, if the user is allowed to invite new users to the chat.
     *
     * @var bool
     */
    public $canInviteUsers;

    /**
     * Optional. True, if the user is allowed to pin messages. Ignored in public supergroups.
     *
     * @var bool
     */
    public $canPinMessages;

    /**
     * @param array|null $data
     *
     * @return ChatPermissionsType
     */
    public static function create(array $data = null): ChatPermissionsType
    {
        $instance = new static();
        if ($data) {
            $instance->fill($data);
        }

        return $instance;
    }
}
