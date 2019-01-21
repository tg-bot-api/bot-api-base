<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method\Interfaces;

/**
 * Interface EncryptedPassportElementTypes.
 */
interface EncryptedPassportElementTypes
{
    public const TYPE_PERSONAL_DETAILS = 'personal_details';
    public const TYPE_PASSPORT = 'passport';
    public const TYPE_DRIVER_LICENSE = 'driver_license';
    public const TYPE_IDENTITY_CARD = 'identity_card';
    public const TYPE_INTERNAL_PASSPORT = 'internal_passport';
    public const TYPE_ADDRESS = 'address';
    public const TYPE_UTILITY_BILL = 'utility_bill';
    public const TYPE_BANK_STATEMENT = 'bank_statement';
    public const TYPE_RENTAL_AGREEMENT = 'rental_agreement';
    public const TYPE_PASSPORT_REGISTRATION = 'passport_registration';
    public const TYPE_TEMPORARY_REGISTRATION = 'temporary_registration';
    public const TYPE_PHONE_NUMBER = 'phone_number';
    public const TYPE_EMAIL = 'email';
}
