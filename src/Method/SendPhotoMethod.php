<?php
declare(strict_types=1);

namespace Greenplugin\TelegramBot\Method;

use Greenplugin\TelegramBot\Type\ForceReplyType;
use Greenplugin\TelegramBot\Type\InlineKeyboardMarkupType;
use Greenplugin\TelegramBot\Type\InputFileType;
use Greenplugin\TelegramBot\Type\ReplyKeyboardMarkupType;
use Greenplugin\TelegramBot\Type\ReplyKeyboardRemoveType;

/**
 * Class SendPhotoMethod
 * @link https://core.telegram.org/bots/api#sendphoto
 */
class SendPhotoMethod extends SendWithCaptionMethodAbstract
{
    /**
     * Photo to send. Pass a file_id as String to send a photo that exists on the Telegram servers (recommended),
     * pass an HTTP URL as a String for Telegram to get a photo from the Internet,
     * or upload a new photo using multipart/form-data.
     *
     * @var InputFileType|string
     */
    public $Photo;
}
