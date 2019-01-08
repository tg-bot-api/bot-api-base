<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

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
        $botApi = $this->getBot('sendVenue', [
            'chat_id' => 1,
            'latitude' => 51.5287718,
            'longitude' => -0.2416802,
            'title' => 'title',
            'address' => 'address',
            'foursquare_id' => 'id',
            'foursquare_type' => 'arts_entertainment/default',
            'disable_notification' => true,
            'reply_to_message_id' => 1,
            'reply_markup' => $this->buildInlineMarkupArray(),
        ], [], ['reply_markup']);

        $botApi->sendVenue(SendVenueMethod::create(
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
                'replyMarkup' => $this->buildInlineMarkupObject(),
            ]
        ));
    }
}
