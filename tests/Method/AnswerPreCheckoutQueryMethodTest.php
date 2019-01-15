<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\AnswerPreCheckoutQueryMethod;

class AnswerPreCheckoutQueryMethodTest extends MethodTestCase
{
    /**
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncodeSuccess(): void
    {
        $botApi = $this->getBot('answerPreCheckoutQuery', [
            'pre_checkout_query_id' => 'id',
            'ok' => true,
        ], true);

        $botApi->answerPreCheckoutQuery(AnswerPreCheckoutQueryMethod::createSuccess('id'));
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncodeFail(): void
    {
        $botApi = $this->getBot('answerPreCheckoutQuery', [
            'pre_checkout_query_id' => 'id',
            'ok' => false,
            'error_message' => 'message',
        ], true);

        $botApi->answerPreCheckoutQuery(AnswerPreCheckoutQueryMethod::createFail(
            'id',
            'message'
        ));
    }
}
