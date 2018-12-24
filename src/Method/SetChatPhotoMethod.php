<?php
declare(strict_types=1);

namespace Greenplugin\TelegramBot\Method;

use Greenplugin\TelegramBot\Method\Traits\ChatIdVariableTrait;
use Greenplugin\TelegramBot\Type\InputFileType;

/**
 * Class SetChatPhotoMethod
 * @link https://core.telegram.org/bots/api#setchatphoto
 */
class SetChatPhotoMethod
{
    use ChatIdVariableTrait;
    /**
     * New chat photo, uploaded using multipart/form-data.
     *
     * @var InputFileType
     */
    public $photo;

    /**
     * SetChatPhotoMethod constructor.
     * @param integer|string $chatId
     * @param InputFileType $photo
     */
    public function __construct($chatId, InputFileType $photo)
    {
        $this->chatId = $chatId;
        $this->photo = $photo;
    }
}
