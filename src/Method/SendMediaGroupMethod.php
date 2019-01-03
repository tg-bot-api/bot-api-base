<?php

declare(strict_types=1);

namespace Greenplugin\TelegramBot\Method;

use Greenplugin\TelegramBot\Method\Traits\ChatIdVariableTrait;
use Greenplugin\TelegramBot\Method\Traits\FillFromArrayTrait;
use Greenplugin\TelegramBot\Type\InputMedia\InputMediaPhotoType;
use Greenplugin\TelegramBot\Type\InputMedia\InputMediaVideoType;

/**
 * Class SendMediaGroupMethod.
 *
 * @see https://core.telegram.org/bots/api#sendmediagroup
 */
class SendMediaGroupMethod
{
    use FillFromArrayTrait;
    use ChatIdVariableTrait;
    /**
     * A JSON-serialized array describing photos and videos to be sent, must include 2–10 items.
     *
     * @var InputMediaPhotoType[]|InputMediaVideoType[]
     */
    public $media;

    /**
     * Optional. Sends the message silently. Users will receive a notification with no sound.
     *
     * @var bool|null
     */
    public $disableNotification;

    /**
     * Optional. If the message is a reply, ID of the original message.
     *
     * @var int|null
     */
    public $replyToMessageId;

    /**
     * @param int|string                                  $chatId
     * @param InputMediaPhotoType[]|InputMediaVideoType[] $media
     * @param array|null                                  $data
     *
     * @throws \Greenplugin\TelegramBot\Exception\BadArgumentException
     *
     * @return SendMediaGroupMethod
     */
    public static function create($chatId, $media, array $data = null): SendMediaGroupMethod
    {
        $instance = new static();
        $instance->chatId = $chatId;
        $instance->media = $media;
        if ($data) {
            $instance->fill($data);
        }

        return $instance;
    }
}
