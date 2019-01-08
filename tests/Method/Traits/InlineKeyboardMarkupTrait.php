<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method\Traits;

use TgBotApi\BotApiBase\Type\InlineKeyboardMarkupType;

trait InlineKeyboardMarkupTrait
{
    use InlineButtonTrait;

    /**
     * @return array
     */
    public function buildInlineMarkupArray(): array
    {
        return ['inline_keyboard' => [[
            $this->buildInlineKeyboardButtonArray(),
            $this->buildInlineKeyboardButtonArray(),
        ]]];
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     *
     * @return InlineKeyboardMarkupType
     */
    public function buildInlineMarkupObject(): InlineKeyboardMarkupType
    {
        return InlineKeyboardMarkupType::create([[
            $this->buildInlineKeyboardButtonObject(),
            $this->buildInlineKeyboardButtonObject(),
        ]]);
    }
}
