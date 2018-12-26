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
     * StopMessageLiveLocationMethod constructor.
     *
     * @param array|null $data
     *
     * @throws \Greenplugin\TelegramBot\Exception\BadArgumentException
     */
    public function __construct(array $data = null)
    {
        if ($data) {
            $this->fill($data);
        }
    }

    /**
     * @param int|string $chatId
     * @param array|null $data
     *
     * @throws \Greenplugin\TelegramBot\Exception\BadArgumentException
     *
     * @return StopMessageLiveLocationMethod
     */
    public static function create($chatId, array $data = null): StopMessageLiveLocationMethod
    {
        $method = new self($data);
        $method->chatId = $chatId;

        return $method;
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
        $method = new self($data);
        $method->inlineMessageId = $inlineMessageId;

        return $method;
    }
}
