<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method\Traits;

use TgBotApi\BotApiBase\Type\CallbackGameType;
use TgBotApi\BotApiBase\Type\InlineKeyboardButtonType;

trait InlineButtonTrait
{
    protected static function buildInlineKeyboardButtonArray($newKeys = [])
    {
        return \array_merge(
            [
                'text' => 'text',
                'url' => 'url',
                'callback_data' => 'callback_data',
                'switch_inline_query' => 'switch_inline_query',
                'switch_inline_query_current_chat' => 'switch_inline_query_current_chat',
                'callback_game' => [],
            ],
            $newKeys
        );
    }

    /**
     * @param null $replacement
     *
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    protected static function buildInlineKeyboardButtonObject($replacement = null): InlineKeyboardButtonType
    {
        return InlineKeyboardButtonType::create('text', $replacement ?? [
                'url' => 'url',
                'callbackData' => 'callback_data',
                'switchInlineQuery' => 'switch_inline_query',
                'switchInlineQueryCurrentChat' => 'switch_inline_query_current_chat',
                'callbackGame' => CallbackGameType::create(),
            ]);
    }
}
