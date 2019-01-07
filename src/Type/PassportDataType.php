<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type;

/**
 * Class PassportDataType.
 *
 * @see https://core.telegram.org/bots/api#passportdata
 */
class PassportDataType
{
    /**
     * Array with information about documents and other Telegram Passport elements that was shared with the bot.
     *
     * @var EncryptedPassportElementType[]
     */
    public $data;

    /**
     * Encrypted credentials required to decrypt the data.
     *
     * @var EncryptedCredentialsType
     */
    public $credentials;
}
