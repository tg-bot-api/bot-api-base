<?php

declare(strict_types=1);

namespace Greenplugin\TelegramBot\Tests\Method;

use Greenplugin\TelegramBot\Method\Interfaces\HasParseModeVariableInterface;
use Greenplugin\TelegramBot\Method\SendMessageMethod;
use Greenplugin\TelegramBot\Type\InlineKeyboardMarkupType;

class SendMessageMethodTest extends MethodTestCase
{
    public function testEncode()
    {
        $botApi = $this->getBot('sendMessage', [
            'text' => 'test',
            'parse_mode' => 'HTML',
            'chat_id' => '1',
            'disable_web_page_preview' => true,
            'disable_notification' => true,
            'reply_to_message_id' => 1,
            'reply_markup' => '{"inline_keyboard":[]}',
        ]);

        $botApi->sendMessage(new SendMessageMethod('1', 'test', [
            'parseMode' => HasParseModeVariableInterface::PARSE_MODE_HTML,
            'disableWebPagePreview' => true,
            'disableNotification' => true,
            'replyToMessageId' => 1,
            'replyMarkup' => new InlineKeyboardMarkupType([]),
        ]));
    }
}
