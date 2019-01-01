<?php

declare(strict_types=1);

namespace Greenplugin\TelegramBot\Method\Interfaces;

/**
 * Interface EncryptedPassportElementTypes.
 */
interface EncryptedPassportElementTypes
{
    const TYPE_PERSONAL_DETAILS = 'personal_details';
    const TYPE_PASSPORT = 'passport';
    const TYPE_DRIVER_LICENSE = 'driver_license';
    const TYPE_IDENTITY_CARD = 'identity_card';
    const TYPE_INTERNATIONAL_PASSPORT = 'internal_passport';
    const TYPE_ADDRESS = 'address';
    const TYPE_UTILITY_BILL = 'utility_bill';
    const TYPE_BANK_STATEMENT = 'bank_statement';
    const TYPE_RENTAL_AGREEMENT = 'rental_agreement';
    const TYPE_PASSPORT_REGISTRATION = 'passport_registration';
    const TYPE_TEMPORARY_REGISTRATION = 'temporary_registration';
    const TYPE_PHONE_NUMBER = 'phone_number';
    const TYPE_EMAIL = 'email';
}
