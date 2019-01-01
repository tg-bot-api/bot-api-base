<?php

declare(strict_types=1);

namespace Greenplugin\TelegramBot\Type\PassportElementError;

/**
 * Class PassportElementErrorFileType.
 *
 * @see https://core.telegram.org/bots/api#passportelementerrorfile
 */
class PassportElementErrorFilesType extends PassportElementErrorType
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
     * List of base64-encoded file hashes.
     *
     * @var string[]
     */
    public $fileHashes;

    /**
     * PassportElementErrorFileType constructor.
     *
     * @param string $type
     * @param string $message
     * @param string $fileHashes
     *
     * @throws \Greenplugin\TelegramBot\Exception\BadArgumentException
     */
    public function __construct(string $type, string $message, string $fileHashes)
    {
        parent::__construct('files', $type, $message);
        $this->fileHashes = $fileHashes;
    }
}
