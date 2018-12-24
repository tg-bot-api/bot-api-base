<?php
declare(strict_types=1);

namespace Greenplugin\TelegramBot\Method;

use Greenplugin\TelegramBot\Method\Traits\ChatIdVariableTrait;

/**
 * Class SendChatActionMethod
 * @link https://core.telegram.org/bots/api#sendchataction
 */
class SendChatActionMethod
{
    const ACTION_TYPING = 'typing';
    const ACTION_UPLOAD_PHOTO = 'upload_photo';
    const ACTION_RECORD_VIDEO = 'record_video';
    const ACTION_RECORD_AUDIO = 'record_audio';
    const ACTION_UPLOAD_DOCUMENT = 'upload_document';
    const ACTION_FIND_LOCATION = 'find_location';
    const ACTION_RECORD_VIDEO_NOTE = 'record_video_note';

    use ChatIdVariableTrait;

    /**
     * Type of action to broadcast.
     * Choose one, depending on what the user is about to receive:
     * typing for text messages,
     * upload_photo for photos,
     * record_video or upload_video for videos,
     * record_audio or upload_audio for audio files,
     * upload_document for general files,
     * find_location for location data,
     * record_video_note or upload_video_note for video notes.
     *
     * @var string
     */
    public $action;

    /**
     * SendChatActionMethod constructor.
     * @param integer|string $chatId
     * @param string $action
     */
    public function __construct($chatId, string $action)
    {
        $this->chatId = $chatId;
        $this->action = $action;
    }
}
