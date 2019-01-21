<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method\Interfaces;

/**
 * Interface HasActionVariableInterface.
 */
interface HasActionVariableInterface
{
    public const ACTION_TYPING = 'typing';
    public const ACTION_UPLOAD_PHOTO = 'upload_photo';
    public const ACTION_RECORD_VIDEO = 'record_video';
    public const ACTION_RECORD_AUDIO = 'record_audio';
    public const ACTION_UPLOAD_DOCUMENT = 'upload_document';
    public const ACTION_FIND_LOCATION = 'find_location';
    public const ACTION_RECORD_VIDEO_NOTE = 'record_video_note';
}
