<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Traits;

use TgBotApi\BotApiBase\Exception\ResponseException;
use TgBotApi\BotApiBase\Method\Interfaces\SendMethodAliasInterface;
use TgBotApi\BotApiBase\Method\SendAnimationMethod;
use TgBotApi\BotApiBase\Method\SendAudioMethod;
use TgBotApi\BotApiBase\Method\SendChatActionMethod;
use TgBotApi\BotApiBase\Method\SendContactMethod;
use TgBotApi\BotApiBase\Method\SendDiceMethod;
use TgBotApi\BotApiBase\Method\SendDocumentMethod;
use TgBotApi\BotApiBase\Method\SendGameMethod;
use TgBotApi\BotApiBase\Method\SendInvoiceMethod;
use TgBotApi\BotApiBase\Method\SendLocationMethod;
use TgBotApi\BotApiBase\Method\SendMediaGroupMethod;
use TgBotApi\BotApiBase\Method\SendMessageMethod;
use TgBotApi\BotApiBase\Method\SendPhotoMethod;
use TgBotApi\BotApiBase\Method\SendPollMethod;
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
     * @throws ResponseException
     *
     * @return MessageType[]
     */
    abstract public function sendMediaGroup(SendMediaGroupMethod $method): array;

    /**
     * @throws ResponseException
     */
    abstract public function send(SendMethodAliasInterface $method): MessageType;

    /**
     * @throws ResponseException
     */
    abstract public function sendChatAction(SendChatActionMethod $method): bool;

    /**
     * @throws ResponseException
     */
    public function sendPhoto(SendPhotoMethod $method): MessageType
    {
        return $this->send($method);
    }

    /**
     * @throws ResponseException
     */
    public function sendAudio(SendAudioMethod $method): MessageType
    {
        return $this->send($method);
    }

    /**
     * @throws ResponseException
     */
    public function sendDocument(SendDocumentMethod $method): MessageType
    {
        return $this->send($method);
    }

    /**
     * @throws ResponseException
     */
    public function sendVideo(SendVideoMethod $method): MessageType
    {
        return $this->send($method);
    }

    /**
     * @throws ResponseException
     */
    public function sendAnimation(SendAnimationMethod $method): MessageType
    {
        return $this->send($method);
    }

    /**
     * @throws ResponseException
     */
    public function sendVoice(SendVoiceMethod $method): MessageType
    {
        return $this->send($method);
    }

    /**
     * @throws ResponseException
     */
    public function sendVideoNote(SendVideoNoteMethod $method): MessageType
    {
        return $this->send($method);
    }

    /**
     * @throws ResponseException
     */
    public function sendGame(SendGameMethod $method): MessageType
    {
        return $this->send($method);
    }

    /**
     * @throws ResponseException
     */
    public function sendInvoice(SendInvoiceMethod $method): MessageType
    {
        return $this->send($method);
    }

    /**
     * @throws ResponseException
     */
    public function sendLocation(SendLocationMethod $method): MessageType
    {
        return $this->send($method);
    }

    /**
     * @throws ResponseException
     */
    public function sendVenue(SendVenueMethod $method): MessageType
    {
        return $this->send($method);
    }

    /**
     * @throws ResponseException
     */
    public function sendContact(SendContactMethod $method): MessageType
    {
        return $this->send($method);
    }

    /**
     * @throws ResponseException
     */
    public function sendDice(SendDiceMethod $method): MessageType
    {
        return $this->send($method);
    }

    /**
     * @throws ResponseException
     */
    public function sendSticker(SendStickerMethod $method): MessageType
    {
        return $this->send($method);
    }

    /**
     * @throws ResponseException
     */
    public function sendMessage(SendMessageMethod $method): MessageType
    {
        return $this->send($method);
    }

    /**
     * @throws ResponseException
     */
    public function sendPoll(SendPollMethod $method): MessageType
    {
        return $this->send($method);
    }
}
