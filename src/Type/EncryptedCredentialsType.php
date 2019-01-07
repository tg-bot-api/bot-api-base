<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type;

/**
 * Class EncryptedCredentialsType.
 *
 * @see https://core.telegram.org/bots/api#encryptedcredentials
 */
class EncryptedCredentialsType
{
    /**
     * Base64-encoded encrypted JSON-serialized data with unique user's payload,
     * data hashes and secrets required for EncryptedPassportElement decryption and authentication.
     *
     * @var string
     */
    public $data;

    /**
     * Base64-encoded data hash for data authentication.
     *
     * @var string
     */
    public $hash;

    /**
     * Base64-encoded secret, encrypted with the bot's public RSA key, required for data decryption.
     *
     * @var string
     */
    public $secret;
}
