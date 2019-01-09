<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Helper;

use TgBotApi\BotApiBase\Exception\NormalizationException;
use TgBotApi\BotApiBase\Exception\ResponseException;
use TgBotApi\BotApiBase\Method\SendAnimationMethod;
use TgBotApi\BotApiBase\Method\SendAudioMethod;
use TgBotApi\BotApiBase\Method\SendChatActionMethod;
use TgBotApi\BotApiBase\Method\SendContactMethod;
use TgBotApi\BotApiBase\Method\SendDocumentMethod;
use TgBotApi\BotApiBase\Method\SendGameMethod;
use TgBotApi\BotApiBase\Method\SendInvoiceMethod;
use TgBotApi\BotApiBase\Method\SendLocationMethod;
use TgBotApi\BotApiBase\Method\SendMediaGroupMethod;
use TgBotApi\BotApiBase\Method\SendMessageMethod;
use TgBotApi\BotApiBase\Method\SendPhotoMethod;
use TgBotApi\BotApiBase\Method\SendStickerMethod;
use TgBotApi\BotApiBase\Method\SendVenueMethod;
use TgBotApi\BotApiBase\Method\SendVideoMethod;
use TgBotApi\BotApiBase\Method\SendVideoNoteMethod;
use TgBotApi\BotApiBase\Method\SendVoiceMethod;
use TgBotApi\BotApiBase\Type\MessageType;

/**
 * Trait SendMethodTrait.
 */
trait SendMethodTrait
{
    /**
     * @param $method
     * @param $type
     *
     * @throws ResponseException
     * @throws NormalizationException
     *
     * @return mixed
     */
    abstract public function call($method, $type = null);

    /**
     * @param SendPhotoMethod $method
     *
     * @throws ResponseException
     * @throws NormalizationException
     *
     * @return MessageType
     */
    public function sendPhoto(SendPhotoMethod $method): MessageType
    {
        return $this->call($method, MessageType::class);
    }

    /**
     * @param SendAudioMethod $method
     *
     * @throws ResponseException
     * @throws NormalizationException
     *
     * @return MessageType
     */
    public function sendAudio(SendAudioMethod $method): MessageType
    {
        return $this->call($method, MessageType::class);
    }

    /**
     * @param SendDocumentMethod $method
     *
     * @throws ResponseException
     * @throws NormalizationException
     *
     * @return MessageType
     */
    public function sendDocument(SendDocumentMethod $method): MessageType
    {
        return $this->call($method, MessageType::class);
    }

    /**
     * @param SendVideoMethod $method
     *
     * @throws ResponseException
     * @throws NormalizationException
     *
     * @return MessageType
     */
    public function sendVideo(SendVideoMethod $method): MessageType
    {
        return $this->call($method, MessageType::class);
    }

    /**
     * @param SendAnimationMethod $method
     *
     * @throws ResponseException
     * @throws NormalizationException
     *
     * @return MessageType
     */
    public function sendAnimation(SendAnimationMethod $method): MessageType
    {
        return $this->call($method, MessageType::class);
    }

    /**
     * @param SendVoiceMethod $method
     *
     * @throws ResponseException
     * @throws NormalizationException
     *
     * @return MessageType
     */
    public function sendVoice(SendVoiceMethod $method): MessageType
    {
        return $this->call($method, MessageType::class);
    }

    /**
     * @param SendVideoNoteMethod $method
     *
     * @throws ResponseException
     * @throws NormalizationException
     *
     * @return MessageType
     */
    public function sendVideoNote(SendVideoNoteMethod $method): MessageType
    {
        return $this->call($method, MessageType::class);
    }

    /**
     * @param SendMediaGroupMethod $method
     *
     * @throws ResponseException
     * @throws NormalizationException
     *
     * @return MessageType[]
     */
    public function sendMediaGroup(SendMediaGroupMethod $method): array
    {
        return $this->call($method, MessageType::class . '[]');
    }

    /**
     * @param SendChatActionMethod $method
     *
     * @throws ResponseException
     * @throws NormalizationException
     *
     * @return bool
     */
    public function sendChatAction(SendChatActionMethod $method): bool
    {
        return $this->call($method);
    }

    /**
     * @param SendGameMethod $method
     *
     * @throws ResponseException
     * @throws NormalizationException
     *
     * @return MessageType
     */
    public function sendGame(SendGameMethod $method): MessageType
    {
        return $this->call($method, MessageType::class);
    }

    /**
     * @param SendInvoiceMethod $method
     *
     * @throws ResponseException
     * @throws NormalizationException
     *
     * @return MessageType
     */
    public function sendInvoice(SendInvoiceMethod $method): MessageType
    {
        return $this->call($method, MessageType::class);
    }

    /**
     * @param SendLocationMethod $method
     *
     * @throws ResponseException
     * @throws NormalizationException
     *
     * @return MessageType
     */
    public function sendLocation(SendLocationMethod $method): MessageType
    {
        return $this->call($method, MessageType::class);
    }

    /**
     * @param SendVenueMethod $method
     *
     * @throws ResponseException
     * @throws NormalizationException
     *
     * @return MessageType
     */
    public function sendVenue(SendVenueMethod $method): MessageType
    {
        return $this->call($method, MessageType::class);
    }

    /**
     * @param SendContactMethod $method
     *
     * @throws ResponseException
     * @throws NormalizationException
     *
     * @return MessageType
     */
    public function sendContact(SendContactMethod $method): MessageType
    {
        return $this->call($method, MessageType::class);
    }

    /**
     * @param SendStickerMethod $method
     *
     * @throws ResponseException
     * @throws NormalizationException
     *
     * @return MessageType
     */
    public function sendSticker(SendStickerMethod $method): MessageType
    {
        return $this->call($method, MessageType::class);
    }

    /**
     * @param SendMessageMethod $method
     *
     * @throws ResponseException
     * @throws NormalizationException
     *
     * @return MessageType
     */
    public function sendMessage(SendMessageMethod $method): MessageType
    {
        return $this->call($method, MessageType::class);
    }
}
