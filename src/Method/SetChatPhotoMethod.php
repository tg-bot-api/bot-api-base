<?php
declare(strict_types=1);

namespace Greenplugin\TelegramBot\Method;

use Greenplugin\TelegramBot\Type\InputFileType;

/**
 * Class SetChatPhotoMethod
 * @link https://core.telegram.org/bots/api#setchatphoto
 */
class SetChatPhotoMethod extends ChatMethodAbstract
{
    /**
     * New chat photo, uploaded using multipart/form-data.
     *
     * @var InputFileType
     */
    public $photo;
}

