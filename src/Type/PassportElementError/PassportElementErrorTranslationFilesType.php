<?php

declare(strict_types=1);

namespace Greenplugin\TelegramBot\Type\PassportElementError;

/**
 * Class PassportElementErrorTranslationFilesType.
 *
 * @see https://core.telegram.org/bots/api#passportelementerrortranslationfiles
 */
class PassportElementErrorTranslationFilesType extends PassportElementErrorType
{
    const TYPE_PASSPORT = 'passport';
    const TYPE_DRIVER_LICENSE = 'driver_license';
    const TYPE_IDENTITY_CARD = 'identity_card';
    const TYPE_INTERNAL_PASSPORT = 'internal_passport';
    const TYPE_UTILITY_BILL = 'utility_bill';
    const TYPE_BANK_STATEMENT = 'bank_statement';
    const TYPE_RENTAL_AGREEMENT = 'rental_agreement';
    const TYPE_PASSPORT_REGISTRATION = 'passport_registration';
    const TYPE_TEMPORARY_REGISTRATION = 'temporary_registration';

    const ALLOWED_TYPES = [
        self::TYPE_PASSPORT,
        self::TYPE_DRIVER_LICENSE,
        self::TYPE_IDENTITY_CARD,
        self::TYPE_INTERNAL_PASSPORT,
        self::TYPE_UTILITY_BILL,
        self::TYPE_BANK_STATEMENT,
        self::TYPE_RENTAL_AGREEMENT,
        self::TYPE_PASSPORT_REGISTRATION,
        self::TYPE_TEMPORARY_REGISTRATION,
    ];

    /**
     * List of base64-encoded file hashes.
     *
     * @var string[]
     */
    public $fileHashes;

    /**
     * PassportElementErrorTranslationFileType constructor.
     *
     * @param string $type
     * @param string $message
     * @param string $fileHashes
     *
     * @throws \Greenplugin\TelegramBot\Exception\BadArgumentException
     */
    public function __construct(string $type, string $message, string $fileHashes)
    {
        parent::__construct('translation_files', $type, $message);
        $this->fileHashes = $fileHashes;
    }
}
