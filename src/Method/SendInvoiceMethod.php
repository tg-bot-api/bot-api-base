<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\SendMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;
use TgBotApi\BotApiBase\Method\Traits\SendToChatVariablesTrait;
use TgBotApi\BotApiBase\Type\InlineKeyboardMarkupType;
use TgBotApi\BotApiBase\Type\LabeledPriceType;

/**
 * Class SendInvoiceMethod.
 *
 * @see https://core.telegram.org/bots/api#sendinvoice
 */
class SendInvoiceMethod implements SendMethodAliasInterface
{
    use FillFromArrayTrait;
    use SendToChatVariablesTrait;

    /**
     * Product name, 1-32 characters.
     *
     * @var string
     */
    public $title;

    /**
     * Product description, 1-255 characters.
     *
     * @var string
     */
    public $description;

    /**
     * Bot-defined invoice payload, 1-128 bytes.
     * This will not be displayed to the user, use for your internal processes.
     *
     * @var string
     */
    public $payload;

    /**
     * Payments provider token, obtained via Botfather.
     *
     * @var string
     */
    public $providerToken;

    /**
     * Unique deep-linking parameter that can be used to generate this invoice when used as a start parameter.
     *
     * @var string
     */
    public $startParameter;

    /**
     * Three-letter ISO 4217 currency code, see more on currencies.
     *
     * @var string
     */
    public $currency;

    /**
     * Price breakdown, a list of components
     * (e.g. product price, tax, discount, delivery cost, delivery tax, bonus, etc.).
     *
     * @var LabeledPriceType[]
     */
    public $prices;

    /**
     * Optional. JSON-encoded data about the invoice, which will be shared with the payment provider.
     * A detailed description of required fields should be provided by the payment provider.
     *
     * @var string|null
     */
    public $providerData;

    /**
     * Optional. URL of the product photo for the invoice.
     * Can be a photo of the goods or a marketing image for a service.
     * People like it better when they see what they are paying for.
     *
     * @var string|null
     */
    public $photoUrl;

    /**
     * Optional. Photo size.
     *
     * @var int|null
     */
    public $photoSize;

    /**
     * Optional. Photo width.
     *
     * @var int|null
     */
    public $photoWidth;

    /**
     * Optional. Photo height.
     *
     * @var int|null
     */
    public $photoHeight;

    /**
     * Optional. Pass True, if you require the user's full name to complete the order.
     *
     * @var bool|null
     */
    public $needName;

    /**
     * Optional. Pass True, if you require the user's phone number to complete the order.
     *
     * @var bool|null
     */
    public $needPhoneNumber;

    /**
     * Optional. Pass True, if you require the user's email address to complete the order.
     *
     * @var bool|null
     */
    public $needEmail;

    /**
     * Optional. Pass True, if you require the user's shipping address to complete the order.
     *
     * @var bool|null
     */
    public $needShippingAddress;

    /**
     * Optional. Pass True, if user's phone number should be sent to provider.
     *
     * @var bool|null
     */
    public $sendPhoneNumberToProvider;

    /**
     * Optional. Pass True, if user's email address should be sent to provider.
     *
     * @var bool|null
     */
    public $sendEmailToProvider;

    /**
     * Optional. Pass True, if the final price depends on the shipping method.
     *
     * @var bool|null
     */
    public $isFlexible;

    /**
     * Optional. A JSON-serialized object for an inline keyboard. If empty, one 'Pay total price' button will be shown.
     * If not empty, the first button must be a Pay button.
     *
     * @var InlineKeyboardMarkupType|null
     */
    public $replyMarkup;

    /**
     * @param int|string         $chatId
     * @param LabeledPriceType[] $prices
     *
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public static function create(
        $chatId,
        string $title,
        string $description,
        string $payload,
        string $providerToken,
        string $startParameter,
        string $currency,
        array $prices,
        array $data = null
    ): SendInvoiceMethod {
        $instance = new static();
        $instance->chatId = $chatId;
        $instance->title = $title;
        $instance->description = $description;
        $instance->payload = $payload;
        $instance->providerToken = $providerToken;
        $instance->startParameter = $startParameter;
        $instance->currency = $currency;
        $instance->prices = $prices;

        if ($data) {
            $instance->fill($data);
        }

        return $instance;
    }
}
