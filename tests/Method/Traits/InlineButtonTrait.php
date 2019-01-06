<?php

declare(strict_types=1);

namespace Greenplugin\TelegramBot\Tests\Method\Traits;

use Greenplugin\TelegramBot\Type\CallbackGameType;
use Greenplugin\TelegramBot\Type\InlineKeyboardButtonType;

trait InlineButtonTrait
{
    protected function buildInlineKeyboardArray($newKeys = [])
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
     * @throws \Greenplugin\TelegramBot\Exception\BadArgumentException
     *
     * @return InlineKeyboardButtonType
     */
    protected function buildInlineKeyboardObject($replacement = null): InlineKeyboardButtonType
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
