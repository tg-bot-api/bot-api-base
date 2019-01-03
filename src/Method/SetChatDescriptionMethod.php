<?php

declare(strict_types=1);

namespace Greenplugin\TelegramBot\Method;

use Greenplugin\TelegramBot\Method\Traits\ChatIdVariableTrait;
use Greenplugin\TelegramBot\Method\Traits\FillFromArrayTrait;

/**
 * Class SetChatDescriptionMethod.
 *
 * @see https://core.telegram.org/bots/api#setchatdescription
 */
class SetChatDescriptionMethod
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
     * @throws \Greenplugin\TelegramBot\Exception\BadArgumentException
     *
     * @return SetChatDescriptionMethod
     */
    public static function create($chatId, array $data = null): SetChatDescriptionMethod
    {
        $instance = new static();
        $instance->chatId = $chatId;
        if ($data) {
            $instance->fill($data);
        }

        return $instance;
    }
}
