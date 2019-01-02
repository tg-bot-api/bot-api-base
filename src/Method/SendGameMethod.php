<?php

declare(strict_types=1);

namespace Greenplugin\TelegramBot\Method;

use Greenplugin\TelegramBot\Method\Traits\FillFromArrayTrait;
use Greenplugin\TelegramBot\Method\Traits\ReplyMarkupVariableTrait;

/**
 * Class SendGameType.
 *
 * @see https://core.telegram.org/bots/api#sendgame
 */
class SendGameMethod
{
    use FillFromArrayTrait;
    use ReplyMarkupVariableTrait;

    /**
     * Unique identifier for the target chat.
     *
     * @var int
     */
    public $chatId;

    /**
     * Short name of the game, serves as the unique identifier for the game. Set up your games via Botfather.
     *
     * @var string
     */
    public $gameShortName;

    /**
     * Sends the message silently. Users will receive a notification with no sound.
     *
     * @var bool|null
     */
    public $disableNotification;

    /**
     * If the message is a reply, ID of the original message.
     *
     * @var int|null
     */
    public $replyToMessageId;

    /**
     * SendGameType constructor.
     *
     * @param int        $chatId
     * @param string     $gameShortName
     * @param array|null $data
     *
     * @throws \Greenplugin\TelegramBot\Exception\BadArgumentException
     */
    public function __construct(int $chatId, string $gameShortName, array $data = null)
    {
        $this->chatId = $chatId;
        $this->gameShortName = $gameShortName;
        if ($data) {
            $this->fill($data);
        }
    }
}
