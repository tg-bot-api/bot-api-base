<?php
declare(strict_types=1);

namespace Greenplugin\TelegramBot\Method;

use Greenplugin\TelegramBot\Method\Traits\EditMessageVariablesTrait;
use Greenplugin\TelegramBot\Method\Traits\FillFromArrayTrait;

/**
 * Class StopMessageLiveLocationType
 * @link https://core.telegram.org/bots/api#stopmessagelivelocation
 */
class StopMessageLiveLocationMethod
{
    use FillFromArrayTrait;
    use EditMessageVariablesTrait;

    /**
     * StopMessageLiveLocationMethod constructor.
     * @param array|null $data
     * @throws \Greenplugin\TelegramBot\Exception\BadArgumentException
     */
    public function __construct(array $data = null)
    {
        if ($data) {
            $this->fill($data);
        }
    }

    /**
     * @param integer|string $chatId
     * @param array|null $data
     * @return StopMessageLiveLocationMethod
     * @throws \Greenplugin\TelegramBot\Exception\BadArgumentException
     */
    public static function create($chatId, array $data = null)
    {
        $method = new self($data);
        $method->chatId = $chatId;
        return $method;
    }

    /**
     * @param string $inlineMessageId
     * @param array|null $data
     * @return StopMessageLiveLocationMethod
     * @throws \Greenplugin\TelegramBot\Exception\BadArgumentException
     */
    public static function createInline(string $inlineMessageId, array $data = null)
    {
        $method = new self($data);
        $method->inlineMessageId = $inlineMessageId;
        return $method;
    }
}
