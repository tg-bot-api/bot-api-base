<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\StopMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Traits\EditMessageVariablesTrait;
use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;

/**
 * Class StopMessageLiveLocationType.
 *
 * @see https://core.telegram.org/bots/api#stopmessagelivelocation
 */
class StopMessageLiveLocationMethod implements StopMethodAliasInterface
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
     * @return StopMessageLiveLocationMethod
     */
    public static function create($chatId, int $messageId, array $data = null): StopMessageLiveLocationMethod
    {
        $instance = new static();
        $instance->chatId = $chatId;
        $instance->messageId = $messageId;
        if ($data) {
            $instance->fill($data, ['messageId', 'chatId', 'inlineMessageId']);
        }

        return $instance;
    }

    /**
     * @param string     $inlineMessageId
     * @param array|null $data
     *
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     *
     * @return StopMessageLiveLocationMethod
     */
    public static function createInline(string $inlineMessageId, array $data = null): StopMessageLiveLocationMethod
    {
        $instance = new static();
        $instance->inlineMessageId = $inlineMessageId;
        if ($data) {
            $instance->fill($data, ['messageId', 'chatId', 'inlineMessageId']);
        }

        return $instance;
    }
}
