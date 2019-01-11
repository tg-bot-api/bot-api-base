<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\AnswerMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;

/**
 * Class AnswerCallbackQueryMethod.
 *
 * Use this method to send answers to callback queries sent from inline keyboards.
 * The answer will be displayed to the user as a notification at the top of the chat screen or as an alert.
 * On success, True is returned.
 *
 * @see https://core.telegram.org/bots/api#answercallbackquery
 */
class AnswerCallbackQueryMethod implements AnswerMethodAliasInterface
{
    use FillFromArrayTrait;
    /**
     * Unique identifier for the query to be answered.
     *
     * @var string
     */
    public $callbackQueryId;

    /**
     * Optional. Text of the notification. If not specified, nothing will be shown to the user, 0-200 characters.
     *
     * @var string|null
     */
    public $text;

    /**
     * Optional. If true, an alert will be shown by the client instead of a notification at the top of the chat screen.
     * Defaults to false.
     *
     * @var bool|null
     */
    public $showAlert;

    /**
     * Optional. URL that will be opened by the user's client.
     * If you have created a Game and accepted the conditions via @Botfather,
     * specify the URL that opens your game – note that this will only work
     * if the query comes from a callback_game button.
     *
     * Otherwise, you may use links like t.me/your_bot?start=XXXX that open your bot with a parameter.
     *
     * @var string|null
     */
    public $url;

    /**
     * Optional. The maximum amount of time in seconds that the result of the callback query may be cached client-side.
     * Telegram apps will support caching starting in version 3.14. Defaults to 0.
     *
     * @var \DateTimeInterface|null
     */
    public $cacheTime;

    /**
     * @param string     $callbackQueryId
     * @param array|null $data
     *
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     *
     * @return AnswerCallbackQueryMethod
     */
    public static function create(string $callbackQueryId, array $data = null): AnswerCallbackQueryMethod
    {
        $instance = new static();
        $instance->callbackQueryId = $callbackQueryId;
        if ($data) {
            $instance->fill($data);
        }

        return $instance;
    }
}
