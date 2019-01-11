<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\SetMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Traits\ChatIdVariableTrait;
use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;

/**
 * Class SetChatDescriptionMethod.
 *
 * @see https://core.telegram.org/bots/api#setchatdescription
 */
class SetChatDescriptionMethod implements SetMethodAliasInterface
{
    use FillFromArrayTrait;
    use ChatIdVariableTrait;

    /**
     * Optional. New chat description, 0-255 characters.
     *
     * @var string|null
     */
    public $description;

    /**
     * @param int|string $chatId
     * @param array|null $data
     *
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     *
     * @return SetChatDescriptionMethod
     */
    public static function create($chatId, array $data = null): SetChatDescriptionMethod
    {
        $instance = new static();
        $instance->chatId = $chatId;
        if ($data) {
            $instance->fill($data, ['chatId']);
        }

        return $instance;
    }
}
