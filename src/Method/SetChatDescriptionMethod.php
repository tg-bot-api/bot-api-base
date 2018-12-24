<?php
declare(strict_types=1);

namespace Greenplugin\TelegramBot\Method;

use Greenplugin\TelegramBot\Method\Traits\ChatIdVariableTrait;
use Greenplugin\TelegramBot\Method\Traits\FillFromArrayTrait;

/**
 * Class SetChatDescriptionMethod
 * @link https://core.telegram.org/bots/api#setchatdescription
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
     * SetChatDescriptionMethod constructor.
     * @param int|string $chatId
     * @param array|null $data
     * @throws \Greenplugin\TelegramBot\Exception\BadArgumentException
     */
    public function __construct($chatId, array $data = null)
    {
        $this->chatId = $chatId;
        if ($data) {
            $this->fill($data);
        }
    }
}
