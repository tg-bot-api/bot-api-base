<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\BotApiComplete;
use TgBotApi\BotApiBase\Method\SendInvoiceMethod;
use TgBotApi\BotApiBase\Tests\Method\Traits\InlineKeyboardMarkupTrait;
use TgBotApi\BotApiBase\Type\LabeledPriceType;

class SendInvoiceMethodTest extends MethodTestCase
{
    use InlineKeyboardMarkupTrait;

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode()
    {
        $this->getApi()->sendInvoice($this->getMethod());
        $this->getApi()->send($this->getMethod());
    }

    private function getApi(): BotApiComplete
    {
        return $this->getBot('sendInvoice', [
            'chat_id' => 1,
            'title' => 'title',
            'description' => 'description',
            'payload' => 'payload',
            'provider_token' => 'provider_token',
            'start_parameter' => 'start_parameter',
            'currency' => 'USD',
            'prices' => [['label' => 'label', 'amount' => 100]],
            'provider_data' => '{}',
            'photo_url' => 'http://url',
            'photo_size' => 100,
            'photo_width' => 100,
            'photo_height' => 100,
            'need_name' => true,
            'need_phone_number' => true,
            'need_email' => true,
            'need_shipping_address' => true,
            'send_phone_number_to_provider' => true,
            'send_email_to_provider' => true,
            'is_flexible' => true,
            'disable_notification' => true,
            'reply_to_message_id' => 1,
            'allow_sending_without_reply' => true,
            'reply_markup' => static::buildInlineMarkupArray(),
        ], [], ['reply_markup', 'prices']);
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    private function getMethod(): SendInvoiceMethod
    {
        return SendInvoiceMethod::create(
            1,
            'title',
            'description',
            'payload',
            'provider_token',
            'start_parameter',
            'USD',
            [LabeledPriceType::create('label', 100)],
            [
                'providerData' => '{}',
                'photoUrl' => 'http://url',
                'photoSize' => 100,
                'photoWidth' => 100,
                'photoHeight' => 100,
                'needName' => true,
                'needPhoneNumber' => true,
                'needEmail' => true,
                'needShippingAddress' => true,
                'sendPhoneNumberToProvider' => true,
                'sendEmailToProvider' => true,
                'isFlexible' => true,
                'disableNotification' => true,
                'replyToMessageId' => 1,
                'allowSendingWithoutReply' => true,
                'replyMarkup' => static::buildInlineMarkupObject(),
            ]
        );
    }
}
