<?php

declare(strict_types=1);

namespace Greenplugin\TelegramBot\Type\PassportElementError;

/**
 * Class PassportElementErrorDataFieldType.
 *
 * @see https://core.telegram.org/bots/api#passportelementerrordatafield
 */
class PassportElementErrorDataFieldType extends PassportElementErrorType
{
    const TYPE_PERSONAL_DETAILS = 'personal_details';
    const TYPE_PASSPORT = 'passport';
    const TYPE_DRIVER_LICENSE = 'driver_license';
    const TYPE_IDENTITY_CARD = 'identity_card';
    const TYPE_INTERNAL_PASSPORT = 'internal_passport';
    const TYPE_ADDRESS = 'address';

    const ALLOWED_TYPES = [
        self::TYPE_PERSONAL_DETAILS,
        self::TYPE_PASSPORT,
        self::TYPE_DRIVER_LICENSE,
        self::TYPE_IDENTITY_CARD,
        self::TYPE_INTERNAL_PASSPORT,
        self::TYPE_ADDRESS,
    ];

    /**
     * Name of the data field which has the error.
     *
     * @var string
     */
    public $fieldName;

    /**
     * Base64-encoded data hash.
     *
     * @var string
     */
    public $dataHash;

    /**
     * PassportElementErrorDataFieldType constructor.
     *
     * @param string $type
     * @param string $message
     * @param string $fieldName
     * @param string $dataHash
     *
     * @throws \Greenplugin\TelegramBot\Exception\BadArgumentException
     */
    public function __construct(string $type, string $message, string $fieldName, string $dataHash)
    {
        parent::__construct('data', $type, $message);
        $this->fieldName = $fieldName;
        $this->dataHash = $dataHash;
    }
}
