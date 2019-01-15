<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\AnswerShippingQueryMethod;
use TgBotApi\BotApiBase\Type\LabeledPriceType;
use TgBotApi\BotApiBase\Type\ShippingOption;

class AnswerShippingQueryMethodTest extends MethodTestCase
{
    /**
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncodeSuccess(): void
    {
        $botApi = $this->getBot('answerShippingQuery', [
            'shipping_query_id' => 'id',
            'shipping_options' => [
                [
                    'id' => 'id',
                    'title' => 'title',
                    'prices' => [
                        ['label' => 'label', 'amount' => 200],
                        ['label' => 'label_2', 'amount' => 300],
                    ],
                ],
            ],
            'ok' => true,
        ], true);

        $botApi->answerShippingQuery(AnswerShippingQueryMethod::createSuccess(
            'id',
            [
                ShippingOption::create('id', 'title', [
                    LabeledPriceType::create('label', 200),
                    LabeledPriceType::create('label_2', 300),
                ]),
            ]
        ));
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncodeFail(): void
    {
        $botApi = $this->getBot('answerShippingQuery', [
            'shipping_query_id' => 'id',
            'ok' => false,
            'error_message' => 'message',
        ], true);

        $botApi->answerShippingQuery(AnswerShippingQueryMethod::createFail(
            'id',
            'message'
        ));
    }
}
