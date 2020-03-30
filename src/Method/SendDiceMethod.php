<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Exception\BadArgumentException;
use TgBotApi\BotApiBase\Method\Interfaces\SendMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;
use TgBotApi\BotApiBase\Method\Traits\SendToChatVariablesTrait;

/**
 * Class SendDiceMethod.
 *
 * Use this method to send a dice, which will have a random value from 1 to 6.
 * On success, the sent Message is returned.
 * (Yes, we're aware of the “proper” singular of die.
 * But it's awkward, and we decided to help it change.
 * One dice at a time!)
 *
 * @see https://core.telegram.org/bots/api#senddice
 */
class SendDiceMethod implements SendMethodAliasInterface
{
    use SendToChatVariablesTrait;
    use FillFromArrayTrait;

    /**
     * @param int|string $chatId
     *
     * @throws BadArgumentException
     */
    public static function create($chatId, array $data = null): SendDiceMethod
    {
        $instance = new static();
        $instance->chatId = $chatId;

        if ($data) {
            $instance->fill($data);
        }

        return $instance;
    }
}
