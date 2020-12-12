<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\BotApiComplete;
use TgBotApi\BotApiBase\Method\SendVenueMethod;
use TgBotApi\BotApiBase\Tests\Method\Traits\InlineKeyboardMarkupTrait;

class SendVenueMethodTest extends MethodTestCase
{
    use InlineKeyboardMarkupTrait;

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode()
    {
        $this->getApi()->sendVenue($this->getMethod());
        $this->getApi()->send($this->getMethod());
    }

    private function getApi(): BotApiComplete
    {
        return $this->getBot('sendVenue', [
            'chat_id' => 1,
            'latitude' => 51.5287718,
            'longitude' => -0.2416802,
            'title' => 'title',
            'address' => 'address',
            'foursquare_id' => 'id',
            'foursquare_type' => 'arts_entertainment/default',
            'disable_notification' => true,
            'reply_to_message_id' => 1,
            'reply_markup' => static::buildInlineMarkupArray(),
            'google_place_type' => 'google_place_type',
            'google_place_id' => 'google_place_id',
            'allow_sending_without_reply' => true,
        ], [], ['reply_markup']);
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    private function getMethod(): SendVenueMethod
    {
        return SendVenueMethod::create(
            1,
            51.5287718,
            -0.2416802,
            'title',
            'address',
            [
                'foursquareId' => 'id',
                'foursquareType' => 'arts_entertainment/default',
                'disableNotification' => true,
                'replyToMessageId' => 1,
                'replyMarkup' => static::buildInlineMarkupObject(),
                'googlePlaceId' => 'google_place_id',
                'googlePlaceType' => 'google_place_type',
                'allowSendingWithoutReply' => true,
            ]
        );
    }
}
