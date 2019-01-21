<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\MethodInterface;

/**
 * Class SetGameHighScoresMethod.
 *
 * Use this method to get data for high score tables.
 * Will return the score of the specified user and several of his neighbors in a game.
 * On success, returns an Array of GameHighScore objects.
 *
 * This method will currently return scores for the target user, plus two of his closest neighbors on each side.
 * Will also return the top three users if the user and his neighbors are not among them. P
 * lease note that this behavior is subject to change
 *
 * @see https://core.telegram.org/bots/api#getgamehighscores
 */
class GetGameHighScoresMethod implements MethodInterface
{
    /**
     * Target user id.
     *
     * @var int
     */
    public $userId;

    /**
     * Optional. Required if inline_message_id is not specified. Unique identifier for the target chat.
     *
     * @var int|null
     */
    public $chatId;

    /**
     * Optional. Required if inline_message_id is not specified. Identifier of the sent message.
     *
     * @var int|null
     */
    public $messageId;

    /**
     * Optional. Required if chat_id and message_id are not specified. Identifier of the inline message.
     *
     * @var string|null
     */
    public $inlineMessageId;

    /**
     * @param int $userId
     * @param int $chatId
     * @param int $messageId
     *
     * @return GetGameHighScoresMethod
     */
    public static function create(int $userId, int $chatId, int $messageId): GetGameHighScoresMethod
    {
        $instance = new static();
        $instance->userId = $userId;
        $instance->chatId = $chatId;
        $instance->messageId = $messageId;

        return $instance;
    }

    /**
     * @param int    $userId
     * @param string $inlineMessageId
     *
     * @return GetGameHighScoresMethod
     */
    public static function createInline(int $userId, string $inlineMessageId): GetGameHighScoresMethod
    {
        $instance = new static();
        $instance->userId = $userId;
        $instance->inlineMessageId = $inlineMessageId;

        return $instance;
    }
}
