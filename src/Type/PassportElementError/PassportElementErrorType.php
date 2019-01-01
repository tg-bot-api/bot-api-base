<?php

declare(strict_types=1);

namespace Greenplugin\TelegramBot\Type\PassportElementError;

use Greenplugin\TelegramBot\Exception\BadArgumentException;

/**
 * Class PassportElementErrorType.
 *
 * @see https://core.telegram.org/bots/api#passportelementerror
 */
abstract class PassportElementErrorType
{
    const ALLOWED_TYPES = [];
    /**
     * Error source, must be unspecified.
     *
     * @var string
     */
    public $source;

    /**
     * Type of element of the user's Telegram Passport which has the issue.
     *
     * @var string
     */
    public $type;

    /**
     * Error message.
     *
     * @var string
     */
    public $message;

    /**
     * PassportElementErrorType constructor.
     *
     * @param string $source
     * @param string $type
     * @param string $message
     *
     * @throws BadArgumentException
     */
    public function __construct(string $source, string $type, string $message)
    {
        if (!\in_array($type, static::ALLOWED_TYPES, true)) {
            throw new BadArgumentException(\sprintf(
                'parameter "type" should be one of the options: "%s". %s provided.',
                \implode('", "', static::ALLOWED_TYPES),
                $type
            ));
        }
        $this->source = $source;
        $this->type = $type;
        $this->message = $message;
    }
}
