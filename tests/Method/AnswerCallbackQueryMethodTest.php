<?php

declare(strict_types=1);

namespace Greenplugin\TelegramBot\Tests\Method;

use Greenplugin\TelegramBot\Method\AnswerCallbackQueryMethod;

class AnswerCallbackQueryMethodTest extends MethodTestCase
{
    /**
     * @throws \Greenplugin\TelegramBot\Exception\BadArgumentException
     * @throws \Exception
     */
    public function testEncode()
    {
        $dateTime = new \DateTimeImmutable();

        $botApi = $this->getBot('answerCallbackQuery', [
            'callback_query_id' => 'id',
            'text' => 'text of answer',
            'show_alert' => true,
            'url' => 'url',
            'cache_time' => $dateTime->format('U'),
        ], true);

        $botApi->answerCallbackQuery(AnswerCallbackQueryMethod::create('id', [
            'text' => 'text of answer',
            'showAlert' => true,
            'url' => 'url',
            'cacheTime' => $dateTime,
        ]));
    }

    /**
     * @throws \Greenplugin\TelegramBot\Exception\BadArgumentException
     * @throws \Exception
     */
    public function testEncodePartial()
    {
        $botApi = $this->getBot('answerCallbackQuery', [
            'callback_query_id' => 'id',
        ], true);

        $botApi->answerCallbackQuery(AnswerCallbackQueryMethod::create('id'));
    }

    /**
     * @throws \Greenplugin\TelegramBot\Exception\BadArgumentException
     * @throws \Exception
     */
    public function testEncodeFalse()
    {
        $dateTime = new \DateTimeImmutable();

        $botApi = $this->getBot('answerCallbackQuery', [
            'callback_query_id' => 'id',
            'text' => 'text of answer',
            'show_alert' => false,
            'url' => 'url',
            'cache_time' => $dateTime->format('U'),
        ], true);

        $botApi->answerCallbackQuery(AnswerCallbackQueryMethod::create('id', [
            'text' => 'text of answer',
            'showAlert' => false,
            'url' => 'url',
            'cacheTime' => $dateTime,
        ]));
    }
}
