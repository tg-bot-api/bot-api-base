<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method\Traits;

use TgBotApi\BotApiBase\Type\KeyboardButtonType;

trait KeyboardButtonTrait
{
    protected function buildReplyKeyboardButtonArray()
    {
        return [
            'text' => 'text',
            'request_contact' => true,
            'request_location' => true,
        ];
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     *
     * @return KeyboardButtonType
     */
    protected function buildReplyKeyboardButtonObject(): KeyboardButtonType
    {
        return KeyboardButtonType::create('text', [
            'requestContact' => true,
            'requestLocation' => true,
        ]);
    }
}
