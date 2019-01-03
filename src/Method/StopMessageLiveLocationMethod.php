<?php

declare(strict_types=1);

namespace Greenplugin\TelegramBot\Method;

use Greenplugin\TelegramBot\Method\Traits\EditMessageVariablesTrait;
use Greenplugin\TelegramBot\Method\Traits\FillFromArrayTrait;

/**
 * Class StopMessageLiveLocationType.
 *
 * @see https://core.telegram.org/bots/api#stopmessagelivelocation
 */
class StopMessageLiveLocationMethod
{
    use FillFromArrayTrait;
    use EditMessageVariablesTrait;

    /**
     * @param int|string $chatId
     * @param int        $messageId
     * @param array|null $data
     *
     * @throws \Greenplugin\TelegramBot\Exception\BadArgumentException
     *
     * @return StopMessageLiveLocationMethod
     */
    public static function create($chatId, int $messageId, array $data = null): StopMessageLiveLocationMethod
    {
        $instance = new static();
        $instance->chatId = $chatId;
        $instance->messageId = $messageId;
        if ($data) {
            $instance->fill($data);
        }

        return $instance;
    }

    /**
     * @param string     $inlineMessageId
     * @param array|null $data
     *
     * @throws \Greenplugin\TelegramBot\Exception\BadArgumentException
     *
     * @return StopMessageLiveLocationMethod
     */
    public static function createInline(string $inlineMessageId, array $data = null): StopMessageLiveLocationMethod
    {
        $instance = new static();
        $instance->inlineMessageId = $inlineMessageId;
        if ($data) {
            $instance->fill($data);
        }

        return $instance;
    }
}
