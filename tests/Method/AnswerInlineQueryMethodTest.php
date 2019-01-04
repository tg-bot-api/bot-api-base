<?php

declare(strict_types=1);

namespace Greenplugin\TelegramBot\Tests\Method;

use Greenplugin\TelegramBot\Method\AnswerInlineQueryMethod;
use Greenplugin\TelegramBot\Type\CallbackGameType;
use Greenplugin\TelegramBot\Type\InlineKeyboardButtonType;
use Greenplugin\TelegramBot\Type\InlineKeyboardMarkupType;
use Greenplugin\TelegramBot\Type\InlineQueryResult\InlineQueryResultArticleType;
use Greenplugin\TelegramBot\Type\InlineQueryResult\InlineQueryResultDocumentType;
use Greenplugin\TelegramBot\Type\InputMessageContent\InputTextMessageContentType;

/**
 * Class AnswerInlineQueryMethodTest.
 *
 * @todo add all InlineQueryTypes
 */
class AnswerInlineQueryMethodTest extends MethodTestCase
{
    /**
     * @throws \Greenplugin\TelegramBot\Exception\BadArgumentException
     * @throws \Greenplugin\TelegramBot\Exception\ResponseException
     * @throws \Exception
     */
    public function testEncode()
    {
        $dateTime = new \DateTimeImmutable();

        $botApi = $this->getBot('answerInlineQuery', [
            'inline_query_id' => 'inline_query_id',
            'results' => [
                [
                    'type' => 'article',
                    'id' => 'id',
                    'title' => 'title',
                    'input_message_content' => [
                        'message_text' => 'InputTextMessageContentType',
                        'parse_mode' => InputTextMessageContentType::PARSE_MODE_MARKDOWN,
                        'disable_web_page_preview' => true,
                    ],
                    'reply_markup' => [
                        'inline_keyboard' => [
                            [
                                [
                                    'text' => 'text',
                                    'url' => 'url',
                                    'callback_data' => 'callback_data',
                                    'switch_inline_query' => 'switch_inline_query',
                                    'switch_inline_query_current_chat' => 'switch_inline_query_current_chat',
                                    'callback_game' => [],
                                ],
                                [
                                    'text' => 'text2',
                                    'url' => 'url',
                                    'callback_data' => 'callback_data',
                                    'switch_inline_query' => 'switch_inline_query',
                                    'switch_inline_query_current_chat' => 'switch_inline_query_current_chat',
                                    'pay' => true,
                                ],
                            ],
                            [
                                [
                                    'text' => 'text3',
                                    'url' => 'url',
                                    'callback_data' => 'callback_data',
                                    'switch_inline_query' => 'switch_inline_query',
                                    'switch_inline_query_current_chat' => 'switch_inline_query_current_chat',
                                ],
                            ],
                        ],
                    ],
                    'url' => 'url',
                    'hide_url' => true,
                    'description' => 'description',
                    'thumb_url' => 'thumb_url',
                    'thumb_width' => 320,
                    'thumb_height' => 320,
                ],
                [
                    'type' => 'article',
                    'id' => 'id',
                    'title' => 'title',
                    'input_message_content' => [
                        'message_text' => 'InputTextMessageContentType2',
                        'parse_mode' => InputTextMessageContentType::PARSE_MODE_MARKDOWN,
                        'disable_web_page_preview' => true,
                    ],
                    'reply_markup' => [
                        'inline_keyboard' => [
                            [
                                [
                                    'text' => 'text',
                                    'url' => 'url',
                                    'callback_data' => 'callback_data',
                                    'switch_inline_query' => 'switch_inline_query',
                                    'switch_inline_query_current_chat' => 'switch_inline_query_current_chat',
                                    'callback_game' => [],
                                ],
                                [
                                    'text' => 'text2',
                                    'url' => 'url',
                                    'callback_data' => 'callback_data',
                                    'switch_inline_query' => 'switch_inline_query',
                                    'switch_inline_query_current_chat' => 'switch_inline_query_current_chat',
                                    'pay' => true,
                                ],
                            ],
                            [
                                [
                                    'text' => 'text3',
                                    'url' => 'url',
                                    'callback_data' => 'callback_data',
                                    'switch_inline_query' => 'switch_inline_query',
                                    'switch_inline_query_current_chat' => 'switch_inline_query_current_chat',
                                ],
                            ],
                        ],
                    ],
                    'url' => 'url',
                    'hide_url' => true,
                    'description' => 'description',
                    'thumb_url' => 'thumb_url',
                    'thumb_width' => 320,
                    'thumb_height' => 320,
                ],
            ],
            'cache_time' => $dateTime->format('U'),
            'is_personal' => true,
            'next_offset' => 'next_offset',
            'switch_pm_text' => 'switch_pm_text',
            'switch_pm_parameter' => 'switch_pm_parameter',
        ], true, ['results']);

        $results = [
            InlineQueryResultArticleType::create(
                'id',
                'title',
                InputTextMessageContentType::create(
                    'InputTextMessageContentType',
                    [
                        'parseMode' => InputTextMessageContentType::PARSE_MODE_MARKDOWN,
                        'disableWebPagePreview' => true,
                    ]
                ),
                [
                    'replyMarkup' => InlineKeyboardMarkupType::create([
                        [
                            InlineKeyboardButtonType::create('text', [
                                'url' => 'url',
                                'callbackData' => 'callback_data',
                                'switchInlineQuery' => 'switch_inline_query',
                                'switchInlineQueryCurrentChat' => 'switch_inline_query_current_chat',
                                'callbackGame' => CallbackGameType::create(),
                            ]),
                            InlineKeyboardButtonType::create('text2', [
                                'url' => 'url',
                                'callbackData' => 'callback_data',
                                'switchInlineQuery' => 'switch_inline_query',
                                'switchInlineQueryCurrentChat' => 'switch_inline_query_current_chat',
                                'pay' => true,
                            ]),
                        ],
                        [
                            InlineKeyboardButtonType::create('text3', [
                                'url' => 'url',
                                'callbackData' => 'callback_data',
                                'switchInlineQuery' => 'switch_inline_query',
                                'switchInlineQueryCurrentChat' => 'switch_inline_query_current_chat',
                            ]),
                        ],
                    ]),
                    'url' => 'url',
                    'hideUrl' => true,
                    'description' => 'description',
                    'thumbUrl' => 'thumb_url',
                    'thumbWidth' => 320,
                    'thumbHeight' => 320,
                ]
            ),
        ];

        $answer = AnswerInlineQueryMethod::create(
            'inline_query_id',
            $results,
            [
                'cacheTime' => $dateTime,
                'isPersonal' => true,
                'nextOffset' => 'next_offset',
                'switchPmText' => 'switch_pm_text',
                'switchPmParameter' => 'switch_pm_parameter',
            ]
        );

        $answer->addResult(
            InlineQueryResultArticleType::create(
                'id',
                'title',
                InputTextMessageContentType::create(
                    'InputTextMessageContentType2',
                    [
                        'parseMode' => InputTextMessageContentType::PARSE_MODE_MARKDOWN,
                        'disableWebPagePreview' => true,
                    ]
                ),
                [
                    'replyMarkup' => InlineKeyboardMarkupType::create([
                        [
                            InlineKeyboardButtonType::create('text', [
                                'url' => 'url',
                                'callbackData' => 'callback_data',
                                'switchInlineQuery' => 'switch_inline_query',
                                'switchInlineQueryCurrentChat' => 'switch_inline_query_current_chat',
                                'callbackGame' => CallbackGameType::create(),
                            ]),
                            InlineKeyboardButtonType::create('text2', [
                                'url' => 'url',
                                'callbackData' => 'callback_data',
                                'switchInlineQuery' => 'switch_inline_query',
                                'switchInlineQueryCurrentChat' => 'switch_inline_query_current_chat',
                                'pay' => true,
                            ]),
                        ],
                        [
                            InlineKeyboardButtonType::create('text3', [
                                'url' => 'url',
                                'callbackData' => 'callback_data',
                                'switchInlineQuery' => 'switch_inline_query',
                                'switchInlineQueryCurrentChat' => 'switch_inline_query_current_chat',
                            ]),
                        ],
                    ]),
                    'url' => 'url',
                    'hideUrl' => true,
                    'description' => 'description',
                    'thumbUrl' => 'thumb_url',
                    'thumbWidth' => 320,
                    'thumbHeight' => 320,
                ]
            )
        );

//        $answer->addResult(
//            InlineQueryResultDocumentType::create(
//                'id',
//                'title',
//                'url',
//                InlineQueryResultDocumentType::MIME_TYPE_ZIP,
//
//                [
//                    'inputMessageContent' => InputTextMessageContentType::create(
//                        'InputTextMessageContentTypeX',
//                        [
//                            'parseMode' => InputTextMessageContentType::PARSE_MODE_MARKDOWN,
//                            'disableWebPagePreview' => true
//                        ]
//                    ),
//                    'replyMarkup' => InlineKeyboardMarkupType::create([
//                        [
//                            InlineKeyboardButtonType::create('text', [
//                                'url' => 'url',
//                                'callbackData' => 'callback_data',
//                                'switchInlineQuery' => 'switch_inline_query',
//                                'switchInlineQueryCurrentChat' => 'switch_inline_query_current_chat',
//                                'callbackGame' => CallbackGameType::create(),
//                            ]),
//                            InlineKeyboardButtonType::create('text2', [
//                                'url' => 'url',
//                                'callbackData' => 'callback_data',
//                                'switchInlineQuery' => 'switch_inline_query',
//                                'switchInlineQueryCurrentChat' => 'switch_inline_query_current_chat',
//                                'pay' => true
//                            ])
//                        ],
//                        [
//                            InlineKeyboardButtonType::create('text3', [
//                                'url' => 'url',
//                                'callbackData' => 'callback_data',
//                                'switchInlineQuery' => 'switch_inline_query',
//                                'switchInlineQueryCurrentChat' => 'switch_inline_query_current_chat'
//                            ])
//                        ]
//                    ]),
//                    'url' => 'url',
//                    'hideUrl' => true,
//                    'description' => 'description',
//                    'thumbUrl' => 'thumb_url',
//                    'thumbWidth' => 320,
//                    'thumbHeight' => 320
//                ]
//            )
//        );

        $botApi->answerInlineQuery($answer);
    }
}
