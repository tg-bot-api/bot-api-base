<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type\InlineQueryResult;

use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;
use TgBotApi\BotApiBase\Type\InputMessageContent\InputMessageContentType;

/**
 * Class InlineQueryResultContactType.
 *
 * Represents a contact with a phone number. By default, this contact will be sent by the user.
 * Alternatively, you can use input_message_content to send a message with the specified content instead of the contact.
 *
 * @see https://core.telegram.org/bots/api#inlinequeryresultcontact
 */
class InlineQueryResultContactType extends InlineQueryResultType
{
    use FillFromArrayTrait;

    /**
     * Contact's phone number.
     *
     * @var string
     */
    public $phoneNumber;

    /**
     * Contact's first name.
     *
     * @var string
     */
    public $firstName;

    /**
     * Optional. Contact's last name.
     *
     * @var string|null
     */
    public $lastName;

    /**
     * Optional. Additional data about the contact in the form of a vCard, 0-2048 bytes.
     *
     * @var string|null
     */
    public $vcard;

    /**
     * Optional. Content of the message to be sent instead of the contact.
     *
     * @var InputMessageContentType|null
     */
    public $inputMessageContent;

    /**
     * Optional. Url of the thumbnail for the result.
     *
     * @var string|null
     */
    public $thumbUrl;

    /**
     * Optional. Thumbnail width.
     *
     * @var int|null
     */
    public $thumbWidth;

    /**
     * Optional. Thumbnail height.
     *
     * @var int|null
     */
    public $thumbHeight;

    /**
     * @param string     $id
     * @param string     $phoneNumber
     * @param string     $firstName
     * @param array|null $data
     *
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     *
     * @return InlineQueryResultContactType
     */
    public static function create(
        string $id,
        string $phoneNumber,
        string $firstName,
        array $data = null
    ): InlineQueryResultContactType {
        $instance = new static();
        $instance->type = static::TYPE_CONTACT;
        $instance->id = $id;
        $instance->phoneNumber = $phoneNumber;
        $instance->$firstName = $firstName;
        if ($data) {
            $instance->fill($data);
        }

        return $instance;
    }
}
