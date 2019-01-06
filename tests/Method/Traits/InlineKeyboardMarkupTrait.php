<?php

declare(strict_types=1);

namespace Greenplugin\TelegramBot\Tests\Method\Traits;

use Greenplugin\TelegramBot\Type\InlineKeyboardMarkupType;

trait InlineKeyboardMarkupTrait
{
    use InlineButtonTrait;

    public function buildMarkupArray()
    {
        return ['inline_keyboard' => [[$this->buildInlineKeyboardArray(), $this->buildInlineKeyboardArray()]]];
    }

    public function builInlinedMarkupObject(): InlineKeyboardMarkupType
    {
        return InlineKeyboardMarkupType::create([[
            $this->buildInlineKeyboardObject(),
            $this->buildInlineKeyboardObject(),
        ]]);
    }
}
