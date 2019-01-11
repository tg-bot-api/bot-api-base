<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method\Traits;

use TgBotApi\BotApiBase\Type\ReplyKeyboardMarkupType;

trait ReplyKeyboardMarkupTrait
{
    use KeyboardButtonTrait;

    /**
     * @return array
     */
    public function buildReplyMarkupArray(): array
    {
        return [
            'keyboard' => [[
                $this->buildReplyKeyboardButtonArray(),
                $this->buildReplyKeyboardButtonArray(),
            ]],
            'resize_keyboard' => true,
            'one_time_keyboard' => true,
            'selective' => true,
        ];
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     *
     * @return ReplyKeyboardMarkupType
     */
    public function buildReplyMarkupObject(): ReplyKeyboardMarkupType
    {
        return ReplyKeyboardMarkupType::create(
            [[
                $this->buildReplyKeyboardButtonObject(),
                $this->buildReplyKeyboardButtonObject(),
            ]],
            [
                'resizeKeyboard' => true,
                'oneTimeKeyboard' => true,
                'selective' => true,
            ]
        );
    }
}
