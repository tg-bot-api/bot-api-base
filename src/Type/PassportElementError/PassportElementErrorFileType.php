<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type\PassportElementError;

/**
 * Class PassportElementErrorFileType.
 *
 * @see https://core.telegram.org/bots/api#passportelementerrorfile
 */
class PassportElementErrorFileType extends PassportElementErrorType
{
    const TYPE_UTILITY_BILL = 'utility_bill';
    const TYPE_BANK_STATEMENT = 'bank_statement';
    const TYPE_RENTAL_AGREEMENT = 'rental_agreement';
    const TYPE_PASSPORT_REGISTRATION = 'passport_registration';
    const TYPE_TEMPORARY_REGISTRATION = 'temporary_registration';

    const ALLOWED_TYPES = [
        self::TYPE_UTILITY_BILL,
        self::TYPE_BANK_STATEMENT,
        self::TYPE_RENTAL_AGREEMENT,
        self::TYPE_PASSPORT_REGISTRATION,
        self::TYPE_TEMPORARY_REGISTRATION,
    ];

    /**
     * Base64-encoded file hash.
     *
     * @var string
     */
    public $fileHash;

    /**
     * @param string $type
     * @param string $message
     * @param string $fileHash
     *
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     *
     * @return PassportElementErrorFileType
     */
    public static function create(
        string $type,
        string $message,
        string $fileHash
    ): PassportElementErrorFileType {
        $instance = parent::createBase('file', $type, $message);
        $instance->fileHash = $fileHash;

        return $instance;
    }
}
