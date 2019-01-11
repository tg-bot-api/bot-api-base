<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\EditMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Traits\EditMessageVariablesTrait;
use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;

/**
 * Class EditMessageReplyMarkupMethod.
 *
 * @see https://core.telegram.org/bots/api#editmessagereplymarkup
 */
class EditMessageReplyMarkupMethod implements EditMethodAliasInterface
{
    use FillFromArrayTrait;
    use EditMessageVariablesTrait;

    /**
     * @param int|string $chatId
     * @param int        $messageId
     * @param array|null $data
     *
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     *
     * @return EditMessageReplyMarkupMethod
     */
    public static function create($chatId, int $messageId, array $data = null): EditMessageReplyMarkupMethod
    {
        $instance = new self();
        $instance->chatId = $chatId;
        $instance->messageId = $messageId;
        if ($data) {
            $instance->fill($data, ['chatId', 'messageId', 'inlineMessageId']);
        }

        return $instance;
    }

    /**
     * @param string     $inlineMessageId
     * @param array|null $data
     *
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     *
     * @return EditMessageReplyMarkupMethod
     */
    public static function createInline(
        string $inlineMessageId,
        array $data = null
    ): EditMessageReplyMarkupMethod {
        $instance = new self();
        $instance->inlineMessageId = $inlineMessageId;
        if ($data) {
            $instance->fill($data, ['chatId', 'messageId', 'inlineMessageId']);
        }

        return $instance;
    }
}
