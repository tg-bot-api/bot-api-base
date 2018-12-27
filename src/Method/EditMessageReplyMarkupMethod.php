<?php

declare(strict_types=1);

namespace Greenplugin\TelegramBot\Method;

use Greenplugin\TelegramBot\Method\Traits\EditMessageVariablesTrait;
use Greenplugin\TelegramBot\Method\Traits\FillFromArrayTrait;

/**
 * Class EditMessageReplyMarkupMethod.
 *
 * @see https://core.telegram.org/bots/api#editmessagereplymarkup
 */
class EditMessageReplyMarkupMethod
{
    use FillFromArrayTrait;
    use EditMessageVariablesTrait;

    /**
     * EditMessageReplyMarkupMethod constructor.
     *
     * @param int|string $chatId
     * @param array|null $data
     *
     * @throws \Greenplugin\TelegramBot\Exception\BadArgumentException
     */
    public function __construct($chatId, array $data = null)
    {
        $this->chatId = $chatId;
        if ($data) {
            $this->fill($data);
        }
    }

    /**
     * @param int|string $chatId
     * @param int        $messageId
     * @param array|null $data
     *
     * @throws \Greenplugin\TelegramBot\Exception\BadArgumentException
     *
     * @return EditMessageReplyMarkupMethod
     */
    public static function create($chatId, int $messageId, array $data = null): EditMessageReplyMarkupMethod
    {
        $instance = new self($chatId, $data);
        $instance->messageId = $messageId;

        return $instance;
    }

    /**
     * @param int|string $chatId
     * @param string     $inlineMessageId
     * @param array|null $data
     *
     * @throws \Greenplugin\TelegramBot\Exception\BadArgumentException
     *
     * @return EditMessageReplyMarkupMethod
     */
    public static function createInline(
        $chatId,
        string $inlineMessageId,
        array $data = null
    ): EditMessageReplyMarkupMethod {
        $instance = new self($chatId, $data);
        $instance->inlineMessageId = $inlineMessageId;

        return $instance;
    }
}
