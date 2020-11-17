<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\SendMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;
use TgBotApi\BotApiBase\Method\Traits\SendToChatVariablesTrait;
use TgBotApi\BotApiBase\Type\InlineKeyboardMarkupType;

/**
 * Class SendGameType.
 *
 * @see https://core.telegram.org/bots/api#sendgame
 */
class SendGameMethod implements SendMethodAliasInterface
{
    use FillFromArrayTrait;
    use SendToChatVariablesTrait;

    /**
     * Short name of the game, serves as the unique identifier for the game. Set up your games via Botfather.
     *
     * @var string
     */
    public $gameShortName;

    /**
     * Optional. A JSON-serialized object for an inline keyboard. If empty, one 'Play game_title' button will be shown.
     * If not empty, the first button must launch the game.
     *
     * @var InlineKeyboardMarkupType|null
     */
    public $replyMarkup;

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public static function create(int $chatId, string $gameShortName, array $data = null): SendGameMethod
    {
        $instance = new static();
        $instance->chatId = $chatId;
        $instance->gameShortName = $gameShortName;
        if ($data) {
            $instance->fill($data);
        }

        return $instance;
    }
}
