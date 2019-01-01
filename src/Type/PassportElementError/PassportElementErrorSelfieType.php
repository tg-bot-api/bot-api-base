<?php

declare(strict_types=1);

namespace Greenplugin\TelegramBot\Type\PassportElementError;

/**
 * Class PassportElementErrorSelfieType.
 *
 * @see https://core.telegram.org/bots/api#passportelementerrorselfie
 */
class PassportElementErrorSelfieType extends PassportElementErrorType
{
    const TYPE_PASSPORT = 'passport';
    const TYPE_DRIVER_LICENSE = 'driver_license';
    const TYPE_IDENTITY_CARD = 'identity_card';
    const TYPE_INTERNAL_PASSPORT = 'internal_passport';

    const ALLOWED_TYPES = [
        self::TYPE_PASSPORT,
        self::TYPE_DRIVER_LICENSE,
        self::TYPE_IDENTITY_CARD,
        self::TYPE_INTERNAL_PASSPORT,
    ];

    /**
     * Base64-encoded hash of the file with the selfie.
     *
     * @var string
     */
    public $fileHash;

    /**
     * PassportElementErrorSelfieType constructor.
     *
     * @param string $type
     * @param string $message
     * @param string $fileHash
     *
     * @throws \Greenplugin\TelegramBot\Exception\BadArgumentException
     */
    public function __construct(string $type, string $message, string $fileHash)
    {
        parent::__construct('selfie', $type, $message);
        $this->fileHash = $fileHash;
    }
}
