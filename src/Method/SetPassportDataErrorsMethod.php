<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\SetMethodAliasInterface;
use TgBotApi\BotApiBase\Type\PassportElementError\PassportElementErrorType;

/**
 * Class SetPassportDataErrorsMethod.
 *
 * Informs a user that some of the Telegram Passport elements they provided contains errors.
 * The user will not be able to re-submit their Passport to you until the errors are fixed
 * (the contents of the field for which you returned the error must change). Returns True on success.
 *
 * Use this if the data submitted by the user doesn't satisfy the standards your service requires for any reason.
 * For example, if a birthday date seems invalid, a submitted document is blurry,
 * a scan shows evidence of tampering, etc.
 * Supply some details in the error message to make sure the user knows how to correct the issues.
 *
 * @see https://core.telegram.org/bots/api#setpassportdataerrors
 * @see https://core.telegram.org/passport
 */
class SetPassportDataErrorsMethod implements SetMethodAliasInterface
{
    /**
     * User identifier.
     *
     * @var int
     */
    public $userId;

    /**
     * A JSON-serialized array describing the errors.
     *
     * @var PassportElementErrorType[]
     */
    public $errors;

    /**
     * SetPassportDataErrorsMethod constructor.
     *
     * @param int $userId
     * @param PassportElementErrorType[]
     * @param array $errors
     *
     * @return SetPassportDataErrorsMethod
     */
    public static function create(int $userId, array $errors): SetPassportDataErrorsMethod
    {
        $instance = new static();
        $instance->userId = $userId;
        $instance->errors = $errors;

        return $instance;
    }
}
