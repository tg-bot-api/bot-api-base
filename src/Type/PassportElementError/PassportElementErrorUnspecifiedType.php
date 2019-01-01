<?php

declare(strict_types=1);

namespace Greenplugin\TelegramBot\Type\PassportElementError;

use Greenplugin\TelegramBot\Method\Interfaces\EncryptedPassportElementTypes;

/**
 * Class PassportElementErrorUnspecifiedType.
 *
 * @see https://core.telegram.org/bots/api#passportelementerrorunspecified
 */
class PassportElementErrorUnspecifiedType extends PassportElementErrorType implements EncryptedPassportElementTypes
{
    const ALLOWED_TYPES = [
        self::TYPE_PERSONAL_DETAILS,
        self::TYPE_PASSPORT,
        self::TYPE_DRIVER_LICENSE,
        self::TYPE_IDENTITY_CARD,
        self::TYPE_INTERNATIONAL_PASSPORT,
        self::TYPE_ADDRESS,
        self::TYPE_UTILITY_BILL,
        self::TYPE_BANK_STATEMENT,
        self::TYPE_RENTAL_AGREEMENT,
        self::TYPE_PASSPORT_REGISTRATION,
        self::TYPE_TEMPORARY_REGISTRATION,
        self::TYPE_PHONE_NUMBER,
        self::TYPE_EMAIL,
    ];
    /**
     * Base64-encoded element hash.
     *
     * @var string
     */
    public $elementHash;

    /**
     * PassportElementErrorUnspecifiedType constructor.
     *
     * @param string $type
     * @param string $message
     * @param string $elementHash
     *
     * @throws \Greenplugin\TelegramBot\Exception\BadArgumentException
     */
    public function __construct(string $type, string $message, string $elementHash)
    {
        parent::__construct('unspecified', $type, $message);
        $this->elementHash = $elementHash;
    }
}
