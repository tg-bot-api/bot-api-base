<?php
declare(strict_types=1);

namespace Greenplugin\TelegramBot\Method;


use Greenplugin\TelegramBot\Method\Traits\FillFromArrayTrait;
use Greenplugin\TelegramBot\Method\Traits\SendToChatVariablesTrait;
use Greenplugin\TelegramBot\Type\InputMediaPhotoType;
use Greenplugin\TelegramBot\Type\InputMediaVideoType;

/**
 * Class SendMediaGroupMethod
 * @link https://core.telegram.org/bots/api#sendmediagroup
 */
class SendGroupMethod
{
    use FillFromArrayTrait;
    use SendToChatVariablesTrait;
    /**
     * A JSON-serialized array describing photos and videos to be sent, must include 2–10 items.
     *
     * @var InputMediaPhotoType[]|InputMediaVideoType[]
     */
    public $media;

    /**
     * SendGroupMethod constructor.
     * @param int|string $chatId
     * @param InputMediaPhotoType[]|InputMediaVideoType[] $media
     * @param array|null $data
     * @throws \Greenplugin\TelegramBot\Exception\BadArgumentException
     */
    public function __construct($chatId, $media, array $data = null)
    {
        $this->chatId = $chatId;
        $this->media = $media;
        if ($data) {
            $this->fill($data);
        }
    }
}
