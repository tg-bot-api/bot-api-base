<?php
declare(strict_types=1);

namespace Greenplugin\TelegramBot\Method;


use Greenplugin\TelegramBot\Type\InputMediaPhotoType;
use Greenplugin\TelegramBot\Type\InputMediaVideoType;

/**
 * Class SendMediaGroupMethod
 * @link https://core.telegram.org/bots/api#sendmediagroup
 */
class SendGroupMethod extends SendMethodAbstract
{
    /**
     * A JSON-serialized array describing photos and videos to be sent, must include 2–10 items.
     *
     * @var InputMediaPhotoType[]|InputMediaVideoType[]
     */
    public $media;
}
