<?php

declare(strict_types=1);

namespace Greenplugin\TelegramBot\Method\Interfaces;

/**
 * Interface HasActionVariableInterface.
 */
interface HasActionVariableInterface
{
    const ACTION_TYPING = 'typing';
    const ACTION_UPLOAD_PHOTO = 'upload_photo';
    const ACTION_RECORD_VIDEO = 'record_video';
    const ACTION_RECORD_AUDIO = 'record_audio';
    const ACTION_UPLOAD_DOCUMENT = 'upload_document';
    const ACTION_FIND_LOCATION = 'find_location';
    const ACTION_RECORD_VIDEO_NOTE = 'record_video_note';
}
